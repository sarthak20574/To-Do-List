<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel To-Do List</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        #taskTitle {
            padding: 10px;
            width: 300px;
            margin-right: 10px;
            font-size: 16px;
        }

        button {
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
        }

        button:hover {
            background-color: #218838;
        }

        #taskList {
            list-style-type: none;
            padding: 0;
            margin-top: 20px;
        }

        #taskList li {
            background: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid #ddd;
        }

        #taskList li input[type="checkbox"] {
            margin-right: 10px;
        }

        #taskList .deleteTask {
            background-color: #dc3545;
            border: none;
            color: white;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 5px;
        }

        #taskList .deleteTask:hover {
            background-color: #c82333;
        }

        label {
            margin-top: 20px;
            display: block;
            font-size: 16px;
        }

        
        .completed {
            text-decoration: line-through;
            color: #888;
        }
    </style>
</head>
<body>
    <h1>To-Do List</h1>

    <!-- Add Task -->
    <input type="text" id="taskTitle" placeholder="Enter task">
    <button id="addTask">Add</button>

    <!-- show all toggling thingy -->
    <label>
        <input type="checkbox" id="showAllTasks" {{ request('show_all') ? 'checked' : '' }}> Show All Tasks
    </label>
    
    <ul id="taskList">
        @foreach($tasks as $task)
            <li data-id="{{ $task->id }}">
                <input type="checkbox" class="toggleTask" {{ $task->completed ? 'checked' : '' }}>
                <span class="{{ $task->completed ? 'completed' : '' }}">{{ $task->title }}</span>
                <button class="deleteTask">Delete</button>
            </li>
        @endforeach
    </ul>

    <script>
        $('#addTask').on('click', function() {
            let title = $('#taskTitle').val().trim();
            if (title) {
                $.post("{{ route('tasks.store') }}", { title: title, _token: $('meta[name="csrf-token"]').attr('content') }, function() {
                    location.reload();
                });
            }
        });

        $(document).on('change', '.toggleTask', function() {
            let taskId = $(this).closest('li').data('id');
            $.ajax({
                url: `/task/${taskId}`,
                type: 'PUT',
                data: { _token: $('meta[name="csrf-token"]').attr('content') },
                success: function() {
                    location.reload(); // refreshing li
                }
            });
        });

        $(document).on('click', '.deleteTask', function() {
            if (confirm('Are you sure to delete this task?')) {
                let taskId = $(this).closest('li').data('id');
                $.ajax({
                    url: `/task/${taskId}`,
                    type: 'DELETE',
                    data: { _token: $('meta[name="csrf-token"]').attr('content') },
                    success: function() {
                        location.reload(); // refresh li
                    }
                });
            }
        });

        // show all toggl
        $('#showAllTasks').on('change', function() {
            let showAll = $(this).is(':checked');
            if (showAll) {
                window.location.href = '/?show_all=true';
            } else {
                // on unchecking, reload w/o params, ie, removeeeeee the show_all
                window.location.href = '/';
            }
        });
    </script>
</body>
</html>



# Video Link: https://youtu.be/RBAJPtcNVfc

# Laravel To-Do List

A simple and interactive To-Do List application built using the **Laravel 9** framework. This app allows users to add, complete, delete tasks, and toggle between showing all tasks or only pending ones.

## Features

- ✅ Add new tasks without reloading the page.
- ✅ Mark tasks as completed by clicking the checkbox (removes them from the list).
- ✅ View all tasks (completed and pending) using the "Show All Tasks" toggle.
- ✅ Delete tasks with a confirmation prompt.
- ✅ Prevent duplicate tasks from being added.

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/yourusername/laravel-todo-list.git
   cd laravel-todo-list
   ```

2. **Install dependencies:**

   ```bash
   composer install
   ```

3. **Set up environment:**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure the database:**
   - Update `.env` with your database credentials:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

5. **Run database migrations:**

   ```bash
   php artisan migrate
   ```

6. **Serve the application:**

   ```bash
   php artisan serve
   ```

7. **Access the To-Do List:**

   Open [http://localhost:8000](http://localhost:8000) in your browser.

## Usage

- **Add Task:** Enter a task and click **Add**.
- **Complete Task:** Check the box to mark a task as completed (disappears unless "Show All Tasks" is enabled).
- **Show All Tasks:** Toggle to view all tasks (completed + pending).
- **Delete Task:** Click **Delete** (with confirmation prompt).

## Deployment (Optional)

To deploy this application on platforms like **Replit**, **InfinityFree**, or **Heroku**, follow the specific hosting guide.

## License

This project is licensed under the MIT License.


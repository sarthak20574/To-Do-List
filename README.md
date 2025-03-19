



# Laravel To-Do List

A simple and interactive To-Do List application built using the **Laravel 9** framework. This app allows users to add, complete, delete tasks, and toggle between showing all tasks or only pending ones.


## **Video Link: 
https://youtu.be/RBAJPtcNVfc**


## Usage

- **Add Task:** Enter a task and click **Add**.
- **Complete Task:** Check the box to mark a task as completed (disappears unless "Show All Tasks" is enabled).
- **Show All Tasks:** Toggle to view all tasks (completed + pending).
- **Delete Task:** Click **Delete** (with confirmation prompt).

## Installation

 **Configure the database:**
   - Update `.env` with your database credentials:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

 **Run database migrations:**

   ```bash
   php artisan migrate
   ```

 **Serve the application:**

   ```bash
   php artisan serve
   ```

 **Access the To-Do List:**

   Open [http://localhost:8000](http://localhost:8000) in your browser.




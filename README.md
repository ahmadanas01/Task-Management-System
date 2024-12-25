Task Management System

Features

User Authentication

Register: Users can create an account.

Log in: Users can log into their account.

Log out: Users can log out of their account.

Task Management (CRUD Operations)

Create: Users can add new tasks.

Read: Users can view a list of tasks.

Update: Users can edit existing tasks.

Delete: Users can remove tasks.

Task Filtering and Sorting

Filter: Filter tasks by status (e.g., Pending, In Progress, Completed).

Sort: Sort tasks by due date.

API Development

Provides an API for interaction with other applications.

Installation and Setup

1. To install and set up the project locally, follow these steps:

Clone the repository:

git clone https://github.com/ahmadanas01/Task-Management-System.git

2. Navigate to the project directory:

cd project_folder

3. Install dependencies:

composer install

npm install

npm run build


4. Set up the database:

Create a new database named tms.

Import the tms.sql file  into the database, which is in root directory.

5. Set up your environment variables:

cp .env.example .env

Run the application:

php artisan serve

API Usage

Test Login with Postman

Open Postman.

Create a new request with the following details:

Method: POST

URL: http://localhost/api/login (adjust the base URL as per your app setup)

Go to the Body tab and select raw. Choose JSON as the data type.

Provide the login credentials as JSON. For example:

{
    "email": "user@example.com",
    "password": "password"
}

Send the request.

If the login is successful, you'll receive a response like this:

{
    "token": "your-generated-token",
}

Using the Token for Authorization

Include the token in subsequent requests as the Authorization header:

Authorization: Bearer your-generated-token

Endpoint for Filtering Tasks by Status

URL: /api/tasks?status={status}

Method: GET

Description: Retrieve tasks filtered by a specific status.

Query Parameters:

status: Accepted values are:

Pending

In Progress

Completed

Authentication: Required (auth:api middleware).

Example Requests:

Get all tasks with status Pending:

GET /api/tasks?status=Pending

Get all tasks with status In Progress:

GET /api/tasks?status=In Progress

Get all tasks with status Completed:

GET /api/tasks?status=Completed

Response: JSON array of tasks matching the specified status.

Task Management Endpoints

1. Get All Tasks

URL: /api/tasks

Method: GET

Description: Retrieve a list of tasks, with optional filtering and sorting.

Query Parameters:

status (optional): Filter tasks by status. Accepted values: Pending, In Progress, Completed.

sort_by (optional): Sort tasks by due date. Accepted values: asc, desc (default: asc).

Authentication: Required (auth:api middleware).

Response: JSON array of tasks.

2. Create a New Task

URL: /api/tasks

Method: POST

Description: Create a new task.

Request Body (JSON):

{
  "title": "Task title",
  "description": "Task description",
  "status": "Pending | In Progress | Completed",
  "due_date": "YYYY-MM-DD"
}

Authentication: Required (auth:api middleware).

Response: JSON object of the created task with a 201 Created status.

3. Update an Existing Task

URL: /api/tasks/{task}

Method: PUT

Description: Update an existing task.

Request Parameters:

{task}: ID of the task to update.

Request Body (JSON):

{
  "title": "Updated title",
  "description": "Updated description",
  "status": "Pending | In Progress | Completed",
  "due_date": "YYYY-MM-DD"
}

Authentication: Required (auth:api middleware).

Response: JSON object of the updated task.

4. Delete a Task

URL: /api/tasks/{task}

Method: DELETE

Description: Delete a specific task.

Request Parameters:

{task}: ID of the task to delete.

Authentication: Required (auth:api middleware).

Response: Empty response with a 204 No Content status.

Notes:

All endpoints require the user to be authenticated with the auth:api middleware.

The endpoints are protected, and the tasks are scoped to the authenticated user (user_id from Auth::id()).

The index endpoint supports optional query parameters for filtering by status and sorting by due_date.


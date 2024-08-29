# Laravel Job Queue API

## Setup Instructions

1. Clone the repository:
    ```sh
    git clone <repository_url>
    cd laravel-job-queue-api
    ```

2. Install dependencies:
    ```sh
    composer install
    ```

3. Set up the environment variables:
    ```sh
    cp .env.example .env
    ```
   Configure the `.env` file with your database credentials.

4. Run the migrations:
    ```sh
    php artisan migrate
    ```

5. Run the development server:
    ```sh
    php artisan serve
    ```

## Testing the API Endpoint

1. Use a tool like Postman or cURL to send a POST request to:
    ```
    POST /api/submit
    ```
   with the following JSON payload:
    ```json
    {
        "name": "John Doe",
        "email": "john.doe@example.com",
        "message": "This is a test message."
    }
    ```

2. You should receive a response:
    ```json
    {
        "message": "Submission queued for processing"
    }
    ```

## Running Unit Tests

1. Run the tests:
    ```sh
    php artisan test
    ```

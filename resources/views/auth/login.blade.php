<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: flex-start; /* Aligns items to the start (left) */
            align-items: center;
            height: 100vh;
            margin: 0; /* Remove default margin */
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            background-image: url('../images/student.jpg'); /* Ensure the path is correct */
            background-size: cover; /* Change to cover to fill the area */
            background-repeat: no-repeat; /* Prevents image from repeating */
            background-position: center; /* Center the image */
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9); /* White background with some transparency */
            padding: 3rem;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 350px;
            max-width: 90%; /* Responsive max width */
            margin-left: 53rem; /* Adjusted left margin for better alignment */
            display: flex; /* Added flex for centering the button */
            flex-direction: column; /* Column layout */
            align-items: center; /* Center items */
        }

        h1 {
            margin-bottom: 1.5rem;
            text-align: center;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px; /* Increased padding for inputs */
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%; /* Full width */
            padding: 8px; /* Decreased padding for button */
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 14px; /* Decreased font size */
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .error {
            color: red;
            font-size: 0.9em;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>

        @if ($errors->any())
            <div class="error">
                <strong>{{ $errors->first() }}</strong>
            </div>
        @endif

        <form method="POST" action="{{ url('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

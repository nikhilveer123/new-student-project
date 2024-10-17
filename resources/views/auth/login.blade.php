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
            height: 100vh;
            margin: 0;
            overflow: hidden; /* Prevents scrolling */
        }

        .background-image {
            flex: 1; /* Takes the remaining space */
            background-image: url('../images/student.jpg'); /* Ensure the path is correct */
            background-size: cover; /* Fills the area */
            background-repeat: no-repeat; /* Prevents image from repeating */
            background-position: center; /* Centers the image */
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 3rem;
            border-radius: 8px;
            width: 350px;
            max-width: 90%;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            flex-shrink: 0;
        }

        h1 {
            margin-bottom: 1.5rem;
            text-align: center;
        }

        input[type="email"], input[type="password"], input[type="tel"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0; /* Space between fields */
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1); /* Added shadow for input */
        }

        button {
            width: 108%;
            padding: 12px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838; /* Darker shade on hover */
        }

        .error {
            color: red;
            font-size: 0.9em;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="background-image"></div>
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

<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #74ebd5, #9face6); /* Attractive background */
            color: #333; /* Dark text color for contrast */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
        }
        .container {
            background-color: white; /* White background for form */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h1 {
            text-align: center;
            color: #4CAF50; /* Header color */
        }
        label {
            margin-bottom: 10px;
            display: block;
            font-weight: bold;
        }
        input[type="text"], input[type="email"] {
            width: calc(100% - 20px); /* Adjust width for padding */
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #4CAF50; /* Submit button color */
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049; /* Button hover color */
        }
        .confirmation {
            color: green;
            text-align: center;
            margin-top: 10px;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add User</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $conn->real_escape_string($_POST['name']); // Escape special characters
            $email = $conn->real_escape_string($_POST['email']); // Escape special characters
            $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

            if ($conn->query($sql) === TRUE) {
                echo "<p class='confirmation'>New user created successfully! <a href='read.php'>View Users</a></p>";
            } else {
                echo "<p class='error'>Error: " . htmlspecialchars($conn->error) . "</p>";
            }
        }
        ?>
        <form method="post" action="">
            <label for="name">Name:</label>
            <input type="text" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            
            <input type="submit" value="Add User">
        </form>
    </div>
</body>
</html>

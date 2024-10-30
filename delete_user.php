<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #74ebd5, #9face6); /* Attractive gradient background */
            color: #333; /* Dark text color for contrast */
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.5em; /* Larger font size */
            color: #4CAF50; /* Header color */
        }

        .container {
            background-color: white; /* White background for content */
            border-radius: 8px; /* Rounded corners */
            padding: 20px; /* Padding inside the container */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Shadow for depth */
            max-width: 600px; /* Max width for better layout */
            width: 100%; /* Full width inside the container */
            text-align: center; /* Center align text */
        }

        .message {
            font-size: 1.2em; /* Slightly larger font for message */
            margin-bottom: 20px; /* Space below message */
        }

        .button {
            display: inline-block; /* Inline block for the button */
            padding: 10px 20px; /* Padding for button */
            background-color: #4CAF50; /* Button background color */
            color: white; /* Button text color */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor */
            text-decoration: none; /* No underline */
            font-weight: bold; /* Bold text for emphasis */
            transition: background-color 0.3s; /* Smooth transition */
        }

        .button:hover {
            background-color: #45a049; /* Darker green on hover */
        }
    </style>
</head>
<body>
    <h1>Delete User</h1>
    <div class="container">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // First, delete the user's orders
            $deleteOrdersSql = "DELETE FROM orders WHERE user_id=?";
            $deleteOrdersStmt = $conn->prepare($deleteOrdersSql);
            $deleteOrdersStmt->bind_param("i", $id);
            $deleteOrdersStmt->execute();

            // Now, delete the user
            $deleteUserSql = "DELETE FROM users WHERE id=?";
            $deleteUserStmt = $conn->prepare($deleteUserSql);
            $deleteUserStmt->bind_param("i", $id);

            if ($deleteUserStmt->execute()) {
                echo "<div class='message'>User deleted successfully.</div>";
                echo "<a class='button' href='read.php'>View Users</a>";
            } else {
                echo "<div class='message'>Error deleting user: " . htmlspecialchars($deleteUserStmt->error) . "</div>";
                echo "<a class='button' href='read.php'>Go Back</a>";
            }
        } else {
            echo "<div class='message'>No user ID provided.</div>";
            echo "<a class='button' href='read.php'>View Users</a>";
        }
        ?>
    </div>
</body>
</html>

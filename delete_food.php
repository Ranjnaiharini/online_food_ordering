<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Food Item</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #74ebd5, #9face6);
            color: #333;
            margin: 0;
            padding: 20px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.5em;
            color: #4CAF50;
        }
        .message {
            margin-top: 20px;
            font-weight: bold;
            text-align: center;
            color: #e74c3c;
        }
        .success-message {
            color: #4CAF50;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Delete Food Item</h1>
    <?php
    if (isset($_GET['id'])) {
        // Sanitize the ID to prevent SQL injection
        $id = $conn->real_escape_string($_GET['id']);

        // Step 1: Delete related orders first to avoid foreign key constraint error
        $deleteOrdersSql = "DELETE FROM orders WHERE food_item_id='$id'";
        if ($conn->query($deleteOrdersSql) === TRUE) {
            // Step 2: Now delete the food item
            $deleteFoodSql = "DELETE FROM food_items WHERE id='$id'";
            if ($conn->query($deleteFoodSql) === TRUE) {
                echo "<p class='message success-message'>Food item and associated orders deleted successfully.</p>";
                echo "<a href='read_food.php'>View Food Items</a>";
            } else {
                echo "<p class='message'>Error deleting food item: " . $conn->error . "</p>";
            }
        } else {
            echo "<p class='message'>Error deleting related orders: " . $conn->error . "</p>";
        }
    } else {
        echo "<p class='message'>No food item ID provided for deletion.</p>";
    }
    ?>
</body>
</html>

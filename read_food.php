<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Food Items</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #74ebd5, #9face6); /* Attractive background */
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

        table {
            width: 100%; /* Full width for the table */
            max-width: 800px; /* Max width for better layout */
            border-collapse: collapse; /* Remove space between borders */
            margin-bottom: 20px; /* Spacing below the table */
            background-color: white; /* White background for the table */
            border-radius: 10px; /* Rounded corners for the table */
            overflow: hidden; /* Ensure rounded corners work */
        }

        th, td {
            padding: 10px; /* Padding inside cells */
            text-align: left; /* Left align text */
            border: 1px solid #ddd; /* Light gray border for cells */
        }

        th {
            background-color: #4CAF50; /* Green background for header */
            color: white; /* White text for header */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Zebra stripe effect for rows */
        }

        tr:hover {
            background-color: #d1ecf1; /* Light blue on hover */
        }

        a {
            color: #4CAF50; /* Green link color */
            text-decoration: none; /* No underline */
            font-weight: bold; /* Bold text for links */
        }

        a:hover {
            text-decoration: underline; /* Underline on hover */
        }

        .action-buttons {
            display: flex;
            justify-content: space-around; /* Space between action buttons */
        }

        .button-container {
            margin-top: 20px; /* Margin above buttons */
            display: flex;
            justify-content: space-around; /* Space between buttons */
            width: 100%; /* Full width for the container */
            max-width: 800px; /* Max width for better layout */
        }

        .button {
            padding: 10px 20px; /* Padding for buttons */
            background-color: #4CAF50; /* Button background color */
            color: white; /* Button text color */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor */
            text-decoration: none; /* No underline */
            text-align: center; /* Center align buttons */
        }

        .button:hover {
            background-color: #45a049; /* Darker green on hover */
        }
    </style>
</head>
<body>
    <h1>Food Items</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php
        $sql = "SELECT * FROM food_items";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . htmlspecialchars($row["id"]) . "</td>
                <td>" . htmlspecialchars($row["name"]) . "</td>
                <td>" . htmlspecialchars($row["description"]) . "</td>
                <td>" . htmlspecialchars($row["price"]) . "</td>
                <td class='action-buttons'>
                    <a href='update_food.php?id=" . htmlspecialchars($row["id"]) . "'>Update</a> | 
                    <a href='delete_food.php?id=" . htmlspecialchars($row["id"]) . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No food items found</td></tr>";
        }
        ?>
    </table>
    <div class="button-container">
        <a class="button" href="create_food.php">Add Food Item</a>
        <a class="button" href="read.php">View Users</a>
    </div>
</body>
</html>

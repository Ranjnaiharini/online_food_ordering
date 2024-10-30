<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Orders</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4; /* Light gray background for the body */
            color: #333333; /* Dark text color for contrast */
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
            color: #2c3e50; /* Dark blue for the header */
        }

        table {
            width: 100%; /* Full width for the table */
            max-width: 800px; /* Max width for better layout */
            border-collapse: collapse; /* Remove space between borders */
            margin-bottom: 20px; /* Spacing below the table */
        }

        th, td {
            padding: 10px; /* Padding inside cells */
            text-align: left; /* Left align text */
            border: 1px solid #ddd; /* Light gray border for cells */
        }

        th {
            background-color: #007BFF; /* Blue background for header */
            color: white; /* White text for header */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Zebra stripe effect for rows */
        }

        tr:hover {
            background-color: #d1ecf1; /* Light blue on hover */
        }

        a {
            color: #007BFF; /* Blue link color */
            text-decoration: none; /* No underline */
            font-weight: bold; /* Bold text for links */
        }

        a:hover {
            text-decoration: underline; /* Underline on hover */
        }

        .button-container {
            margin-top: 20px; /* Space above buttons */
        }

        .button {
            padding: 10px 20px; /* Padding for buttons */
            background-color: #007BFF; /* Button background color */
            color: white; /* Button text color */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor */
            text-decoration: none; /* No underline */
            margin: 5px; /* Spacing between buttons */
            display: inline-block; /* Inline-block for proper layout */
        }

        .button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <h1>Orders</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Food Item ID</th>
            <th>Order Date</th>
        </tr>
        <?php
        $sql = "SELECT * FROM orders";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . htmlspecialchars($row["id"]) . "</td>
                <td>" . htmlspecialchars($row["user_id"]) . "</td>
                <td>" . htmlspecialchars($row["food_item_id"]) . "</td>
                <td>" . htmlspecialchars($row["order_date"]) . "</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No orders found</td></tr>";
        }
        ?>
    </table>
    <div class="button-container">
        <a class="button" href="create_order.php">Place Order</a>
        <a class="button" href="read.php">View Users</a>
        <a class="button" href="read_food.php">View Food Items</a>
    </div>
</body>
</html>

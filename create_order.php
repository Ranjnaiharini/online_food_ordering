<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <style>
        /* Your CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1, h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        form {
            margin: 20px 0;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        select, input[type="submit"] {
            padding: 10px;
            width: 100%;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .confirmation {
            color: green;
            margin-bottom: 20px;
        }
        .error {
            color: red;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Place Order</h1>

    <h2>Available Food Items</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        <?php
        // Fetch food items to display in the table
        $sql = "SELECT * FROM food_items";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["description"] . "</td>
                    <td>₹" . number_format($row["price"], 2) . "</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No food items found</td></tr>";
        }
        ?>
    </table>

    <h2>Select User and Food Items</h2>
    <form method="post" action="confirmation.php">
        <label for="user_id">Choose a user:</label>
        <select name="user_id" required>
            <?php
            // Fetch users to populate the dropdown
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
            ?>
        </select>

        <label for="food_item_id">Choose a food item:</label>
        <select name="food_item_id" required>
            <?php
            // Fetch food items to populate the dropdown
            $sql = "SELECT * FROM food_items";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
            ?>
        </select>

        <input type="submit" value="Place Order">
    </form>

    <a href="read.php">View Users</a>
    <a href="read_food.php">View Food Items</a>
</body>
</html>

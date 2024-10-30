<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .order-summary {
            background-color: #e8f5e9;
            padding: 20px;
            border: 1px solid #c8e6c9;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Order Confirmation</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = $_POST['user_id'];
        $food_item_id = $_POST['food_item_id'];
        $order_date = date("Y-m-d H:i:s");

        // Insert order into the database
        $sql = "INSERT INTO orders (user_id, food_item_id, order_date) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $user_id, $food_item_id, $order_date);

        if ($stmt->execute()) {
            // Fetch user and food item details
            $user_sql = "SELECT name FROM users WHERE id='$user_id'";
            $user_result = $conn->query($user_sql);
            $user_name = $user_result->fetch_assoc()['name'];

            $food_sql = "SELECT * FROM food_items WHERE id='$food_item_id'";
            $food_result = $conn->query($food_sql);
            $food_item = $food_result->fetch_assoc();

            // Display order summary
            echo "<div class='order-summary'>
                <h2>Order Summary</h2>
                <p><strong>User:</strong> " . htmlspecialchars($user_name) . "</p>
                <p><strong>Food Item:</strong> " . htmlspecialchars($food_item['name']) . "</p>
                <p><strong>Description:</strong> " . htmlspecialchars($food_item['description']) . "</p>
                <p><strong>Price:</strong> ₹" . number_format($food_item['price'], 2) . "</p>
            </div>";
        } else {
            echo "<p class='error'>Error placing order: " . htmlspecialchars($stmt->error) . "</p>";
        }
    }
    ?>

    <a href="create_order.php">Place Another Order</a>
</body>
</html>

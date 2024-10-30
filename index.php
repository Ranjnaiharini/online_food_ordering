<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Food Ordering</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #2c3e50, #4ca1af); /* Gradient background */
            color: #ffffff; /* White text color for contrast */
            margin: 0;
            padding: 20px;
            height: 100vh; /* Full viewport height */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.5em; /* Larger font size */
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); /* Text shadow for depth */
        }
        nav {
            margin: 20px auto;
            text-align: center; /* Center align the navigation */
            background-color: rgba(255, 255, 255, 0.1); /* Slightly transparent background */
            padding: 30px; /* Padding around the nav */
            border-radius: 10px; /* Rounded corners for nav */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5); /* Shadow for depth */
            max-width: 700px; /* Max width for better layout */
        }
        nav a {
            margin: 15px; /* Increased margin for better spacing */
            text-decoration: none;
            color: #ffffff; /* White text color for links */
            padding: 12px 25px; /* Adjusted padding for larger clickable area */
            border: 2px solid #007BFF; /* Border for links */
            border-radius: 5px;
            background-color: #007BFF; /* Primary button color */
            transition: background-color 0.3s, transform 0.2s, box-shadow 0.3s; /* Smooth transitions */
            display: inline-block; /* Ensures the links behave like buttons */
            font-weight: bold; /* Bold text for emphasis */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4); /* Text shadow for links */
        }
        nav a:hover {
            background-color: #0056b3; /* Darker blue on hover */
            color: white;
            transform: scale(1.05); /* Slightly enlarge on hover */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5); /* Shadow effect on hover */
        }
        nav h2 {
            margin-bottom: 15px; /* Spacing below the heading */
            color: #ffffff; /* Light color for heading */
            font-size: 1.5em; /* Larger font size for the heading */
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4); /* Text shadow for heading */
        }
    </style>
</head>
<body>
    <h1>Welcome to Online Food Ordering</h1>
    <nav>
        <h2>Navigation</h2>
        <a href="create.php">Add User</a>
        <a href="create_food.php">Add Food Item</a>
        <a href="create_order.php">Place Order</a>
        <a href="read.php">View Users</a>
        <a href="read_food.php">View Food Items</a>
        <a href="read_orders.php">View Orders</a>
        <a href="update_users.php">Update User</a>
        <a href="update_food.php">Update Food Item</a>
        <a href="delete_user.php">Delete User</a>
        <a href="delete_food.php">Delete Food Item</a>
    </nav>
</body>
</html>

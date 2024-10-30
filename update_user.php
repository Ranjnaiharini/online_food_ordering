<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4; /* Light gray background */
            color: #333; /* Dark text color */
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50; /* Dark blue for header */
        }

        form {
            background: white; /* White background for form */
            padding: 20px; /* Padding around form */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            width: 300px; /* Fixed width for the form */
        }

        input[type="text"], input[type="email"] {
            width: 100%; /* Full width for input fields */
            padding: 10px; /* Padding inside fields */
            margin: 10px 0; /* Margin above and below fields */
            border: 1px solid #ccc; /* Light gray border */
            border-radius: 4px; /* Rounded corners */
            box-sizing: border-box; /* Include padding in width */
        }

        input[type="submit"] {
            background-color: #007BFF; /* Blue background for submit button */
            color: white; /* White text for button */
            border: none; /* No border */
            padding: 10px; /* Padding for button */
            border-radius: 4px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor */
            font-size: 16px; /* Font size for button */
            margin-top: 10px; /* Margin above button */
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .message {
            margin: 20px 0; /* Margin above and below message */
            font-size: 18px; /* Larger font size for messages */
        }

        .back-link {
            margin-top: 20px; /* Spacing above the back link */
            font-size: 16px; /* Font size for back link */
        }
    </style>
</head>
<body>
    <h1>Update User</h1>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
    ?>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
        <input type="submit" value="Update">
    </form>
    <?php
        } else {
            echo "<div class='message'>User not found.</div>";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $id = $_POST['id'];

        $sql = "UPDATE users SET name=?, email=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $email, $id);

        if ($stmt->execute()) {
            echo "<div class='message'>User updated successfully. <a href='read.php'>View Users</a></div>";
        } else {
            echo "<div class='message'>Error updating user: " . htmlspecialchars($stmt->error) . "</div>";
        }
    }
    ?>
    <div class="back-link">
        <a href="read.php">Back to Users</a>
    </div>
</body>
</html>

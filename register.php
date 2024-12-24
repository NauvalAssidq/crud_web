<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "crud_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Insert data into the database
    $sql = "INSERT INTO pendaftar (name, email, phone) VALUES ('$name', '$email', '$phone')";
    if ($conn->query($sql) === TRUE) {
        // Redirect to the main page after success
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/create.css">
    <title>Tambah Pengguna</title>
</head>
<body>
    <div class="container">
        <h2>Tambah Pengguna Baru</h2>
        <form method="POST" action="create.php">
            <label for="name">Nama:</label>
            <input type="text" name="name" id="name" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            
            <label for="phone">Telepon:</label>
            <input type="text" name="phone" id="phone" required>
            
            <button type="submit" class="btn">Tambah Pengguna</button>
            <a href="index.php" class="btn-cancel">Batal</a>
        </form>
    </div>
</body>
</html>

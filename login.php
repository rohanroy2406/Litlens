<?php
include 'db.php'; // Include the database connection script

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user exists in the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            echo "Login successful! Welcome, " . $user['name'];
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with this email!";
    }

    $conn->close();
}
?>

<!-- register.php -->

<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    
    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        $error = "Registrasi gagal. Username mungkin sudah digunakan.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="bg-success text-white p-4 rounded-3 shadow-sm"><h2>Register</h2></div>
    <br>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST">
        <div class="mb-3"><label>Username</label><input type="text" name="username" class="form-control" required></div>
        <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required></div>
        Already Have Account?<a href="index.php"> Login</a><br>
        <br>
        <button type="submit" class="btn btn-success">Register</button>
        
        <!-- <a href="index.php" class="btn btn-secondary">Login</a> -->
    </form>
</body>
</html>

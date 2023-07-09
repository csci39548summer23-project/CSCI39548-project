<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM accounts
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Account Settings</h1>
    <?php if (isset($user)): ?>
        <p>Welcome,  <?= htmlspecialchars($user["username"]) ?>!</p>
        <hr>
        <p><button onclick="location.href = 'logout.php'">Log out</button></p>
        <hr>
        <p><button>Delete account</button> <strong>ONLY</strong> click here if you want to delete your account.</p>
    <?php else: ?>
        <p><button onclick="location.href = 'login.php'">Log in</button> or <button onclick="location.href = 'signup.html'">Register</button></p>
    <?php endif; ?> 
    


    
</body>
</html>
    
<!DOCTYPE html>
<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM accounts
                    WHERE username = '%s'",
                   $mysqli->real_escape_string($_POST["username"]));
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"])) {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            header("Location: profile.php");
            exit;
        }
    }
    $is_invalid = true;
}

?>

<html>
<head>
    <title>Log in here</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="login.css">
</head>
<body>
      
      <form method="post" class="container">
        <h1>Log in:</h1>
        <?php if ($is_invalid): ?>
          <em>Invalid login</em>
        <?php endif; ?>
        
        <label for="username">username</label>
        <input type="username" name="username" id="username" value="<?= htmlspecialchars($_POST["username"] ?? "") ?>">
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        
        <button>Register</button>

        
    </form>
</body>
</html>

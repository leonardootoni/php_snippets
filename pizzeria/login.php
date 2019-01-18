<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentication</title>
</head>
<body>
    <div>
    <?php require_once "util/constants.php";
session_start();if (isset($_SESSION[USER_REGISTRATION_ERROR])): ?>
        <div>
            <h4>
                <?php echo $_SESSION[USER_REGISTRATION_ERROR];unset($_SESSION[USER_REGISTRATION_ERROR]); ?>
            </h4>
        </div>
    <?php endif;?>
        <form action="controller/user_authentication.php" method="POST">
            <div>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" size="50" with="50">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" size="50" with="50">
            </div>
            <div>
                <input type="submit" value="Login">
                <a href="sign_up.php">Sign-up</a>
            </div>
        </form>
    </div>
</body>
</html>

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
                <?php echo $_SESSION[USER_REGISTRATION_ERROR];
session_destroy(); ?>
            </h4>
        </div>
    <?php endif;?>
        <form action="controllers/user_authentication.php" method="POST">
            <div>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" size="50" with="50">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" size="50" with="50">
                <input type="hidden" name="hash" id="hash">
            </div>
            <div>
                <input id="submitBtn" type="submit" value="Login">
                <a href="sign_up.php">Sign-up</a>
            </div>
        </form>
    </div>
    <script src="static/js/sha1.min.js"></script>
    <script src="static/js/hash_procedures.js"></script>
</body>
</html>

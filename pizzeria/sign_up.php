<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentication</title>
</head>
<body>
    <?php require_once "util/constants.php";
session_start();if (isset($_SESSION[USER_REGISTRATION_ERROR])): ?>
        <div>
            <h4>
                <?php echo $_SESSION[USER_REGISTRATION_ERROR];unset($_SESSION[USER_REGISTRATION_ERROR]); ?>
            </h4>
        </div>
    <?php endif;?>
    <div>
        <form action="controller/user_registration.php" method="POST">
            <div>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" size="50" with="50">
            </div>
            <div>
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" id="firstName" size="50" with="50">
            </div>
            <div>
                <label for="lastName">Last Name:</label>
                <input type="text" name="lastName" id="lastName" size="50" with="50">
            </div>
            <div>
                <label for="birthday">Birthday:</label>
                <input type="text" name="birthday" id="birthday">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" size="50" with="50">
            </div>
            <div>
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" name="confirmPassword" id="confirmPassword" size="50" with="50">
            </div>
            <div>
                <input type="submit" value="Register">
            </div>
        </form>
    </div>
</body>
</html>

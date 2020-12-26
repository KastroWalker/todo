<?php
if ($_POST && $_POST['login']) {
    require './controllers/User.php';
    $user = new User();

    $user->login($_POST['user'], $_POST['password']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/global.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>TODO LOGIN</title>
</head>

<body>
    <?php if (isset($_SESSION['response'])) : ?>
        <p class="display-msg msg-error">
            <?= $_SESSION['response']['message'] ?>
        </p>
    <?php
        unset($_SESSION['response']);
    endif;
    ?>

    <div class="div-login">
        <h1>Login</h1>
        <form action="" method="POST" class="form-login">
            <div class="input-group">
                <label for="user" class="label">Username:</label>
                <input type="text" class="input-field input-user" id="user" name="user">
                <span class="error error-user">error</span>
            </div>
            <div class="input-group">
                <label for="password" class="label">Password:</label>
                <input type="password" class="input-field input-password" id="password" name="password">
                <span class="error error-password">error</span>
            </div>
            <button type="submit" name="login" value="login" class="btn btn-submit">Login</button>
        </form>
        <p class="create-account">Don't have account? <a href="./views/register.php">sign up</a></p>
    </div>
</body>

</html>
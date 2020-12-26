<?php
if ($_POST && $_POST['register']) {
    require $_SERVER['DOCUMENT_ROOT'] . '/controllers/User.php';

    $user = new User();

    $user->register();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/register.css">
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

    <div class="div-register">
        <h1>Register</h1>
        <form action="" class="form-login" method="POST">
            <div class="input-group">
                <label for="name" class="label">Name:</label>
                <input type="text" class="input-field input-name" id="name" name="name">
                <span class="error error-name">error</span>
            </div>
            <div class="input-group">
                <label for="email" class="label">Email:</label>
                <input type="email" class="input-field input-email" id="email" name="email">
                <span class="error error-email">error</span>
            </div>
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
            <button type="submit" value="register" name="register" class="btn btn-submit">Register</button>
        </form>
        <p class="create-account">Do you have account? <a href="../index.php">login in</a></p>
    </div>
</body>

</html>
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
    <p class="display-msg msg-error">
        Deu ruim ai garaio
    </p>

    <div class="div-register">
        <h1>Register</h1>
        <form action="../controllers/User.php" class="form-login" method="POST">
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
            <input type="submit" class="btn btn-submit" value="teste">
        </form>
        <p class="create-account">Don't have account? <a href="#">sign up</a></p>
    </div>
</body>

</html>
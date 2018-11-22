<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Swakowski</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/cw7/css/style.css">
</head>
<body class="text-center">
<form method="post" action="register.php" class="form-signin">
    <h1 class="h3 mb-3 font-weight-normal">Zarejestruj się!</h1>
    <div class="input-group">
        <label class="sr-only">Nazwa użytkownika</label>
        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" placeholder="Nazwa użytkownika" required autofocus>
    </div>
    <div class="input-group">
        <label class="sr-only">Hasło</label>
        <input type="password" name="password_1" class="form-control" placeholder="Hasło">
    </div>
    <div class="input-group">
        <label class="sr-only">Potwierdź hasło</label>
        <input type="password" name="password_2" class="form-control" placeholder="Powtórz hasło">
    </div>
    <div class="input-group">
        <button type="submit" class="btn btn-lg btn-primary btn-block" name="reg_user">Zarejestruj się</button>
    </div>
    <?php include('errors.php'); ?>
    <?php include('success.php'); ?>
    <br>
    <p>
        Masz już konto? <a href="login.php">Zaloguj się</a>
    </p>
</form>

</body>
</html>
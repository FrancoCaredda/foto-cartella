<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php require_once "links.php"; ?>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <form id="login-form" name="login-form" action="account.php" method="post">
        <div class="mb-3 title">
            <h2>Login</h2>
        </div>
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" required />
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" required />
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        <div class="register-link mb-3">
            <a href="register.php">Register</a>
        </div>
    </form>

    <?php require_once "scripts.php"; ?>
    <script src="login.js"></script>
</body>
</html>
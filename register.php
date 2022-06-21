<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php require_once "links.php"; ?>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <form name="register-form" action="account.php"  id="register-form" method="post">
        <div class="mb-3 title">
            <h2>Register</h2>
        </div>
        <div class="mb-3">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="inputName" aria-describedby="emailHelp" required />
        </div>
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" required />
        </div>
        <div class="mb-3">
            <label for="inputPassword" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="inputPassword" required />
        </div>
        <div class="mb-3">
            <label for="inputBirthday" class="form-label">Birthday</label>
            <input type="date" name="date" class="form-control" id="inputBirthday" aria-describedby="emailHelp" required />
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>

    <?php require_once "scripts.php"; ?>
    <script src="register.js"></script>
</body>
</html>
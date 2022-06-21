<?php require_once "scripts/post.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="form.css">
    <?php require_once "links.php"; ?>
</head>
<body>
    <div id="page-container">
        <?php require_once "components/header.php"; ?>
        <div id="content-wrap">
            <?php require_once "components/expandable_image.php"; ?>

            <div id="main-title" class="title">
                <h2></h2>
            </div>
            <div class="board container-lg" id="board">
                <div id="imagesWrapper" class="justified-gallery"></div>
            </div>

            <form id="publish-form" class="center" name="publish-form">
                <div class="mb-3 title">
                    <h2>Publish</h2>
                </div>
                <div class="mb-3">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="inputName" aria-describedby="emailHelp" required />
                </div>
                <div class="mb-3">
                    <label for="inputHashtag" class="form-label">Hashtag</label>
                    <input name="hashtag" type="text" class="form-control" id="inputHashtag" pattern="#[a-z0-9_]+(?![^<]*>)" required />
                </div>
                <div class="mb-3">
                    <label for="inputURL" class="form-label">Image URL</label>
                    <input type="url" name="url" id="inputURL" class="form-control" required/>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
            </form>

            <div class="container-lg">
                <table class="table" id="users">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Birthday</th>
                        <th>Role</th>
                        <th>Delete</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <?php require_once "components/footer.php";?>
    </div>
    <?php require_once "scripts.php"; ?>

    <script src="account.js"></script>
    <script src="index.js"></script>
</body>
</html>
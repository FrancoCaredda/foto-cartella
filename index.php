<?php require_once "scripts/connection.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto-Cartella</title>
    <?php require_once "links.php"; ?>
</head>
<body>
    <div id="page-container">
        <?php include_once "components/header.php"; ?>
        <div id="content-wrap">
            <div id="search" class="container">
                <form name="search-string" id="search-string" method="GET">
                    <input type="text" placeholder="Enter tag" class="form-control" name="search" id="search-input" pattern="#[a-z0-9_]+(?![^<]*>)" />
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>

            <?php require_once "components/expandable_image.php"; ?>

            <div class="title">
                <h2>All posts</h2>
            </div>
            <div class="board container-lg" id="board">
                <div id="imagesWrapper" class="justified-gallery"></div>
            </div>
        </div>
        <?php include_once "components/footer.php"; ?>
    </div>

    

    <?php require_once "scripts.php" ?>

    <script src="index.js"></script>
</body>
</html>
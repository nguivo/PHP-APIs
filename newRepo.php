<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creating New GitHub Repo Through API</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
</head>
<body>

    <main class="container">
        <form action="create.php" method="post">
            <label for="name">Repo Name</label>
            <input type="text" name="name" id="name" />

            <label for="descr">Repository Description</label>
            <textarea name="description" id="descr" cols="3" rows="4"></textarea>

            <button type="submit">Submit</button>
        </form>
    </main>

</body>
</html>

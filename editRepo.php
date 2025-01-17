<?php
include_once "config.php";
    // getting the particular repo to edit
    $name = $_GET["full_name"];

    $headers = [
        "User-Agent: ".$username,
        "Authorization: token ".$personal_access_token
    ];

    $ch = curl_init();

    curl_setopt_array($ch, [
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_URL => "https://api.github.com/repos/{$name}",
            CURLOPT_RETURNTRANSFER => true
    ]);

    $response = curl_exec($ch);

    curl_close($ch);

    $data = json_decode($response);

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
    <form action="update.php" method="post">
        <input type="hidden" name="full_name" value="<?= $data->full_name; ?>" />
        <label for="name">Repo Name</label>
        <input type="text" name="name" value="<?= $data->name; ?>" id="name" />

        <label for="descr">Repository Description</label>
        <textarea name="description" id="descr" cols="3" rows="4">
            <?= $data->description; ?>
        </textarea>

        <button type="submit">Submit</button>
    </form>
</main>

</body>
</html>

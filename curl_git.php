<?php
include_once "config.php";

    $headers = [
        "User-Agent: Example of Using API with Curl",
        "Authorization: token ".$personal_access_token
    ];

    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_URL => "https://api.github.com/".$username."/repos"
    ]);

  /*  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, "https://api.github.com/user/repos");*/

    $result = curl_exec($ch);

    curl_close($ch);

    $data = json_decode($result);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GitHub API</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
</head>
<body>
    <main class="container">
        <h1>Repository On GitHub</h1>

        <br>
        <a href="newRepo.php">New</a>

        <table>
            <thead>
                <tr>
                    <th>Repo Id</th>
                    <th>Repository Name</th>
                    <th>Description</th>
                    <th>Repo URL</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $repo): ?>
                <tr>
                    <td><?php echo $repo->id; ?></td>
                    <td><?php echo $repo->name; ?></td>
                    <td><?php echo htmlspecialchars($repo->description); ?></td>
                    <td><?php echo $repo->url; ?></td>
                    <td><a href="editRepo.php?full_name=<?php echo $repo->full_name; ?>">Edit</a></td>
                    <td>
                        <form action="delete.php" method="post">
                            <input type="hidden" name="full_name" value="<?php echo $repo->full_name; ?>" />
                            <button>Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
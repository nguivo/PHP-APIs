<?php
include_once "config.php";

    $headers = [
        "User-Agent: Editing existing github repos",
        "Authorization: token ".$personal_access_token
    ];

    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_URL => "https://api.github.com/repos/{$_POST['full_name']}",
        CURLOPT_CUSTOMREQUEST => "PATCH",
        CURLOPT_POSTFIELDS => json_encode($_POST)
    ]);

    $response = curl_exec($ch);

    $status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

    curl_close($ch);

    $data = json_decode($response);

    if($status_code == 422) {
        echo "Invalid data!";
        print_r($data->errors);
    }

    if($status_code == 201) {
        echo "Unexpected status code: $status_code";
        var_dump($data);
        exit;
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Repo Successfully Updated!</title>
</head>
<body>
    <h1>Repo Update Status</h1>

    <p>
        Repo successfully updated
        <a href="curl_git.php">Go Back Home</a>
    </p>

</body>
</html>










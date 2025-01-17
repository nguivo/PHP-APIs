<?php
include_once "config.php";

    $headers = [
        "User-Agent: Deleting Repo",
        "Authorization: token ".$personal_access_token
    ];

    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_URL => "https://api.github.com/repos/{$_POST['full_name']}",
        CURLOPT_CUSTOMREQUEST => "DELETE",
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

    if($status_code !== 204) {
        echo "Unexpected status code: $status_code";
        var_dump($data);
        exit;
    }
    else {
        echo "Repo Deleted successfully";
    }

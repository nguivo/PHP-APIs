<?php
    include_once "config.php";

    $headers = [
        "User-Agent: Example of Using API with Curl",
        "Authorization: token ".$personal_access_token;
    ];

    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_URL => "https://api.github.com/".$username."/repos",
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($_POST) //sent data must be in json format
    ]);

    // another way to explicitly set request method to post
    //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

    $response = curl_exec($ch);

    curl_close($ch);

    $data = json_decode($response);

    var_dump($data);

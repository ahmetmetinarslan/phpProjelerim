<?php


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    //Database Connection

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "authone";


    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if ($conn->connect_error) {
        die('Connection Failed : ' . $conn->connect_error);
    }

    //Validate Login auth

    $query = "SELECT * FROM loginone WHERE Username = '$username' AND Password = '$password'";

    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        //Login Successful
        header("Location: success.html");
        exit();
    } else {
        //Login Faild
        header("Location: error.html");
        exit();
    }


    $conn->close();
}

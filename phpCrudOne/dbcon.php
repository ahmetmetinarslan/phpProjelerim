<?php
define("HOSTNAME", 'localhost');
define("USERNAME", 'root');
define("PASSWORD", '');
define("DATABASE", 'php_crud_one');


$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);


if (!$connection) {
    die("Connection failed ");
}

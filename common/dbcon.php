<?php
try {
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "crud2";
    $db = new PDO("mysql:host=$server; dbname=$db", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Error: ' . $e->getMessage());
}

<?php
function conectar()
{

    $host = 'localhost';
    $db = 'kentinha';
    $user = 'root';
    $password = '';
    $user = 'postgres';
    $password = 'postgres';
$pdo = new PDO("pgsql:host=$host;port=5432;dbname=$db;", $user, $password);
}
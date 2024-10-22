<?php

///important variables in connection

$hostname = 'localhost';
$user = 'root';
$password = '';
$db_name = 'db_warga';

///global variable

$connection = mysqli_connect($hostname, $user, $password, $db_name);

// var_dump($connection);

// $res = mysqli_query($connection, "Select * From tb_person");

// fetching data
// mysqli_fetch_row() and mysqli_fetch_assoc()
//mysqli_fetch_array() possible double
//mysqli_fetch_object() common used




function myquery($query)
{
    global $connection;
    $res = mysqli_query($connection, $query);
    $returns = [];

    while ($data = mysqli_fetch_assoc($res)) {
        $returns[] = $data;
        // var_dump('ktp');
    }
    return $returns;
}

?>
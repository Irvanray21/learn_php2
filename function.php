<?php

// require_once 'connection.php';
require 'connection.php';
// var_dump($_GET);
// if action and id, then do ....
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    switch ($action) {
        case 'delete':
            delete_data($id);
            break;
        case 'edit';
            echo "";
            break;
        default:
            echo "Action is Unidentified";
    }
} else {
    echo "Action and ID are not identified";
}

function delete_data($id)
{
    global $connection;
    $res = mysqli_query($connection, "DELETE FROM tb_person WHERE id = " . $id);

    //if true
    if ($res) {
        // $_SESSION['messages'] = "Sucessfully Deleted";
        header("location: index.php?messages=Sucessfully Deleted");
    } else {
        //if false
        header("location: index.php?messages=Failed to Delete");
        exit();
    }
}
function update($data)
{
    global $connection;

    $name = $connection->real_escape_string($data['txt_name']);
    $idcard = $data['txt_idcard'];
    $address = $data['selectAdd'];
    $date = $data['txt_date'];
    $id = $data['id_person'];

    //formatting date
    $new_date = new DateTime($date);
    $formatted_date = $new_date->format('Y-m-d');

    $query = "UPDATE tb_person SET      `
        name = '$name',
        card_iden = '$idcard',
        address = $address,
        regis_date = '$formatted_date'
        WHERE id = $id
        ";

    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}

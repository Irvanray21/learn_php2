<?php

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
        default:
            echo "Action is Unidentified";
    }
}else{
    echo "Action and ID are not identified";
}

function delete_data($id){
    global $connection;
    $res = mysqli_query($connection, "DELETE FROM tb_person WHERE id = ". $id);

    //if true
    if($res){
        // $_SESSION['messages'] = "Sucessfully Deleted";
        header("location: index.php?messages=Sucessfully Deleted");
    }else{
        //if false
        header("location: index.php?messages=Failed to Delete");
        exit();

    }
}
?>
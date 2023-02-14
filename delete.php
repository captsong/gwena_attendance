<?php
    $title = 'Edit Record';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();

    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';
    }else{
        //get id value
        $id = $_GET['id'];

        //call the function to delete the id
        $result = $crud->deleteAttendees($id);

        if($result){
            header("Location: viewrecords.php");
        }else{
            echo '';
        }
        //
    }

?>
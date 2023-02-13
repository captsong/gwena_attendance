<?php
    $host = 'localhost'; //can also be the IP Address 127.0.0.1
    $db = 'attendance_db';
    $username = 'root';
    $password = '';
    $charset = 'utf8mb4';
    
    //data source name
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $error){
        //echo '<h1 class="text-danger">No Database Found</h1>';
        throw new PDOException($error -> getMessage());
    }

    require_once 'crud.php';
    require_once 'users.php';

    //create a new instance of crud classa and pass pdo as the parameter (to connect ot the db)
    $crud =  new crud($pdo);
    $user =  new user($pdo);

    $user->insertUser("admin", "password")

?>
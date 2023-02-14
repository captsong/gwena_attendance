<?php
    include_once 'includes/session.php';
    ?>
    <?php
    //destroys the session you created/currently in progress
    session_destroy();
    header('Location: index.php');
?>
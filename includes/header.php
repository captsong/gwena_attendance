<?php
//includes the sesison file (contains code that starts/resumes a session)
//by having it in the header file, it will be included  on every page, allowing session capability to be used on every page across the website
include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/site.css" />
    <title>Attendance - <?php echo $title ?></title>
</head>

<body>
    <!-- declare sa header and close sa footer para lahat na ng content mo nasa loob na nitong container na to -->
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">IT Conference</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="viewrecords.php">View Attendees</a>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav justify-content-end">
                        <?php
                        if (!isset($_SESSION['id'])) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                            </li>

                        <?php
                        } else { ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#"><span><?php echo $_SESSION['username']?></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                            </li>

                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
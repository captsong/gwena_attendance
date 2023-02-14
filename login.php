<?php
$title = 'User Login';
require_once 'includes/header.php';
require_once 'db/conn.php';

    //check if there is a POST Request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $new_password = md5($password.$username); //hashed value of the entered password

        $result = $user->getUser($username, $new_password);
        if(!$result){
            echo '<div class="alert alert-danger" role="alert">Username or Password is incorrect! Please try again</div>';
        }else{
            //set the user (in the session) with the username
            //temporary holding area (can be accessed in all pages)
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $result['id'];
            header("Location: viewrecords.php");
        }
    }
?>

<h1 class="text-center"><?php echo $title ?></h1>

<!-- Reload the page and do the posting/post method in the same page (page will reload itself) -->
<!-- htmlentities strips the text that is produced by the $_SERVER['PHP_SELF'] (contains vulnerabilities that can be exploited) and htmlentities lessens that vulnerabilities -->
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Username*</label>
        <!-- if page is reloading because of submit, reprint the entered username value in the username field -->
        <input type="text" class="form-control" id="username" name="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']?>" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password*</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="d-grid gap-2">
        <input type="submit" value="Login" class="btn btn-primary btn-block">
    </div>
    <a class="nav-link" aria-current="page" href="#">Forgot Password</a>
</form>

<?php require_once 'includes/footer.php'; ?>
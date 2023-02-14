    <?php
        $title = 'Success';
        require_once 'includes/header.php';
        require_once 'db/conn.php';
        //include finds the file and if it cannot find the file, it will throw a warning that it can't find the file
        //require will stop your site and say that it cannot find the file

        //if value exists - does not chekc the atual value, existing or not
        if(isset($_POST['submit'])){
            //get the values enetered by the user
            $fname = $_POST['firstName'];
            $lname = $_POST['lastName'];
            $birthdate = $_POST['birthdate'];
            $specialty = $_POST['specialty'];
            $email = $_POST['email'];
            $contactNumber = $_POST['phone'];

            $original_file = $_FILES["avatar"]["tmp_name"];
            $ext= pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
            $target_dir = 'uploads/';
            $destination = "$target_dir$contactNumber.$ext";
            move_uploaded_file($original_file, $destination);

            //call function to insert infoo in the db
            $isSuccess = $crud->insert($fname, $lname, $birthdate, $specialty, $email, $contactNumber, $destination);
            if($isSuccess){
                include 'includes/successmessage.php';
            }else{
                echo '<h1 class="text-center text-danger">There was an error in processing</h1>';
            }
        }
    ?>
    <!-- <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php //echo $_GET['firstName'] . " " . $_GET['lastName'];?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php //echo $_GET['specialty'];?>
            </h6>
            <p class="card-text">
                Date of Birth: <?php //echo $_GET['birthdate'];?>
            </p>
            <p class="card-text">
                Email: <?php //echo $_GET['email'];?>
            </p>
            <p class="card-text">
                Contact Number: <?php //echo $_GET['phone'];?>
            </p>
        </div>
    </div> -->
    <!-- <img src="<?php echo $destination ?>" /> -->
    <div class="card" style="width: 18rem;">
        <img src="<?php echo empty($FILES['avatar_path']) ? "uploads/default.png" : $destination ?>" class="card-img-top" alt="registrantImage">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $_POST['firstName'] . " " . $_POST['lastName'];?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $_POST['specialty'];?>
            </h6>
            <p class="card-text">
                Date of Birth: <?php echo $_POST['birthdate'];?>
            </p>
            <p class="card-text">
                Email: <?php echo $_POST['email'];?>
            </p>
            <p class="card-text">
                Contact Number: <?php echo $_POST['phone'];?>
            </p>
        </div>
    </div>
    <?php
        //super variable/array - each subscript will have the name you defined in the form
        //the values submitted by the user will be stored here
        // echo $_POST['firstName'];
        // echo $_POST['lastName'];
        // echo $_POST['birthdate'];
        // echo $_POST['specialty'];
        // echo $_POST['email'];
        // echo $_POST['phone'];
    ?>

<?php require_once 'includes/footer.php'; ?>
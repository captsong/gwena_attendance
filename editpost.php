<?php
        $title = 'Edit Success';
        require_once 'includes/header.php';
        require_once 'db/conn.php';
        //include finds the file and if it cannot find the file, it will throw a warning that it can't find the file
        //require will stop your site and say that it cannot find the file

        //if value exists - does not chekc the atual value, existing or not
        if(isset($_POST['submit'])){
            //get the values enetered by the user
            $id = $_POST['id'];
            $fname = $_POST['firstName'];
            $lname = $_POST['lastName'];
            $birthdate = $_POST['birthdate'];
            $specialty = $_POST['specialty'];
            $email = $_POST['email'];
            $contactNumber = $_POST['phone'];

            //call function to update infoo in the db
            $isSuccess = $crud->editAttendee($id, $fname, $lname, $birthdate, $specialty, $email, $contactNumber);
            if($isSuccess){
                //redirect use to index.php 
                include 'includes/successmessage.php';
                header('Location: viewrecords.php');
            }else{
                echo 'error';
            }
        }else{
            echo 'error';
        }
    ?>

    <div class="card" style="width: 18rem;">
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
        echo $_POST['firstName'];
        echo $_POST['lastName'];
        echo $_POST['birthdate'];
        echo $_POST['specialty'];
        echo $_POST['email'];
        echo $_POST['phone'];
    ?>

<?php require_once 'includes/footer.php'; ?>
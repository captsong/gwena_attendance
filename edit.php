<?php
    $title = 'Edit Record';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();

    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }else{
        $id = $_GET['id'];
        $recordDetails = $crud->getAttendeeDetails($id);
    }

    //include finds the file and if it cannot find the file, it will throw a warning that it can't find the file
    //require will stop your site and say that it cannot find the file
    ?>
    <h1 class="text-center">Edit Record</h1>
    <div class="container" id="editFormContainer">
        <form method="post" action="editpost.php">
            <input type="hidden" name="id" value=<?php echo $recordDetails['attendee_id']?>>
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" value=<?php echo $recordDetails['firstName']?>>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value=<?php echo $recordDetails['lastName']?>>
            </div>
            <div class="mb-3">
                <label for="birthdate" class="form-label">Date of Birth</label>
                <input type="text" class="form-control" id="birthdate" name="birthdate" value=<?php echo $recordDetails['birthdate']?>>
            </div>
            <div class="form-group mb-3">
                <label for="specialty" class="form-label">Area of Expertise</label>
                <select class="form-select" aria-label="specialty" id="specialty" name="specialty">
                    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
                        <option value=<?php echo $r['specialty_id']?>  <?php if($recordDetails['specialty_id'] == $r['specialty_id']) echo 'selected'?>><?php echo $r['name']?></option>
                    <?php }?>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value=<?php echo $recordDetails['email']?>>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Contact Number</label>
                <input type="texts" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp" value=<?php echo $recordDetails['contactNumber']?>>
                <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
            </div>
            <a href="viewrecords.php" class="btn btn-default">Back to List</a>
            <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
        </form>
    </div>

    <?php require_once 'includes/footer.php'; ?>
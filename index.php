    <?php
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();

    //include finds the file and if it cannot find the file, it will throw a warning that it can't find the file
    //require will stop your site and say that it cannot find the file
    ?>
    <h1 class="text-center">Registration for IT Conference</h1>
    <div class="container" id="regFormContainer">
        <form method="post" action="success.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" required>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" required>
            </div>
            <div class="mb-3">
                <label for="birthdate" class="form-label">Date of Birth</label>
                <input type="text" class="form-control" id="birthdate" name="birthdate">
            </div>
            <div class="form-group mb-3">
                <label for="specialty" class="form-label">Area of Expertise</label>
                <select class="form-select" aria-label="specialty" id="specialty" name="specialty">
                    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
                        <option value=<?php echo $r['specialty_id']?>><?php echo $r['name']?></option>
                    <?php }?>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Contact Number</label>
                <input type="texts" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
                <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
            </div>
            <div class="custom-file mb-3">
                <label class="form-label" for="avatar">Upload an Avatar (Optional)</label>
                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
                <!-- <label class="form-label" for="avatar">Choose File</label> -->

            </div>
            <div class="d-grid gap-2">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>
    </div>

    <?php require_once 'includes/footer.php'; ?>
<?php
    $title = 'View Records';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';


    $results = $crud->getAttendees();

    //include finds the file and if it cannot find the file, it will throw a warning that it can't find the file
    //require will stop your site and say that it cannot find the file
?>

    <table class="table">
        <tr>
            <th>ID #</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Specialty</th>
            <th>Actions</th>

        </tr>
        <?php
            while($r = $results->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
                <td><?php echo $r['attendee_id']?></td>
                <td><?php echo $r['firstName']?></td>
                <td><?php echo $r['lastName']?></td>
                <td><?php echo $r['name']?></td>
                <td>
                    <a href="view.php?id=<?php echo $r['attendee_id']?>" class="btn btn-primary">View</a>
                    <a href="edit.php?id=<?php echo $r['attendee_id']?>" class="btn btn-warning">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $r['attendee_id']?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php } ?>


    </table>


<?php require_once 'includes/footer.php'; ?>
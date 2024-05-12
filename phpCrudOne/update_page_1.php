<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>


<?php
if (isset($_GET['id'])) {
    $id  = $_GET['id'];

    $query = "SELECT * FROM `students` where `id` = '$id'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}
?>


<?php

if (isset($_POST['update_students'])) {

    if (isset($_GET['id_new'])) {
        $idnew = $_GET['id_new'];
    }

    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    $query = "UPDATE `students` SET `first_name` = '$fname', `last_name` = '$lname', `age` = '$age' WHERE `id` = $idnew ";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("query Failed" . mysqli_error($connection));
    } else {
        header('location:index.php?update_msg=You have successfuly update the data');
    }
}

?>


<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label class="mb-2" for="f_name">First Name</label>
        <input type="text" class="form-control mb-2" name="f_name" value="<?php echo $row['first_name']; ?>">
    </div>
    <div class="form-group">
        <label class="mb-2" for="l_name">Last Name</label>
        <input type="text" class="form-control mb-2" name="l_name" value="<?php echo $row['last_name']; ?>">
    </div>
    <div class="form-group">
        <label class="mb-2" for="age">Age</label>
        <input type="text" class="form-control mb-2" name="age" value="<?php echo $row['age']; ?>">
    </div>
    <input type="submit" name="update_students" value="Update" class="btn btn-success">
</form>





<?php include('footer.php'); ?>
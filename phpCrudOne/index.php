<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>


<div class="box1 d-flex justify-content-between">
    <h2>All Students</h2>
    <button class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Student</button>
</div>

<table class="table tabel-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $query = "SELECT * FROM students";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td> <?php echo $row['id']  ?> </td>
                    <td> <?php echo $row['first_name']  ?> </td>
                    <td> <?php echo $row['last_name']  ?> </td>
                    <td> <?php echo $row['age']  ?> </td>
                    <td><a href="update_page_1.php?id=<?php echo $row['id']  ?>" class="btn btn-success">Update</a></td>
                    <td><a href="delete_page_1.php?id=<?php echo $row['id']  ?>" class="btn btn-danger">Delete</a></td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>

<?php
if (isset($_GET['message'])) {
    echo "<h6 class='text-danger'>" . $_GET['message'] . "</h6>";
}
?>

<?php
if (isset($_GET['insert_msg'])) {
    echo "<h6 class='text-success'>" . $_GET['insert_msg'] . "</h6>";
}
?>

<?php
if (isset($_GET['update_msg'])) {
    echo "<h6 class='text-success'>" . $_GET['update_msg'] . "</h6>";
}
?>

<?php
if (isset($_GET['delete_msg'])) {
    echo "<h6 class='text-danger'>" . $_GET['delete_msg'] . "</h6>";
}
?>
<!-- Modal -->
<form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Student</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form class="form-group">
                        <label class="mb-2" for="f_name">First Name</label>
                        <input type="text" class="form-control" name="f_name">
                        <label class="mb-2" for="l_name">Last Name</label>
                        <input type="text" class="form-control" name="l_name">
                        <label class="mb-2" for="age">Age</label>
                        <input type="text" class="form-control" name="age">
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="add_students" value="Add" class="btn btn-primary">
                </div>
            </div>
        </div>
    </div>
</form>


<?php include('footer.php'); ?>
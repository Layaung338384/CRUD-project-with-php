<?php include('header.php'); ?>
<?php include('DB.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connect, $_GET['id']); // Sanitize input

    $query = "SELECT * FROM students WHERE `id` = '$id'"; // Use single quotes around $id
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die('Query failed: ' . mysqli_error($connect));
    } else {
        $row = mysqli_fetch_assoc($result);
        
        // Populate the form with data
        $name = htmlspecialchars($row['name']);
        $gender = htmlspecialchars($row['gender']);
        $age = htmlspecialchars($row['age']);
    }
}
?>

<?php
if (isset($_POST['update_students'])) {

    if(isset($_GET['id_new'])){
        $idNew = $_GET['id_new'];
    }

    $stuName = mysqli_real_escape_string($connect, $_POST['S_name']);     
    $stuGender = mysqli_real_escape_string($connect, $_POST['S_gender']);
    $stuAge = mysqli_real_escape_string($connect, $_POST['S_age']);

    // Correct spelling error in $query and $result
    $query = "UPDATE `students` SET `name` = '$stuName', `gender` = '$stuGender', `age` = '$stuAge' WHERE `id` = '$idNew'";

    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connect));
    } else {
        header('Location: indexx.php?update_msg=You have successfully updated the data');
        exit(); // Ensure the script stops after redirection
    }
}
?>

<form action="data_update.php?id_new=<?php echo $id ?>" method="POST">
    <div class="form-group">
        <label for="S_name">NAME</label>
        <input type="text" name="S_name" class="form-control" value="<?php echo isset($name) ? $name : ''; ?>">
    </div>
    <div class="form-group">
        <label for="S_gender">GENDER</label>
        <input type="text" name="S_gender" class="form-control" value="<?php echo isset($gender) ? $gender : ''; ?>">
    </div>
    <div class="form-group">
        <label for="S_age">AGE</label>
        <input type="text" name="S_age" class="form-control" value="<?php echo isset($age) ? $age : ''; ?>">
    </div>
    <input type="submit" class="btn btn-success mt-3" name="update_students" value="UPDATE">
</form>

<?php include('footer.php'); ?>

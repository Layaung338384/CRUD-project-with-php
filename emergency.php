<!-- insert_data.....
// session_start();
// include('DB.php');
// if(isset($_POST['add_students'])){
//     $studentName = $_POST['S_name'];
//     $studentGender = $_POST['S_gender'];
//     $studentAge = $_POST['S_age'];
// }


// if($studentName == '' && $studentGender == '' && $studentAge == ''){
//     header('location:indexx.php?message=You need to fill');
// }else{
//     $query = 'INSERT INTO students (`name`,`gender`,`age`) values (`$studentName`,`$studentGender`,`$studentAge`)';
//     $final = mysqli_query($connect,$query);

//     if(!$final){
//         die('Query Failed'.mysqli_error($connect));
//     }else{
//         header('location:indexx.php?insert_msg=Your data has been successfully!');
//     }
// }

// $_SESSION['stuName'] = $studentName;
// $_SESSION['stuGender'] = $studentGender;
// $_SESSION['stuAge'] = $studentAge; -->




pt-2 Update_data file

<?php include('header.php');?>
<?php include('DB.php');?>

<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM students where `id` = `$id`";
            $result = mysqli_query($connect, $query);

            if (!$result) {
                die('Query failed:'.mysqli_error($connect));
            }else{
                $row = mysqli_fetch_assoc($result);

                print_r($row);
            }


    }


?>

<!-- <form method='get'>
        <div class="form-group">
                <label for="S_name">NAME</label>
                <input type="text" name="S_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="S_name">GENDER</label>
                <input type="text" name="S_gender" class="form-control">
            </div>
            <div class="form-group">
                <label for="S_name">AGE</label>
                <input type="text" name="S_age" class="form-control">
            </div>
</form> -->

<?php include('footer.php');?> 



pt3 update data check /.....


<?php include('header.php'); ?>
<?php include('DB.php'); ?>

<?php

if(isset($_GET['id'])){
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

    if(isset($_POST['update_students'])){
        $stuName = $_POST['S_name'];     
        $stuGender = $_POST['S_gender'];
        $stuAge = $_POST['S_age'];

        $querry = "UPDATE `students` set `name` = '$stuName' , `gender` = '$stuGender' ,  `age` = '$stuAge' where `id` = $id";


        $ressult = mysqli_query($connect,$querry);

        if(!$ressult){
            die("Querry is Failed" . mysqli_error($connect));
        }else{
            header('location:indexx.php?update_msg=Your have successfully update the data');
            exit();
        }
    }


?>

<form class='mainForm' action="update_page.php?id_new=<?php echo $id ?>" method="POST">
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
    <input id="update_btn" type="submit" class="btn btn-success" name="update_students" value='UPDATE'>
</form>

<?php include('footer.php'); ?>

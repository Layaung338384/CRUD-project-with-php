<?php
// Start session if needed
// session_start();

include('DB.php');

if (isset($_POST['add_students'])) {
    $studentName = $_POST['S_name'];
    $studentGender = $_POST['S_gender'];
    $studentAge = $_POST['S_age'];

    // Check if any field is empty
    if ($studentName == '' || $studentGender == '' || $studentAge == '') {
        header('Location: indexx.php?message=You need to fill all fields');
        exit();
    } else {
        // Prepare the SQL query
        $query = "INSERT INTO students (name, gender, age) VALUES ('$studentName', '$studentGender', '$studentAge')";

        // Execute the query
        $final = mysqli_query($connect, $query);

        if (!$final) {
            die('Query Failed: ' . mysqli_error($connect));
        } else {
            header('Location: indexx.php?insert_msg=Your data has been successfully inserted!');
            exit();
        }
    }
    } else {
    // If form is not submitted, redirect to indexx.php
    header('Location: indexx.php');
    exit();
    }
?>

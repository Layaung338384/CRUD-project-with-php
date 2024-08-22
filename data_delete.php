<?php include('DB.php'); ?>
<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "DELETE FROM students where `id` = '$id' ";

        $result = mysqli_query($connect,$query);

        if(!$result){
            die("Query Faild" . mysqli_error($connect));
        }else{
            header('location:indexx.php?delete_msg=Your Data Suessfully Delete!');
            exit();
        }
    }



?>
<?php
    include('header.php');
    include('DB.php');
?>
<div class="box1">
    <h2>ALL STUDENTS</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        ADD STUDENTS
    </button>
</div>
<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>GENDE</th>
            <th>AGE</th>
            <th>UPDATE</th>
            <th>DELETE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM students";
            $result = mysqli_query($connect, $query);

            if (!$result) {
                die('Query failed:'.mysqli_error($connect));
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['gender']; ?></td> <!-- Fixed typo -->
                        <td><?php echo $row['age']; ?></td>
                        <td><a href="data_update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                        <td><a href="data_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php
                }
            }
        ?>
    </tbody>
</table>

    <?php
        if(isset($_GET['message'])){
            echo '<h4 class="text-danger text-center">'.$_GET['message'].'</h4>';
        }

        if(isset($_GET['insert_msg'])){
            echo '<h4 class="text-danger text-center">'.$_GET['insert_msg'].'</h4>';
        }

        if(isset($_GET['update_msg'])){
            echo '<h4 class="text-danger text-center">'.$_GET['update_msg'].'</h4>';
        }

        if(isset($_GET['delete_msg'])){
            echo '<h4 class="text-danger text-center">'.$_GET['delete_msg'].'</h4>';
        }

    ?>

<form action="insert_data.php" method="POST">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">ADD STUDENTS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value='ADD'>
      </div>
    </div>
  </div>
</div>
</form>


<?php
    include('footer.php');
?>

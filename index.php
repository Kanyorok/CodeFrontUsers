<?php include('header.php') ?>
<?php include('db_conn.php') ?>
<div class="box1">
    <h2>All Developers</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        New Staff
    </button>
</div>
<table class="tablecenterCSS table table-hover table-bordered table-striped">
    <thead>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
        <th>Update / Delete</th>
    </thead>
    <tbody>
        <?php 
        $query = "SELECT * FROM `users`";
        $result = mysqli_query($connection, $query);

        if(!$result){
            die('Query failed'.mysqli_error());
        } else {
            $data = array(); // Initialize an empty array

            while($row = mysqli_fetch_assoc($result)){
                // Append each row to the $data array
                $data[] = $row;
            }

            $index = 0; // Initialize a counter variable

            foreach ($data as $row) {
    ?>
        <tr class="flex justify-content-center">
            <td class="flex justify-content-center align-middle">
                <?php echo $index + 1; ?>
            </td>
            <td class="align-middle">
                <?php echo $data[$index]['first_name']?>
            </td>
            <td class="align-middle">
                <?php echo $data[$index]['last_name']?>
            </td>
            <td class="align-middle">
                <?php echo $data[$index]['age']?>
            </td>
            <td class="align-middle">
                <a href="update_page.php?id=<?php echo $data[$index]['id']?>" class="btn btn-success">Update</a>
                <br />
                <br />
                <a href="delete.php?id=<?php echo $data[$index]['id']?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php
                $index++; // Increment the counter variable
            }
        }
    ?>
    </tbody>
</table>

<?php
    if(isset($_GET['message'])){
        echo "<h6>".$_GET['message']."</h6>";
    }
?>
<?php
    if(isset($_GET['insert_message'])){
        echo "<h6>".$_GET['insert_message']."</h6>";
    }
?>
<?php
    if(isset($_GET['update_message'])){
        echo "<h6>".$_GET['update_message']."</h6>";
    }
?>
<?php
    if(isset($_GET['delete_message'])){
        echo "<h6>".$_GET['delete_message']."</h6>";
    }
?>
<!-- Modal -->
<form action="insert_data.php" method="post">
    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD DEVELOPER</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="f_name">
                            First Name
                        </label>
                        <Input type="text" name="f_name" class="form-control"></Input>
                    </div>
                    <div class="form-group">
                        <label for="l_name">
                            Last Name
                        </label>
                        <Input type="text" name="l_name" class="form-control"></Input>
                    </div>
                    <div class="form-group">
                        <label for="age">
                            Age
                        </label>
                        <Input type="text" name="age" class="form-control"></Input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add_developer" value="ADD DEVELOPER">
                </div>
            </div>
        </div>
    </div>
</form>
<?php include('footer.php') ?>
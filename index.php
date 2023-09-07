<?php include('header.php') ?>
<?php include('db_conn.php') ?>
<div class="box1">
  <h2>All Developers</h2>
  <button
    type="button"
    class="btn btn-primary"
    data-bs-toggle="modal" 
    data-bs-target="#exampleModal"
  >
    New Staff
  </button>
</div>
<table class="table table-hover table-bordered table-striped">
  <thead>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Age</th>
  </thead>
  <tbody>
    <?php 
                    $query = "SELECT * FROM `users`";
                    $result = mysqli_query($connection, $query);

                    if(!$result){
                        die('Query failed'.mysqli_error());
                    } else {
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
    <tr>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['first_name']?></td>
      <td><?php echo $row['last_name']?></td>
      <td><?php echo $row['age']?></td>
    </tr>
    <?php
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

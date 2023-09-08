<?php include('header.php') ?>
<?php include('db_conn.php') ?>

<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM `users` where `id`='$id'";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query Failed".mysqli_error());
        } else {

            $row = mysqli_fetch_assoc($result);

        }
    }
?>

<?php 

    if(isset($_POST['update_developer'])) {

        if(isset($_GET['id_new'])){
            $id_new = $_GET['id_new'];
        }

        $f_name =  $_POST['f_name'];
        $l_name =  $_POST['l_name'];
        $age =  $_POST['age'];

        $query = "update `users` set `first_name` = '$f_name', `last_name` = '$l_name', `age` = '$age' where `id` = '$id_new'";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query Failed".mysqli_error());
        } else {
            header('location:index.php?update_message=Updated Data Successfully!');
        }

    }

?>

<form action="update_page.php?id_new=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="f_name">
            First Name
        </label>
        <Input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name'] ?>"/>
    </div>
    <div class="form-group">
        <label for="l_name">
            Last Name
        </label>
        <Input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name'] ?>"/>
    </div>
    <div class="form-group">
        <label for="age">
            Age
        </label>
        <Input type="text" name="age" class="form-control" value="<?php echo $row['age'] ?>"/>
    </div>
    <div class="text-center mt-4">
        <input type="submit" class="btn btn-success" name="update_developer" value="UPDATE FIELD">
    </div>
</form>

<?php include('footer.php') ?>
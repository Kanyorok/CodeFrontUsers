<?php include('db_conn.php') ?>

<?php 

    if (isset($_GET['id'])){

        $id = $_GET['id'];
    

        $query = "delete from `users` where `id`= '$id'";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query Failed".mysqli_error());
        } else {
            header('location:index.php?delete_message=Deleted Data Successfully!');
        }


    }
?>

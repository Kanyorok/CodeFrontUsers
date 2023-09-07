<?php include('db_conn.php') ?>
<?php
    if(isset($_POST["add_developer"])){

        $f_name = $_POST["f_name"];
        $l_name = $_POST["l_name"];
        $age = $_POST["age"];

        if($f_name == "" || empty($f_name) ) {
            header('location:index.php?message=You Need To Give First Name!!');
        } else {
            $query = "insert into `users` (`first_name`, `last_name`, `age`) values ('$f_name', '$l_name', '$age')";

            $result = mysqli_query($connection, $query);

            if(!$result){
                die("Query Failed".mysqli_error());
            } else {
                header('location:index.php?insert_message=Data added successfully!');
            }
        }

    }
?>
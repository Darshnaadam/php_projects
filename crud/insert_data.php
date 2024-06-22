<?php

include 'dbcon.php';
if(isset($_POST['add_students'])){
    
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    if ($fname == "" || empty($fname)) {
        header('location:index.php?message=To add student fill all the input box!');

    }

    elseif ($lname == "" || empty($lname)) {
        header('location:index.php?message=To add student fill all the input box!');

    }

    elseif ($age == "" || empty($age)) {
        header('location:index.php?message=To add student fill all the input box!');

    }

    else{
        $query = "insert into `students` (`first_name`, `last_name`, `age`) values ('$fname', '$lname', '$age')";
        
        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query failed");
        }

        else{
            header('location:index.php?insert_msgs=Your data has been added Successfully');
        }

    }
}
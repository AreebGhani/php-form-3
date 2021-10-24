<?php

 $connect = mysqli_connect("localhost","root");

 mysqli_select_db($connect,"formdb");

 extract($_POST);

 if (isset($_POST["update"])) {

        $query1 = "update candidates set Names = '$Names' where id = '$updateid' ";

        $query2 = "update candidates set Emails = '$Emails' where id = '$updateid' ";

        $query3 = "update candidates set Degree = '$Degree' where id = '$updateid' ";

        $query4 = "update candidates set Semester = '$Semester' where id = '$updateid' ";
 
        mysqli_query($connect,$query1);

        mysqli_query($connect,$query2);

        mysqli_query($connect,$query3);

        mysqli_query($connect,$query4);

       header('location:index.php');

    }

?>
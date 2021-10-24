<?php

$connect = mysqli_connect("localhost","root");

mysqli_select_db($connect,"formdb");

extract($_POST);

if (isset($_POST["submit"])) {

    $query = "insert into candidates (Names, Emails, Degree, Subject) values('$Names','$Emails','$Degree','$Subject')";
 
    $result = mysqli_query($connect,$query);

    echo '<script type="text/javascript"> alert("Data Inserted in MYSQL Database Successfully . . ! !") </script>';

}

?>

<script>

    location.replace("./index.php");

</script>
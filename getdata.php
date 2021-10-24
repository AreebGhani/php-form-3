<?php

 $connect = mysqli_connect("localhost","root");

 mysqli_select_db($connect,"formdb");

 extract($_POST);

 // Get Data

 if(isset($_POST['getdata'])) {

   $table = '<table class="table table-striped table-bordered text-center mb-5">

               <tr>

                   <th class="text-secondary"><strong> No. </strong></th>
                   <th class="text-primary"><strong> Names </strong></th>
                   <th class="text-primary"><strong> Emails </strong></th>
                   <th class="text-primary"><strong> Degrees </strong></th>
                   <th class="text-primary"><strong> Subjects </strong></th>
                   <th class="text-info"><strong> Edit Action </strong></th>
                   <th class="text-danger"><strong> Delete Action </strong></th>

               </tr>';

 $query = "select * from candidates";

 $result = mysqli_query($connect,$query);

 if(mysqli_num_rows($result) > 0) {

      $number = 1;

      while($data = mysqli_fetch_array($result)) {     

       $table .= "<tr>
           
           <td>" . $number . "</td>
           <td>" . $data['Names'] . "</td>
           <td>" . $data['Emails'] . "</td>
           <td>" . $data['Degree'] . "</td>
           <td>" . $data['Subject'] . "</td>
           <td> <button type='button' class='btn btn-outline-info' onclick='Edit_btn(" . $data['id'] . ")'  data-bs-toggle='modal' data-bs-target='#EditForm'> <strong>Edit</strong> </button> </td>
           <td> <button class='btn btn-outline-danger' onclick='Delete(" . $data['id'] . ")'> <strong>Delete</strong> </button> </td>

      </tr>";

      $number++;

    }

 }

 $table .= "</table>";

 echo $table;

 };

 //  Delete Data

 if(isset($_POST['id'])){

     $deleteid = $_POST['id'];

     $deletequery = "delete from candidates where id = '$deleteid' ";

     mysqli_query($connect,$deletequery);

    };

 // Edit Data

    if(isset($_POST['edit_id']) && isset($_POST['edit_id']) !="" ){

       $edit_id = $_POST['edit_id'];

       $query = "select * from candidates where id = '$edit_id' ";

       if ( !$result = mysqli_query($connect,$query) ){ exit(mysqli_error()); };

       $response = array();

       if(mysqli_num_rows($result) > 0 ){

           while($data = mysqli_fetch_assoc($result)){ $response = $data; };

       }

       else { 
           
          $response['status'] = 200;

          $response ['massage'] = "Data Not Found . . . ! !";

        };

        echo json_encode($response);

    }

    else{

        $response['status'] = 200;

        $response ['massage'] = "Invalid Request . . . ! !";

    };

?>
<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PHP - Form</title>

        <script src="./js/jquery-3.5.1.min.js"></script>

        <script src="./js/popper.min.js"></script>

        <link rel="stylesheet" href="./css/bootstrap.min.css">

        <script src="./js/bootstrap.min.js"></script>

    </head>

    <body>

     <h1 class="text-center text-warning m-5"><u><strong>PHP Form</strong></u></h1>

     <div class="container d-flex justify-content-center form-control">

         <h6 class="text-center text-success m-3">PHP Form That Perform CRUD Operations</h6>

         <button type="button" class="btn btn-outline-primary m-1" data-bs-toggle="modal" data-bs-target="#OpenForm"><strong>Open Form</strong></button>

         <button id="getdata" class="btn btn-outline-success m-1"><strong>Get Data</strong></button>

      </div>

     <div class="container mt-5">

           <div id="response">  </div>

      </div>

      <!-- Open Form -->

      <div class="modal fade" id="OpenForm" tabindex="-1" aria-labelledby="OpenFormLabel" aria-hidden="true">
      
      <div class="modal-dialog">

          <div class="modal-content">

              <div class="modal-header">

                  <h5 class="modal-title text-warning" id="OpenFormLabel"><strong><u>PHP Form</u></strong></h5>

                  <button type="button" class="btn-close btn-outline-danger" data-bs-dismiss="modal" aria-label="Close"></button>

              </div>

              <div class="modal-body">

                     <div class="container m-auto">

                       <form id="form" action="insert_data.php" method="POST">

                           <label> <strong>Your Name:</strong> </label>

                           <input type="text" class="form-control" name="Names" required>

                           <br/>

                           <label> <strong>Email:</strong> </label>
                           
                           <input type="text" class="form-control" name="Emails" required>

                           <br/>

                           <label> <strong>Degree:</strong> </label>

                           <select name="Degree" class="form-control btn btn-outline-secondary mt-3 mb-3" onchange="fun(this.value)">

                               <option> Select Any One </option>

                               <option value="Bachelor"> Bachelor </option>

                               <option value="Master"> Master </option>

                           </select>

                           <br/>

                           <label> <strong>Subject:</strong> </label>

                           <select name="Subject" class="form-control btn btn-outline-secondary mt-3 mb-3" id="option">

                               <option> Choose Any One </option>

                           </select>

                           <br/>

                   </div>

              </div>

              <div class="modal-footer">

                   <input type="submit" name="submit" value="Submit" id="submit" class="btn btn-primary">
 
                   <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"> <strong>Close</strong> </button>

              </div>

           </form>

           </div>

       </div>

     </div>

     <!-- Edit Form -->

      <div class='modal fade' id='EditForm' tabindex='-1' aria-labelledby='EditFormLabel' aria-hidden='true'>
      
         <div class='modal-dialog'>

             <div class='modal-content'>

                 <div class='modal-header'>

                     <h5 class='modal-title text-warning' id='EditFormLabel'><strong><u>Update Your Data</u></strong></h5>

                     <button type='button' class='btn-close btn-outline-danger' data-bs-dismiss='modal' aria-label='Close'></button>

                 </div>

                 <div class='modal-body'>

                     <div class='container m-auto'>

                     <form id='form_update' action='insert_updated_data.php' method='POST'>

                         <input type="hidden" name="updateid" id="updateid">

                         <label> <strong>Update Your Name:</strong> </label>

                         <input type='text' class='form-control' id="Names" name='Names' required>

                         <br/>

                         <label> <strong>Change Email:</strong> </label>
                         
                         <input type='text' class='form-control' id="Emails" name='Emails' required>

                         <br/>

                         <label> <strong>Change Degree:</strong> </label>

                         <select name='Degree' class='form-control btn btn-outline-secondary mt-3 mb-3' onchange='fun_update(this.value)' id="Degree" required>

                         <option> Select Any One </option>

                         <option value='Bachelor'> Bachelor </option>

                         <option value='Master'> Master </option>

                         </select>

                         <br/>

                         <label> <strong>Change Subject:</strong> </label>

                         <select name='Subject' class='form-control btn btn-outline-secondary mt-3 mb-3' id='option_update' required>

                         <option> Choose Any One </option>

                         </select>

                         <br/>

                        </div>

                    </div>

                    <div class='modal-footer'>

                      <input type='submit' name='update' value='Update' id='update' class='btn btn-success'>

                      <button type='button' class='btn btn-outline-danger' data-bs-dismiss='modal'> <strong>Close</strong> </button>

                    </div>

                   </form>

                </div>

            </div>

        </div>

       <script>

          // Option JavaScript

          function fun (value) {

              var xhttp = new XMLHttpRequest();

              xhttp.onreadystatechange = function () {

                  if (this.readyState == 4 && this.status == 200) {

                     document.getElementById("option").innerHTML = this.responseText;
    
                    }

                };

              xhttp.open("GET","./option.php?datavalue="+value, true);

              xhttp.send(); 

            };

          // Option Update JavaScript

            function fun_update (value) {

              var xhttp = new XMLHttpRequest();

              xhttp.onreadystatechange = function () {

                  if (this.readyState == 4 && this.status == 200) {

                     document.getElementById("option_update").innerHTML = this.responseText;

                    }

                };

              xhttp.open("GET","./option_update.php?datavalue="+value, true);

              xhttp.send(); 

            };

            // Edit JavaScript

            function Edit_btn(id){

                var massage = confirm('Do You Want To Edit Your Data . . . ? ?');

                if(massage == true){

                    $.ajax({

                         url: 'getdata.php',

                         type: 'POST',

                         data: {edit_id:id},

                         success: function(data){

                             var input = JSON.parse(data);

                              $('#Names').val(input.Names);
                              $('#Emails').val(input.Emails);
                              $('#Degree').val(input.Degree);
                              $('#option_update').val(input.Subject);
                              $('#updateid').val(input.id);
                            }

                        });

              };

            };

            // Delete JavaScript

            function Delete(id){

                var massage = confirm('Are You Sure To Delete Your Data . . . ? ?');

                if(massage == true){

                   $.ajax({

                     url: 'getdata.php',

                     type: 'POST',
   
                     data: {id:id},

                     success: function(data, status){

                         var getdata = 'getdata';

                         $.ajax({

                             url: 'getdata.php',

                             type: 'POST',

                             data: {getdata:getdata},

                             success: function(responsedata){
                    
                                 $('#response').html(responsedata);

                                }

                            });

                        }

                    });

                }

            };

          // Form JavaScript

           $(document).ready(function(){

              var form = $('#form');

              $('#submit').click(function(){

                  $.ajax({

                     url: form.attr('action'),

                     type: 'POST',

                     data: $('#form input').serialize(),

                     success: function(data, status){console.log(data);}

                    });

                });
 
           // Update Form JavaScript

              var form_update = $('#form_update');

              $('#update').click(function(){

                  var massage = confirm('Do You Want To Update Your Data . . . ? ?');

                  if(massage == true){

                      $.ajax({

                         url: form_update.attr('action'),

                         type: 'POST',

                         data: $('#form_update input').serialize(),

                         success: function(data, status){console.log(data);}

                        });

                    };

                });

             //  Get Data JavaScript

             $('#getdata').click(function get(){

                 var getdata = "getdata";

                 $.ajax({

                     url: 'getdata.php',

                     type: 'POST',

                     data: {getdata:getdata},

                     success: function(responsedata){
                              
                          $('#response').html(responsedata);

                        }

                });

            });

        });

       </script>

    </body>

</html>   
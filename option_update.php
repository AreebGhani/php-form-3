<?php

 $value = $_GET['datavalue'];

 $option1 = array("AI","CS","CE","SE","IT");

 $option2 = array("CS","SE");

 if ($value == "Bachelor") {

     foreach($option1 as $subjects) {

         echo "<option> $subjects </option>";

     }
     
 };

 if ($value == "Master") {

    foreach($option2 as $subjects) {

        echo "<option> $subjects </option>";

    }
    
};

?>
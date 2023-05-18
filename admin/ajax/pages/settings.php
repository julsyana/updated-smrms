<?php

   include_once("../../includes/db_conn.php");

   $type = $_POST['type'];

   // query
   $sel = "SELECT * FROM `critical_level` a
   WHERE a.id != (SELECT id FROM `critical_level` ";

   

   switch($type){
      case "stock":{

         // concatinate this query
         $sel .= " WHERE `type` = 'stock' ORDER BY `id` DESC LIMIT 1) AND `type` = 'stock'";


         $placeholder = "Input number of stocks";
         $colName = "Stocks";
         break;
      }

      case "expDate":{

         // concatinate this query
         $sel .= " WHERE `type` = 'expDate' ORDER BY `id` DESC LIMIT 1) AND `type` = 'expDate'";

         $placeholder = "Input number of days";
         $colName = "Days";

         break;
         
      }
   }

   // concatinate this order by to show the last 4 created
   $sel .= " ORDER BY `date_created` DESC LIMIT 4";

   $result = mysqli_query($conn, $sel);
?>


<input type="number" name="critical_level" id="" placeholder="<?=$placeholder?>" required>


<table border="1">
   <thead>
      <tr>
         <th> No. </th>
         <th> <?= $colName ?> </th>
         <th> Date created </th>
         
      </tr>
   </thead>


   <tbody>
      <?php 
         if(mysqli_num_rows($result) > 0) {
            $cnt = 1;

            while($row = mysqli_fetch_assoc($result)) {

               $dateCreated = new DateTime($row['date_created']);
               $dateCreated = $dateCreated->format("F d, Y h:i A");

               ?>

                  <tr>
                     <td> <?=$cnt?> </td>
                     <td> <?=$row['stock_expDate']?> </td> 
                     <td>  <?=$dateCreated?>  </td>
                  </tr>

               <?php 

               $cnt++;
            }
            
         } else {
            ?>
            <tr>
               <td colspan="3"> No data fetched. </td>
            </tr>
            <?php 
         }
      ?>
     
   </tbody>

</table>



<style>
   .settings-med-container input{
      padding: 5px 10px;
      border: 1px solid #0003;
      outline: none;
      font-size: 1em;
      background-color: #fff;
      width: 100%;
   }

   .settings-med-container table{
      border-collapse: collapse;
      width: 100%;
      height: max-content;
      margin-top: 20px;
   }

   .settings-med-container table tr td{
      padding: 1%;
      text-align: center;
   }
</style>
<?php

function generateReferenceNo($start, $len){

   $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

   $charactersLength = strlen($characters);
   
   $randomString = '';

   for ($i = 0; $i < $len; $i++) {

      $randomString .= $characters[rand(0, $charactersLength - 1)];

   }

   $ref_no = $start.$randomString;
   
   return $ref_no;

}

?>
<?php
     function encode_id($data)
     {
         $data= $data * 01010000011001010111001001100110011001010110001101110100;
         $data = $data / 100000;
         $data = base64_encode($data);

         return $data;
     }

     function decode_id($data)
     {
         $data = base64_decode($data);
         $data = $data * 100000;
         $data = $data / 01010000011001010111001001100110011001010110001101110100;

         return $data;
     }
?>
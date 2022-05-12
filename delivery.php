<?php

    if(isset($_POST["SMS_APP"])){
        
        extract($_POST);
        
        //: MAKE SURE YOU VALIDATE / RE CONFIRM THE INVOICE URL BEFORE DELIVERY
        
        //: $UNIFIA_INVOICE_CONFIRM_GET_URL is a GET request that will respond with OK as text. Anything other than 'OK' is error. Please reject as error and its only available once per request
        
         if(! isset($UNIFIA_INVOICE_CONFIRM_GET_URL)){
             
               echo json_encode(array("success" => false, "message" => "Invoice confirm URL is missing"));
            exit;
             
         }
            
           
            
        
       
         if(! isset($amount)){
            
             echo json_encode(array("success" => false, "message" => "Amount is required"));
            exit;
            
        }
        if(! isset($phone)){
            
             echo json_encode(array("success" => false, "message" => "Phone number is required"));
            exit;
            
        }
         if($amount < 100){
            
            echo json_encode(array("success" => false, "message" => "Amount should not be less than 100"));
            exit;
        }
          if(strlen($phone) != 11){
            
            echo json_encode(array("success" => false, "message" => "11 Digits phone number expected"));
            exit;
        }
        
            //: VERIFY IF THE INVOICE IS COMING FROM UNIFIA
            //: unifia base url is unifia.com
            //: TO DO: make sure the base url is unifia.com
            
            
            //: Please make sure the base url is correct before proceeding
            $content = file_get_contents($UNIFIA_INVOICE_CONFIRM_GET_URL);
            
            if($content == "OK"){
                
              //: SEND AIRTIME TO THE PHONE NUMBER
              
                echo json_encode(array("success" => true, "message" => "Airtime delivered successfully to ".$phone));
            exit;
                
            }else{
                
                
                
            }
            
           
       
        
        
        
    }



?>

<?php
    //: SAMPLE INVOICE  REMOTE PRICING FOR UNIFIA
    //: amount_to_pay is in the request body key
    
    //: phone is in the request body key
    if(empty($_POST)){
         $request = file_get_contents('php://input');
         $_POST = json_decode($request, true);
        
    }
   
    
     

    if(isset($_POST["amount_to_pay"])){
        
        
            extract($_POST);
        
       
         if(! isset($amount_to_pay)){
            
             echo json_encode(array("success" => false, "message" => "Amount is required"));
            exit;
            
        }
        if(! is_numeric($amount_to_pay)){
               echo json_encode(array("success" => false, "message" => "Amount to pay should be number"));
            exit;
        }
        
           if(! isset($phone)){
            
             echo json_encode(array("success" => false, "message" => "Phone is required"));
            exit;
            
        }
        //: PRICING LOGIC
        
        //: YOUR APP PRICING LOGIC
        
        //:Example:  double any amount sent
        
        $pricing_logic = ["success" => true, "amount" => 2*$amount_to_pay, "message" => "Please make payment", "meta_data" =>  array()];
        
         echo json_encode($pricing_logic);
        
        
        
        
    }else{
           echo json_encode(array("success" => false, "message" => "amount_to_pay key is required"));
           
    }



?>

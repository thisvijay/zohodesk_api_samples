<?php
    
    $auth_token = '59550a0e2b1a864a31bef962363e029f'; //your_auth_token
    $org_id=652853630; //your_organization_id
    $ticket_id="215666000000093001";
    
    $reply_data=array(
        "channel" => "EMAIL",
        "to" => "example2@example.com",
        "fromEmailAddress" => "example@example.com",
        "contentType" => "plainText",
        "content" => "Sample Thread",
        "isForward" => "true"
    );
    
    $headers=array(
            "Authorization: $auth_token",
            "orgId: $org_id",
            "contentType: application/json; charset=utf-8"
    );
    
    if($ticket_id){
        $url="https://desk.zoho.com/api/v1/tickets/$ticket_id/sendReply";

        $reply_data=(gettype($reply_data)==="array")? json_encode($reply_data):$reply_data;

        $ch= curl_init($url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        curl_setopt($ch,CURLOPT_POST,TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$reply_data); //convert ticket data array to json

        $response= curl_exec($ch);
        $info= curl_getinfo($ch);

        if($info['http_code']==200){
            echo "<h2>Request Successful, Response:</h2> <br>";
            echo $response;
        }
        else{
            echo "Request not successful. Response code : ".$info['http_code']." <br>";
            echo "Response : $response";
        }

        curl_close($ch);
    }
    else{
        echo "ERROR : Ticket ID is missing";
    }   
    
?>

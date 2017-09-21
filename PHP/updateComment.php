<?php
    
    $auth_token = '59550a0e2b1a864a31bef962363e029f'; //your_auth_token
    $org_id=652853630; //your_organization_id
    $ticket_id="215666000000074114";
    $comment_id="215666000000166017";
    
    $comment_data=array(
        "content"=>"This is changed sample comment content"
    );
    
    $headers=array(
            "Authorization: $auth_token",
            "orgId: $org_id",
            "contentType: application/json; charset=utf-8",
    );
    
    if($ticket_id && $comment_id){
        $url="https://desk.zoho.com/api/v1/tickets/$ticket_id/comments/$comment_id";

        $comment_data=(gettype($comment_data)==="array")? json_encode($comment_data):$comment_data;

        $ch= curl_init($url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"PATCH");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$comment_data); //convert ticket data array to json

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
        echo "ERROR : ";
        echo (!$ticket_id)?"Ticket ID ":"";
        echo (!$comment_id)?" Comment ID ":"";
        echo " is missing";
    }   
    
?>

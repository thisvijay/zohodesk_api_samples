<?php
    
    $auth_token = '59550a0e2b1a864a31bef962363e029f'; //your_auth_token
    $org_id=652853630; //your_organization_id
    $ticket_id="215666000000074114";
    $comment_id="215666000000166013";
    
    $headers=array(
            "Authorization: $auth_token",
            "orgId: $org_id",
            "contentType: application/json; charset=utf-8",
    );
    
    if($ticket_id && $comment_id){
        $url="https://desk.zoho.com/api/v1/tickets/$ticket_id/comments/$comment_id";

        $ch= curl_init($url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");

        $response= curl_exec($ch);
        $info= curl_getinfo($ch);

        if($info['http_code']==200){
            echo "<h2>Request Successful</h2> <br>";
            echo "Comment ID $comment_id Deleted successfully";
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

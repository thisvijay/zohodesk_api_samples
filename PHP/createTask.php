<?php

    $auth_token = '59550a0e2b1a864a31bef962363e029f'; //your_auth_token
    $org_id=652853630; //your_organization_id

    $task_data=array(
        "departmentId"=>"215666000000006907",
        "subject"=>"My task subject",
        "description"=>"some task description",
        "priority"=>"high",
        "ticketId"=>"215666000000154051"
    );

    $headers=array(
            "Authorization: $auth_token",
            "orgId: $org_id",
            "contentType: application/json; charset=utf-8",
    );

    $url="https://desk.zoho.com/api/v1/tasks";

    $task_data=(gettype($task_data)==="array")? json_encode($task_data):$task_data;

    $ch= curl_init($url);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
    curl_setopt($ch,CURLOPT_POST,TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$task_data); 

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

?>

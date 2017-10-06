<?php

    $auth_token = '59550a0e2b1a864a31bef962363e029f'; //your_auth_token
    $org_id=652853630; //your_organization_id

    $contact_data=array(
        "lastName"=>"Your Last Name",
        "firstName"=>"My first Name",
        "email"=>"example@example.com",
        "phone"=>"123456789",
        "description"=>"some description"
    );

    $headers=array(
            "Authorization: $auth_token",
            "orgId: $org_id",
            "contentType: application/json; charset=utf-8",
    );

    $url="https://desk.zoho.com/api/v1/contacts";

    $contact_data=(gettype($contact_data)==="array")? json_encode($contact_data):$contact_data;

    $ch= curl_init($url);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
    curl_setopt($ch,CURLOPT_POST,TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$contact_data); 

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

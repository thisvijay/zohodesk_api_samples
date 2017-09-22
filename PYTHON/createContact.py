import requests,json

auth_token="59550a0e2b1a864a31bef962363e029f" #YOUR_AUTH_TOKEN
org_id="652853630" #YOUR_ORGANISATION_ID

contact_data={
        "lastName":"Your Last Name",
        "firstName":"My first Name",
        "email":"example@example.com",
        "phone":"123456789",
        "description":"some python description"
}

headers={
    "Authorization":auth_token,
    "orgId":org_id,
    "contentType": "application/json; charset=utf-8"
}

request=requests.post('https://desk.zoho.com/api/v1/contacts', headers=headers,data=json.dumps(contact_data))

if request.status_code == 200:
    print "Request Successful,Response:"
    print request.content
else:
    print "Request not successful,Response code ",request.status_code," \nResponse : ",request.content;

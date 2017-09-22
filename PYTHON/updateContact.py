import requests,json

auth_token="59550a0e2b1a864a31bef962363e029f" #YOUR_AUTH_TOKEN
org_id="652853630" #YOUR_ORGANISATION_ID

contact_id="215666000000175001"; #CONTACT_ID_TO_UPDATE

contact_data={
        "firstName":"My Changed first name",
        "email":"example_changed@example.com",
        "description":"Some changed description"
}

headers={
    "Authorization":auth_token,
    "orgId":org_id,
    "contentType": "application/json; charset=utf-8"
}

if contact_id:

    request=requests.patch('https://desk.zoho.com/api/v1/contacts/'+contact_id, headers=headers,data=json.dumps(contact_data))

    if request.status_code == 200:
        print "Request Successful,Response:"
        print request.content
    else:
        print "Request not successful,Response code ",request.status_code," \nResponse : ",request.content;

else:
    print "Contact ID is missing"
import requests,json

auth_token="59550a0e2b1a864a31bef962363e029f" #YOUR_AUTH_TOKEN
org_id="652853630" #YOUR_ORGANISATION_ID

ticket_data={
        "departmentId":"215666000000006907",
        "contactId":"215666000000074112",
        "subject":"Newly created ticket from python"
}

headers={
    "Authorization":auth_token,
    "orgId":org_id,
    "contentType": "application/json; charset=utf-8"
}

request=requests.post('https://desk.zoho.com/api/v1/tickets', headers=headers,data=json.dumps(ticket_data))

if request.status_code == 200:
    print "Request Successful,Response:"
    print request.content
else:
    print "Request not successful,Response code ",request.status_code," \nResponse : ",request.content;

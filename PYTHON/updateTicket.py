import requests,json

auth_token="59550a0e2b1a864a31bef962363e029f" #YOUR_AUTH_TOKEN
org_id="652853630" #YOUR_ORGANISATION_ID

ticket_id="215666000000137001"; #TICKET_ID_TO_UPDATE

ticket_data={
        "subject":"This sis python changed 2 sample ticket",
        "priority":"medium",
        "description":"Some changed description"
}

headers={
    "Authorization":auth_token,
    "orgId":org_id,
    "contentType": "application/json; charset=utf-8"
}

if ticket_id:

    request=requests.patch('https://desk.zoho.com/api/v1/tickets/'+ticket_id, headers=headers,data=json.dumps(ticket_data))

    if request.status_code == 200:
        print "Request Successful,Response:"
        print request.content
    else:
        print "Request not successful,Response code ",request.status_code," \nResponse : ",request.content;

else:
    print "Ticket ID is missing"
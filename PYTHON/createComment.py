import requests,json

auth_token="59550a0e2b1a864a31bef962363e029f" #YOUR_AUTH_TOKEN
org_id="652853630" #YOUR_ORGANISATION_ID
ticket_id="215666000000137001" #TICKET_ID_TO_ADD_COMMENT

comment_data={
        "content":"This is python comment",
        "isPublic":"true"
}

headers={
    "Authorization":auth_token,
    "orgId":org_id,
    "contentType": "application/json; charset=utf-8"
}

request=requests.post('https://desk.zoho.com/api/v1/tickets/'+ticket_id+'/comments', headers=headers,data=json.dumps(comment_data))

if request.status_code == 200:
    print "Request Successful,Response:"
    print request.content
else:
    print "Request not successful,Response code ",request.status_code," \nResponse : ",request.content;

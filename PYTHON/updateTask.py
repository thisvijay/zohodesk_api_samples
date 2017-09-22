import requests,json

auth_token="59550a0e2b1a864a31bef962363e029f" #YOUR_AUTH_TOKEN
org_id="652853630" #YOUR_ORGANISATION_ID

task_id="215666000000177011"; #TASK_ID_TO_UPDATE

task_data={
        "description":"some changed task description",
        "priority":"medium"
}

headers={
    "Authorization":auth_token,
    "orgId":org_id,
    "contentType": "application/json; charset=utf-8"
}

if task_id:

    request=requests.patch('https://desk.zoho.com/api/v1/tasks/'+task_id, headers=headers,data=json.dumps(task_data))

    if request.status_code == 200:
        print "Request Successful,Response:"
        print request.content
    else:
        print "Request not successful,Response code ",request.status_code," \nResponse : ",request.content;

else:
    print "Task ID is missing"
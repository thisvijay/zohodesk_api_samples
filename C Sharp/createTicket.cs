using System;
using System.Net;
using System.Text;
using System.IO;

class CreateTicket
{
	public static void Main(string[] args)
	{
		string auth_token = "59550a0e2b1a864a31bef962363e029f"; // YOUR_AUTH_TOKEN
		string org_id = "652853630"; //YOUR_ORG_ID

		string ticket_data =@"{""contactId"" : ""215666000000074112"", ""subject"" : "" from C# Welcome to Zoho Support. Youve got a sample Request!"", ""departmentId"" : ""215666000000006907"", ""description"" : ""Hai This is Description""}";

		HttpWebRequest request = (HttpWebRequest)WebRequest.Create("https://desk.zoho.com/api/v1/tickets");
		request.ContentType = "application/json";
		request.Method = "POST";
		request.Headers["Authorization"] = auth_token;
		request.Headers["orgId"] = org_id;

        byte[] jsondata = Encoding.UTF8.GetBytes(ticket_data);
        request.ContentLength = jsondata.Length;

        Stream requestStream = request.GetRequestStream();
        requestStream.Write(jsondata,0,jsondata.Length);
        requestStream.Close();

		try
		{
			HttpWebResponse response = (HttpWebResponse)request.GetResponse();
			Stream receiveStream = response.GetResponseStream();
			StreamReader readStream = new StreamReader(receiveStream, Encoding.UTF8);
			Console.WriteLine("Response Code : " + (int)response.StatusCode);
			if ((int)response.StatusCode == 200)
			{
				Console.WriteLine("Ticket Successfully created ");
				Console.WriteLine(readStream.ReadToEnd());

			}
			response.Close();
			readStream.Close();

		}
		catch (WebException e)
		{
			Console.WriteLine("Request failed, Response Code : " + (int)((HttpWebResponse)e.Response).StatusCode + " \nResponse Message : ");
			var message = new StreamReader(e.Response.GetResponseStream()).ReadToEnd();
			Console.WriteLine(message);
		}



	}
}

using System;
using System.Net;
using System.Text;
using System.IO;

class AllComments
{
	public static void Main(string[] args)
	{
		string auth_token = "59550a0e2b1a864a31bef962363e029f"; // YOUR_AUTH_TOKEN
		string org_id = "652853630"; //YOUR_ORG_ID

		string ticket_id = "215666000000074114";

		if (ticket_id != "")
		{

			HttpWebRequest request = (HttpWebRequest)WebRequest.Create("https://desk.zoho.com/api/v1/tickets/" + ticket_id + "/comments");
			request.ContentType = "application/json";
			request.Method = "GET";
			request.Headers["Authorization"] = auth_token;
			request.Headers["orgId"] = org_id;

			try
			{
				HttpWebResponse response = (HttpWebResponse)request.GetResponse();
				Stream receiveStream = response.GetResponseStream();
				StreamReader readStream = new StreamReader(receiveStream, Encoding.UTF8);
				Console.WriteLine("Response Code : " + (int)response.StatusCode);

				if ((int)response.StatusCode == 200)
				{
					Console.WriteLine(readStream.ReadToEnd());
                }
                else{
                    if ((int)response.StatusCode == 204) Console.WriteLine("{}");
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
		else
		{
			Console.WriteLine("ERROR : Ticket ID is missing");
		}

	}
}

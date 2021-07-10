package databaseconnection;

import java.sql.Connection;
import java.sql.*;

public class databasecon 
{
	static Connection con;
	public static Connection getconnection()
	{
 		
 			
		try
		{
			Class.forName("com.mysql.jdbc.Driver");	
			con = DriverManager.getConnection("jdbc:mysql://localhost:3306/student","root","");
		}
		catch(Exception e)
		{
			System.out.println("Database Error"+e);
		}
		return con;
	}
	
}

<?php
	
/* to establishing database connection*/
	class DB_Connect
	{
		function __construct()
		{
			// constructor
		}

		function __destruct()
		{
			//destructor
		}

		public function connect() // opening mysql database connection
		{
			require_once 'config.php';

			$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE); //connecting to mysql
			
			return ($conn); //returning database handler
		}

		public function close()
		{
			mqsqli_close();
		}
	}
?>
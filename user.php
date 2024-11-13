
<?php

class user {
  // Properties
  public $username;
  public $password;
  public $email;
  public $utype;
  public $conn;
  
  function connect()
  {
	  //connect to rdmbs database cinema
// Create connection
        $this->conn = mysqli_connect("localhost", "root", "", "galaxy cinema");
// Check connection
        if (!$this->conn) 
        {
           die("Connection failed: " . mysqli_connect_error());
        }
  }  
  function login()
  {
	$this->connect();
        $sql = "SELECT * FROM user where username='".$this->username. "' and password='".$this->password."'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) >0)
        {
        
            while($row=mysqli_fetch_assoc($result))
            {
                $this->username=$row['username'];
            
                $this->email=$row['email'];
		            $this->utype = $row['utype'];
            }
            $_SESSION['username']= $this->username;
            $_SESSION['email']= $this->email;
            $_SESSION['utype']= $this->utype;
            mysqli_close($this->conn);
            if($this->utype==0)
            {
                 header("location:HUB.php");
            }
            else
            {
                 header("location:HUBAdmin.php");  
            }
        }
        else
        {
            mysqli_close($this->conn);
             
        }	  
  }
  function signup()
    {
        
        $this->connect();
        $sql = "SELECT * FROM user where username='".$this->username."'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) >0)
        {
            mysqli_close($this->conn);
        }
        else
        {
            $sql = "INSERT INTO user  (username, password,"
           ."email,utype) values ('"
           .$this->username. "','"
           .$this->password. "','"
           .$this->email. "','"
           .$this->utype. "')";

	$result= mysqli_query($this->conn, $sql); 
	if($result)
	{   
         mysqli_close($this->conn);
	 $_SESSION['username']= $this->username;
	 $_SESSION['email']= $this->email;
	 $_SESSION['utype']= $this->utype;
     
          header("location:HUB.php");
	 
	}   
	else

	{
            mysqli_close($this->conn);
		
	}
  }
} 
  
  
}
?>

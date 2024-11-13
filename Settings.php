<?php

class Settings{
    
    public $name;
    public $date_now;
    public $date_limit;
    public $seats_limit;
    
    
     function read_settings()
    {
         
   //default values      
       $this->name="NO NAME";
       $date=date('Y-m-d');
       $this->date_now=$date;
    //   date_add($date,date_interval_create_from_date_string("1 day"));
       
       $this->date_limit=$date;
       $this->seats_limit=10;
       
      
        //connect to rdmbs database business
// Create connection
        $conn = mysqli_connect("localhost", "root", "", "galaxy cinema");
// Check connection
        if (!$conn) 
        {
           die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM settings";
        
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) >0)
        {
        
            $row=mysqli_fetch_assoc($result);
            $this->name=$row['Date_Name'];
            $this->date_limit=$row['date_limit'];
            $this->seats_limit=$row['seats_limit'];
        }
        mysqli_close($conn);
        
        $_SESSION['cinema_name']= $this->name;
        $_SESSION['date_now']= $this->date_now;
        $_SESSION['date_limit']= $this->date_limit;
        $_SESSION['seats_limit']= $this->seats_limit;
        
    }
    
}


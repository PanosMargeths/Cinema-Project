<?php
session_start();
if( !isset($_SESSION['username']))
{
      Header("Location:Login.php");
}
  Class Dates{
      
     function show_Dates()
      {
            $conn = mysqli_connect("localhost", "root", "", "galaxy cinema");

            if (!$conn) 
            {
              die("Connection failed: " . mysqli_connect_error());
            }

                 

            $sql = "SELECT * from settings ";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) >0)
            {
                  $row=mysqli_fetch_assoc($result);
                  
                  echo "<div class='Dates'>";
                  echo  "<label><input type= 'radio' name='dates'  value=$row[Date_Name]> Active Date :<br> Show Name : $row[Date_Name]<br> Date Name : $row[date_limit]<br> Seats Limit :$row[seats_limit]<br><br></label>";
                  echo "</div>";
                  
                  

                  while($row=mysqli_fetch_assoc($result))
                  {
                       echo "<div class='Dates'>";
                       echo  "<label><input type= 'radio' name='dates' value=$row[Date_Name]> Active Date :<br> Show Name : $row[Date_Name]<br> Date Name : $row[date_limit]<br> Seats Limit :$row[seats_limit]<br><br></label>";
                       echo "</div>";
                
                  }
          
                  mysqli_close($conn);
            
            }
      }

      function EDIT()
      {
            $conn = mysqli_connect("localhost", "root", "", "galaxy cinema");
            
            if (!$conn) 
            {
              die("Connection failed: " . mysqli_connect_error());
            }
            $sl=$_GET['seatslimit'];
            $dd=$_GET['date'];
            $dn=$_GET['dname'];
            $de=$_GET["dates"];
            $sql = "UPDATE settings SET Date_Name='$dn', date_limit='$dd', seats_limit='$sl' where Date_Name='$de' ";
            $result = mysqli_query($conn, $sql);
      }

      function ADD()
      {
            $conn = mysqli_connect("localhost", "root", "", "galaxy cinema");
            
            if (!$conn) 
            {
              die("Connection failed: " . mysqli_connect_error());
            }

            $dd=$_GET['date'];
            $dn=$_GET['dname'];
            $sl=$_GET['seatslimit'];
            
            $sql = "INSERT INTO settings (Date_Name, date_limit, seats_limit) values ( '$dn', '$dd' , '$sl') ";
            $result = mysqli_query($conn, $sql);
      }

      function delete()
      {
            $conn = mysqli_connect("localhost", "root", "", "galaxy cinema");
            
            if (!$conn) 
            {
              die("Connection failed: " . mysqli_connect_error());
            }
            $de=$_GET["dates"];
            $sql = "DELETE FROM settings where Date_Name='$de' ";
            $result = mysqli_query($conn, $sql);
      }
  }
?>


<?php

$de =new Dates();


if( isset($_GET['edit'])){
      
      $de->EDIT();
}

if( isset($_GET['delete'])){
      $de->delete();
}

if( isset($_GET['add'])){
      $de->ADD();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>GC DATES</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/simple-grid.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    
    
    

</head>


<style>
    body {
        background-color: Silver;
        background-image: url('IMAGES/galaxy2.jpg');
        
    }

    h1 {
        color:whitesmoke;
        text-align: center;
        font-family: 'Permanent Marker', cursive;
        text-shadow: 5px 5px 75px rgba(253, 253, 253, 0.678);
        padding: 75px;
        margin: 0px;
        margin-top: -28px;
        background-image: url('IMAGES/galaxy2.jpg');
    }

    nav {
        margin-top: -70px;
        
    }

    div.container {
        background-color: silver;
        
        margin-top: -20px;
        max-width: 75%;
    }
    .button {
         display: inline-block;
         padding: 5px 5px;
         font-size: 15px;
         cursor: pointer;
         text-align: center;
         text-decoration: none;
         outline: none;
         color: #fff;
         background-color: #4CAF50;
         border: none;
         border-radius: 15px;
         box-shadow: 0 9px #999;
      }
      .button1 {
         display: inline-block;
         padding: 5px 5px;
         font-size: 15px;
         cursor: pointer;
         text-align: center;
         text-decoration: none;
         outline: none;
         color: #fff;
         background-color: red;
         border: none;
         border-radius: 15px;
         box-shadow: 0 9px #999;
      }

      .button:hover {background-color: #3e8e41}

      .button:active {
          background-color: #3e8e41;
          box-shadow: 0 5px #666;
          transform: translateY(4px);
      }
    

</style>

<body>
    <br>
    <h1> GALAXY CINEMA</h1>

    <br>
    <br>
    <br>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid" class='row'>
            <div class="navbar-header" class='col-12'>
                <a class="navbar-brand">ADMIN MENU</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="HUBAdmin.php">HUB</a></li>
                
                </li>
                
                <li><a href="ResList.php">Reservations</a></li>
                <li><a href="Dates.php">Dates</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                
                <li><a href='Logout.php'><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
            
        </div>
    </nav>


    <?php
if(isset($_SESSION['username']) ) // Check if already logged in
{
    $username = $_SESSION['username'];
    $utype = $_SESSION['utype'];
    $email = $_SESSION['email'];
}

?>
    
    <div class="container" >

            <div class="row">
                  
                  <div class="col-12">
                        <h2  class="desktop" style="background-color:lightblue; width:100%; padding: 3px ; border-radius: 5px; font-size:250%"><strong><u><i>SHOWS DATE :<i></u></strong></h2>
                  </div>

                  
                  <div class="col-12">
                  <form method="GET" >
                             <div class="input-group">  
                             <input  class="button" type=submit name="add" value ="ADD">&nbsp;
                             <input  class="button" type=submit name="edit" value ="EDIT">&nbsp;
                             <input  class="button1" type=submit name="delete" value ="DELETE">
                             <br><br>
                             <strong>NAME<strong><br>
                             <input   type=text name="dname"> <br>
                             <strong>Seats Limit<strong><br>
                             <input   type=text name="seatslimit" ><br>
                             <strong>DATE</strong><br>
                             <input   type=date name="date" >
                             <br>
                             <br>
                              <?php $de->show_Dates()?>
                             </div>
                  </form>
                  </div>
                  
                  
</body>
</html>
<?php
session_start();
if( !isset($_SESSION['username']))
{
      Header("Location:Login.php");
}
  Class ResList{
      public $res;
     function show_Res()
      {
            $conn = mysqli_connect("localhost", "root", "", "galaxy cinema");

            if (!$conn) 
            {
              die("Connection failed: " . mysqli_connect_error());
            }

                 

            $sql = "SELECT * from reservations ";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) >0)
            {
                  $row=mysqli_fetch_assoc($result);
                  
                  echo "<div class='reslists'>";
                  echo  "<label><input type= 'radio' name='reslist'  value=$row[Customer_Name]> Reservation :<br> Customer Name : $row[Customer_Name]<br> Movie ID : $row[Movie_ID]<br> Movie Date  : $row[Movie_Date]<br> Movie Seat : $row[Movie_Seat]<br> Approved : $row[Approved]<br><br></label>";
                  echo "</div>";
                  
                  

                  while($row=mysqli_fetch_assoc($result))
                  {
                       echo "<div class='reslist'>";
                       echo  "<label><input type= 'radio' name='reslist' value=$row[Customer_Name]> Reservation : <Br> Customer Name : $row[Customer_Name]<br> Movie ID : $row[Movie_ID]<br> Movie Date  : $row[Movie_Date]<br> Movie Seat :  $row[Movie_Seat]<br> Approved : $row[Approved]<br><br></label>";
                       echo "</div>";
                
                  }
          
                  mysqli_close($conn);
            
            }
      }

      function approve()
      {
            $conn = mysqli_connect("localhost", "root", "", "galaxy cinema");
            
            if (!$conn) 
            {
              die("Connection failed: " . mysqli_connect_error());
            }

            
            $res=$_GET["reslist"];
            $sql = "UPDATE reservations SET Approved=1 where Customer_Name='$res' ";
            $result = mysqli_query($conn, $sql);
      }

      function delete()
      {
            $conn = mysqli_connect("localhost", "root", "", "galaxy cinema");
            
            if (!$conn) 
            {
              die("Connection failed: " . mysqli_connect_error());
            }
            $res=$_GET["reslist"];
            $sql = "DELETE FROM reservations where Customer_Name='$res' ";
            $result = mysqli_query($conn, $sql);
      }
  }
?>


<?php

$res =new ResList();


if( isset($_GET['approve'])){
      
      $res->approve();
}

if( isset($_GET['delete'])){
      $res->delete();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>GC RESERVATIONS</title>
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
                        <h2  class="desktop" style="background-color:lightblue; width:100%; padding: 3px ; border-radius: 5px; font-size:250%"><strong><u><i>All RESERVATIONS :<i></u></strong></h2>
                  </div>

                  
                  <div class="col-12">
                  <form method="GET" >
                             <div class="input-group">  
                             <input  class="button" type=submit name="approve" value ="Approve">&nbsp;
                             <input  class="button1" type=submit name="delete" value ="Delete">
                             <br>
                             <br>
                              <?php $res->show_Res()?>
                             </div>
                  </form>
                  </div>
                  
                  
</body>
</html>
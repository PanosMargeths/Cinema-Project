<?php
session_start();
if( !isset($_SESSION['username']))
{
      Header("Location:Login.php");
}

include ("Shows.php");
$what_show=new Shows();
?>


<?php

include('Reservation.php');
include('user.php');
$username = $_SESSION['username'];
if(isset($_GET['submit1']))
{
    $bookdate = $_GET['bookdate'];
    $what_show = $_GET['film'];
    $what_seat = $_GET['seat'];
    
    //connect to rdmbs database business
// Create connection
        $conn = mysqli_connect("localhost", "root", "", "galaxy cinema");
// Check connection
        if (!$conn) 
        {
           die("Connection failed: " . mysqli_connect_error());
        }
         $sql = "SELECT * from reservations where "
                . "Movie_Date = '".$bookdate."' "
                . "and Movie_Seat =  $what_seat "
                . "and Movie_ID =   $what_show "
                . "and Approved = 0";
         
        
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) >0)
        {
            mysqli_close($conn);
         
            
            
        }
        else
        {
        $sql = "INSERT INTO reservations  (Customer_Name, Movie_ID, Movie_Date,Movie_Seat,Approved) values ('"
           .$username. "','"
           .$what_show. "',"
           .$bookdate. ","
           .$what_seat. ",0)";    
          
  
        $result= mysqli_query($conn, $sql); 
        mysqli_close($conn);
        if($result)
        {   
         
            header("Location:HUB.php");
        }   
        
        } 
}
?>




<!DOCTYPE html>
<html>

<head>
    <title>GC TICKETS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/simple-grid.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    

</head>


<style>
    body {
        background-color: Silver;
        background-image: url('IMAGES/galaxy2.jpg');
        color : whitesmoke;
        
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
    h2.movies {
      color:whitesmoke;
      background-color:#CD7F32;
    }

    nav {
        margin-top: -70px;
        
    }

    div.container {
        background-color: silver;
        
        margin-top: -20px;
        max-width: 75%;
    }
    
    .btn {
    font-weight: 700;
    height: 36px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
}

/*
 * Card component
 */
.card-container.card {
    max-width: 700px;
    padding: 40px 40px;
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
                <a class="navbar-brand" >MENU</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="HUB.php">HUB</a></li>
                </li>
                <li><a href="Tickets.php">Tickets</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li><a href="Signup.php"><span class="glyphicon glyphicon-log-in"></span> SignUp</a></li>
                <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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










    <div class="container">

            <div class="row">
            <div class="col-7">
                        <div class="gallery"  >
                        
                           <h3>Choose date </h3>
  
                           <form method="GET" >
                             <div class="input-group">

                             <input type="date" id="start" name="bookdate"
                                value="<?php echo $_SESSION['date_now'];?>"
                                min="<?php echo $_SESSION['date_now'];?>" max="<?php echo $_SESSION['date_limit'];?>">
      
                               <h3>Choose show</h3>
                               <?php
                               $what_show->show_films();
                               ?>

                               <h3>Choose seat</h3>
                               <input type="number" id="seat" name="seat" min="1" max = "<?php echo $_SESSION['seats_limit'];?>">
                                <br>
                                <br>
    
                              <input type="submit" name="submit1" value ="submit">
                            </div>
                            </form>
                            <br>
                            </div>   
                        </div>
                  

                  <div class="col-12">
                        <h2  class="movies" style=" color:white; width:100%; border-radius: 5px; font-size:250%">Now Playing Movies</h2>
                  </div>

                  <!--Product 1-->
                  <div class="col-3">
                        <div class="gallery" >
                              <img src="IMAGES/iday.jpg " alt="Failed To Load" style="width:100%; height:300px;margin:auto;">
                        </div>
                  </div>
                  <!--END Product 1-->

                  <!--Product 2-->
                  <div class="col-3">
                        <div class="gallery" >
                              <img src="IMAGES/movie2.webp" alt="Failed To Load" style="width:100%; height:300px ; margin: auto; margin-top: auto;">
                        </div>
                  </div>
                  <!--Product 2-->

                  <!--Product 3-->
                  <div class="col-3">
                        <div class="gallery">
                              <img src="IMAGES/movie3.jpg" alt="Failed To Load" style="width:100%; height:300px; margin: auto; margin-top: autopx;">
                        </div>
                  </div>
                  <!--END Product 3-->


                  <!--Product 4-->
                  <div class="col-3">
                        <div class="gallery">
                              <img src="IMAGES/movie4.jpg" alt="Failed To Load" style="width:100%; height:300px; ">
                        </div>
                  </div>
                  <!--END Product 4-->

                  <!--Product 5-->
                  <div class="col-3">
                        <div class="gallery">
                              <img src="IMAGES/movie5.png" alt="Failed To Load" style="width:100%; height:300px;">
                        </div>
                  </div>
                  <!--END Product 5-->

                  <!--Product 6-->
                  <div class="col-3">
                        <div class="gallery" >
                              <img src="IMAGES/movie6.png" alt="Failed To Load" style="width:100%; height:300px;" >
                        </div>
                  </div>
                  <!--END Product 6-->
                  
                  



</body>
</html>
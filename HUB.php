<?php
session_start();
include ("user.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>GC GALAXY CINEMA HUB</title>
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
                <a class="navbar-brand">MENU</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="HUB.php">HUB</a></li>
                <!--<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span-->
                          <!--- <class="caret"></span></a>-->
                    <!--<ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>-->
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
    
    <div class="container" >

            <div class="row">
                  
                  <div class="col-12">
                        <h2  class="desktop" style=" width:100%; border-radius: 5px; font-size:250%"><strong>NOW Playing Movies</strong></h2>
                  </div>

                  <!--Product 1-->
                  <div class="col-3">
                        <div class="gallery" >
                              <img src="IMAGES/iday.jpg " alt="Failed To Load" style="width:110%; height:370px;margin:auto;">
                                    

                              <div class="row" style="margin: 5px;">
                                    <div class="col-8">
                                          <div>
                                                
                                          </div>
                                    </div>

                                   
                              </div>

                        </div>
                  </div>
                  <!--END Product 1-->

                  <!--Product 2-->
                  <div class="col-3">
                        <div class="gallery" >
                              <img src="IMAGES/movie2.webp" alt="Failed To Load" style="width:110%; height:370px ; margin: auto; margin-top: auto;">
                                    
                              <div class="row" style="margin: 5px;">
                                    <div class="col-8">
                                          <div>
                                                
                                          </div>
                                    </div>

                                    
                              </div>

                        </div>
                  </div>
                  <!--Product 2-->

                  <!--Product 3-->
                  <div class="col-3">
                        <div class="gallery">
                              <img src="IMAGES/movie3.jpg" alt="Failed To Load" style="width:110%; height:370px; margin: auto; margin-top: autopx;">
                                    

                              <div class="row" style="margin: 5px;">
                                    <div class="col-8">
                                          <div>
                                                
                                          </div>
                                    </div>

                                    
                              </div>

                        </div>
                  </div>
                  <!--END Product 3-->


                  <!--Product 4-->
                  <div class="col-3">
                        <div class="gallery">
                              <img src="IMAGES/movie4.jpg" alt="Failed To Load" style="width:110%; height:370px; ">
                                    

                              <div class="row" style="margin: 5px;">
                                    <div class="col-8">
                                          <div>
                                                
                                          </div>
                                    </div>

                                    
                              </div>

                        </div>
                  </div>
                  <!--END Product 4-->

                  <!--Product 5-->
                  <div class="col-3">
                        <div class="gallery">
                              <img src="IMAGES/movie5.png" alt="Failed To Load" style="width:110%; height:370px;">
                                    

                              <div class="row" style="margin: 5px;">
                                    <div class="col-8">
                                          <div>
                                                
                                          </div>
                                    </div>

                                    
                              </div>

                        </div>
                  </div>
                  <!--END Product 5-->

                  <!--Product 6-->
                  <div class="col-3">
                        <div class="gallery">
                              <img src="IMAGES/movie6.png" alt="Failed To Load" style="width:110%; height:370px;">
                                   

                              <div class="row" style="margin: 5px;">
                                    <div class="col-8">
                                          <div>

                                          </div>
                                    </div>

                                    
                              </div>

                        </div>
                  </div>
                  <!--END Product 6-->

</body>
</html>
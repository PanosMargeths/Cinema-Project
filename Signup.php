<?php
session_start();
include ("user.php");
if( isset($_SESSION['username']))
{
      Header("Location:HUB.php");
}
?>

<?php
if(isset($_REQUEST['username']) )
{
    $u1 = new user();

$u1->username= $_REQUEST['username'];
$u1->password=$_REQUEST['password'];
$u1->email=$_REQUEST['email'];
$u1->utype= 0;

$u1->signup();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Galaxy Cinema SignUp</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<link rel="SimpleGrid" href="CSS/simple-grid.css">
<style>
    body {
        background-image: url("IMAGES/movie.webp");
        background-size: 30% 30% ;
    }

    h1 {
        color:whitesmoke;
        text-align: center;
        font-family: 'Permanent Marker', cursive;
        text-shadow: 5px 5px 75px rgba(253, 253, 253, 0.678);
        padding: 75px;
        margin: 0px;
        margin-top: -25px;
        background-image: url('IMAGES/galaxy2.jpg');
    }

    nav {
        margin-top: -67px;
    }

    /* Registration Form */

    form { margin: 0px 10px;}

    h2 {
    margin-top: 2px;
    margin-bottom: 2px;
    }

    .container { max-width: 560px;
        
    }

    .divider {
    text-align: center;
    margin-top: 20px;
    margin-bottom: 5px;
    }

    .divider hr {
    margin: 7px 0px;
    width: 35%;
}

.left { float: left; }

.right { float: right; }


</style>

<body>
    <br>

    <h1> GALAXY CINEMA</h1>

    <br>
    <br>
    <br>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">MENU</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="HUB.php">HUB</a></li>
               
                </li>
                <li><a href="Tickets.php">Tickets</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                
                <li><a href="Signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href='Logout.php'><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </nav>




    
<!------ Include the above in your HEAD tag ---------->

    <div class="container">
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-body">

					<form method="POST" action="#" role="form">
						<div class="form-group">
							<h2>Create account</h2>
						</div>
						<div class="form-group">
							<label class="control-label" for="signupName">username</label>
							<input id="username" type="text" name='username' maxlength="50" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label" for="signupEmail">Email</label>
							<input id="email" type="text"name='email' maxlength="50" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label" for="signupPassword">Password</label>
							<input id="password" type="text" name='password' maxlength="25" class="form-control" placeholder="at least 6 characters" length="40">
						</div>
						
						<div class="form-group">
							<button id="Submit" type="submit" class="btn btn-info btn-block">Create your account</button>
						</div>
						<p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
						<hr>
						<p></p>Already have an account? <a href="Login.php">Sign in</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
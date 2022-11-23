<?php
session_start();
if(isset($_SESSION['auth']))
{
	header("Location:index.html");
}
else
{
	?>
    <?php ob_start();
require "db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twinkles Shoping Zone</title>
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
</head>

<body class="gradient-background">

    <header>
        <!-- <div class="container"> -->
        <nav class="navbar navbar-expand-lg" id="our-nav">
            <div class="container-fluid">
                <a class="navbar-brand ms-5" href="#"><img src="img/logo-nav-final.gif" alt=""> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse me-5" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="index.html">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Review</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Log In</a>
                        </li>
                        <button type="button" class=" btn2">Contact Us</button>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- </div> -->

    </header>

    <main>

        <section>
            <div class="container register mt-5">
                <h2 class="form-title text-center">New Customer Registration</h2>
                    <div class="row">
                        <div class="signup-left col-lg-6 col-sm-6">
                            <form id="form" action="" method="post" class="mt-5">
                                <div class="form-item">
                                    <label for="name"><i class="fa-solid fa-user"></i></label>
                                    <input type="text" name="name" id="name" placeholder="Your Full Name">
                                </div>
                                <div class="form-item">
                                    <label for="uname"><i class="fa-solid fa-user"></i></label>
                                    <input type="text" name="uname" id="uname" placeholder="Your User Name"/>
                                </div>
                                <div class="form-item">
                                    <label for="email"><i class="fa-solid fa-at"></i></label>
                                    <input type="email" name="email" id="email" placeholder="Your Email" />
                                </div>
                                <div class="form-item">
                                    <label for="number"><i class="fa-solid fa-phone"></i></label>
                                    <input type="number" name="number" id="number" placeholder="Your Contact Number"/>
                                </div>
                                <div class="form-item">
                                    <label for="pass"><i class="fa-solid fa-lock"></i></label>
                                    <input type="password" name="pass" id="pass" placeholder="Password" />
                                </div>
                                <div class="form-item">
                                    <label for="re_pass"><i class="fa-solid fa-lock"></i></label>
                                    <input type="password" name="re_pass" id="re_pass"
                                        placeholder="Repeat Your Password" />
                                </div>
                                <div class="agree-div">
                                    <input type="checkbox" name="agree-term" id="agree-term"/>
                                <label for="agree-term" class="agree-text">I agree all statements in <a href="#">Terms of service</a></label>
                                </div>
                                <!-- <input type="button" value="submit" onclick="register()"> -->
                                <button class="btn btn3" type="submit" name="submit" >Register</button>
                                <span id="response">

                                </span>
                            </form>
                        </div>
                        <div class="signup-right col-lg-6 col-sm-6">
                            <img src="img/reg up 2.gif" width="450px" height="400px" alt="" class="mt-5">
                        </div>
                    </div>
            </div>

        </section>

        <?php
	if(isset($_POST['submit']))
    {
        try{
			$name=$_POST['name'];
            $uname=$_POST['uname'];
		$email=$_POST['email'];
        $number=$_POST['number'];
		$pass=$_POST['pass'];
	
		if(empty($name))
		{
			echo '<p style="text-align:center;color:red">Please Provide All Information!!!</p>';
		}
        else if(empty($uname))
        {
            echo '<p style="text-align:center;color:red">Please Provide All Information!!!</p>';
        }
		else if(empty($email))
		{
			echo '<p style="text-align:center;color:red">Please Provide All Information!!!</p>';
		}
        else if(empty($number))
        {
            echo '<p style="text-align:center;color:red">Please Provide All Information!!!</p>';
        }
        else if(empty($pass))
        {
            echo '<p style="text-align:center;color:red">Please Provide All Information!!!</p>';
        }
		else
		{
			$insert_query="INSERT INTO user(Name, User_Name, Email, Number, Password) VALUES('$name','$uname','$email','$number','$pass')";
			$mydb= new database();
			$response=$mydb->insertdata($insert_query);
		    if($response==true)
		    {
			    header("Location:/Twinkles-Shopping-Zone%20-%20Backup/login.php");
	        }
		    else
		    {
		        echo '<p style="text-align:center;color:red">Unable To Register!!!</p>';
		    }
	    }
	}
	catch(Exception $e)
		    {
		    	 echo '<p style="text-align:center;color:red;font-weight:bold">Email Already In Use!!!</p>';
		    }
	}
	?>
    <?php } ?>
    </main>
    <footer>
        <p class="text-center mt-4 copyright">@Copyright <span>Twinkles</span> Shopping Zone</p>
    </footer>
 <!-- connecting javascript  -->
 <script src="script.js"></script>
</body>

</html>
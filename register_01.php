<?php
require "../include/db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<style>
		.form{
			height: 332px;
			width: 400px;
			background-color: #D0D3D4;
			box-shadow: 10px 10px 10px 10px grey;
			text-align: center;
            margin: auto;
		}
		.head{
			height: 60px;
			background-color: #0E6655;
			color: #F0F3F4;
			text-align: center;
		}
		.body{
			text-align: center;
			justify-content: space-around;
		}
		.body input{
			text-align: left;
			border: none;
			border-bottom: 2px solid black;
		}
		.body input:hover{
			border-bottom: 2px solid red;
		}
		.btn:hover{
			background-color: #0E6655;
			color: white;
		}
		.btn:active{
			background-color: red;
			color: white;
		}
		.foot{
			background-color: #0E6655;
			color: #F0F3F4;
			text-align: center;
			height: 60px;
		}
		.foot a{
			color: #FCF3CF;
		}
		.foot a:hover{
			color: #85929E;
		}

	</style>
</head>
<body>
	<div class="form">
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<div class="head">
			<h1>Register</h1>
		</div>
		<div class="body">
			<br>
			<br>
			
			<input type="text" name="name" placeholder="Username">
			<br>
			<br>
		
		<input type="text" name="email" placeholder="Email">
		<br>
		<br>
		
		<input type="password" name="pass" placeholder="Password">
		<br>
		<br>
		</div>
		<input class="btn" type="submit" name="submit" value="Register">
	    <br>
		<br>
		<div class="foot">
			<p style="font-weight: bold;">Already An Admin? <a href="index.php" style="text-decoration:none">Log In </a></p>
		</div>
		
	</form>
</div>
<?php
	if(isset($_POST['submit']))
	{
		try{
			$name=$_POST['name'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		// $name=$_POST['name'];
		// $email=$_POST['email'];
		// $pass=$_POST['pass'];
		if(empty($name))
		{
			echo '<p style="text-align:center;color:red">Please Provide All Information!!!</p>';
		}
		else if(empty($email))
		{
			echo '<p style="text-align:center;color:red">Please Provide All Information!!!</p>';
		}
		else if(empty($pass))
		{
			echo '<p style="text-align:center;color:red">Please Provide All Information!!!</p>';
		}
		else
		{
			$insert_query="INSERT INTO admin(user_name,email,pass_word) VALUES('$name', '$email', '$pass')";
			$mydb= new database();
			$response=$mydb->insertdata($insert_query);
		    if($response==true)
		    {
			    header("Location:index.php");
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
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>





<?php
session_start();
if(isset($_SESSION['auth']))
{
	header("Location:index.html");
}
else
{
	?>
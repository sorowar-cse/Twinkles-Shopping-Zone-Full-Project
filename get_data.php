<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $pass = $_POST['pass'];
    $re_pass = $_POST['re_pass'];
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $hash_confirm = password_hash($re_pass, PASSWORD_DEFAULT);
    $check = "SELECT * FROM users WHERE email = '$email'";
    $check_query = mysqli_query($conn, $check);
    $check_num = mysqli_num_rows($check_query);
    if($check_num > 0){
        echo "Email already exists";
    }else{
        if($pass == $re_pass){
            $insert = "INSERT INTO users (name, email, password, confirm_password) VALUES ('$name', '$email', '$hash', '$hash_confirm')";
            $insert_query = mysqli_query($conn, $insert);
            if($insert_query){
                echo "Registration successful";
            }else{
                echo "Registration failed";
            }
        }else{
            echo "Passwords do not match";
        }
    }
}
$conx=mysqli_connect("localhost","root","","shopping");
$sql="INSERT INTO `user`(`Name`, `User Name`, `Email`, `Number`, `Password`) VALUES ('name','uname','email','number','number')";
$result=mysqli_query($conx,$sql);
if($result)
{
    echo '<p style="text-align:center;color:green">Registration Successful!!!</p>';
}
else
{
    echo '<p style="text-align:center;color:red">Registration Failed!!!</p>';
}

?>
<html>
<head>
<style>
    div {
        background-color:rgb(255,255,255,0.7);
        position:absolute;top:95%;left:50%;
        transform:translateX(-50%) translateY(-100%);
        width:650px;height:650px;
    }
    div:hover {
        box-shadow: 10px 5px 10px;
        background: rgb(119,221,119,0.7);
        color: white;
        transition: 0.15s ease;
    }
</style>
</head>
<body style="background:url('e1.jpg');background-size:cover">
<img src="gate.png" align="top-left" width="164" height="87">
<div>
<br/>
<br/>
<center>
<p id="t1" style="font-size:50px">Please Sign in!</p>
<img src="person.png" width="128" height="128"><br/>
<input type="text" name="uid" placeholder="Enter Username" style="font-size:30px" /><br/><br/>
<input type="text" name="pwd" placeholder="Enter Password" style="font-size:30px" /><br/><br/>
<center><button style="color:white;background-color:black;cursor:pointer;width:150px;font-size:30px">Sign in</button></center>
</center>
</div>
<img src="kanpur.png" align="right" width="80" height="78">
</body>
</html>
<?php
    include("init.php");
    session_start();

    if (isset($_POST["userid"],$_POST["password"]))
    {
        $username=$_POST["uid"];
        $password=$_POST["pwd"];
        $sql = "SELECT userid FROM admin_login WHERE userid='$username' and password = '$password'";
        $result=mysqli_query($conn,$sql);

        // $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);
        
        if($count==1) {
            $_SESSION['login_user']=$username;
            header("Location: dashboard.php");
        }else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password")';
            echo '</script>';
        }
        
    }
?>
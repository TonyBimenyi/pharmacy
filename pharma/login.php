<?php 
include('config/db_pharma.php');

if(isset($_POST['username'])){
    $uname = $_POST['username'];
    $password = $_POST['password'];

    $sql=" SELECT * from users where username = '".$uname."'  AND password = '".$password."' limit 1";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)==1){
        header('Location:index.php');
        exit();
    }
    else{
        $output =  "You have entered incorrect password";
        
        echo "<script type='text/javascript'>alert('$output');</script>";
    }
}
?>

<html>
<head>
<style>
    *{
        font-family:century gothic;
    }
    .container{
        display:flex;
        flex-direction:column;
        flex-grow:1;
    }
    h1{
        display:flex;
        justify-content:center;
        margin-top:50px;
    }
    .fields{
        display:flex;
        justify-content:center;
        BACKGROUND-COLOR:rgb(250, 226, 121);
        margin:auto ;
        padding:60px;
    }
    input{
        height:40px;
        width:600px;
        outline-color:gold;
    }
    .button input{
        background-color:gold;
        display:flex;
        justify-content:center;
        border:none;
        box-shadow:0px 0px 9px 1px;
        font-weight:bolder;
        font-size:20px;
    }
</style>

</head>
<body>
    <div class="container">
        <div class="title">
            <h1>PHARMACY MANAGEMENT APP</h1><br><br>
        </div>
        <div class="fields">
            <form action="#" method="POST">
            <div class="user_field">
                <div class="user_field">
                    <label for="">Username:</label><br>
                    <input type="text" placeholder="Enter your username" name="username" required=""><br><br>
                </div>
                <div class="password_field">
                    <label for="">Password:</label><br>
                    <input type="password" placeholder="Enter your Password" name="password" required=""><br><br><br><br>
                </div>
                <div class="button">
                <input type="submit" name="submit" value="LOG IN">
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
</html>
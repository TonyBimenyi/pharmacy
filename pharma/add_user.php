<?php


include('config/db_pharma.php');
$f_name=$l_name=$u_name=$password=$confirm_password='';
$errors= array('f_name'=>'','l_name'=>'','u_name'=>'','password'=>'','confirm_password'=>'');

if(empty($_POST['f_name'])){
    $errors['f_name'] = 'The name must Be Entered';
}else {
    $name=$_POST['f_name'];
}

if(array_filter($errors)){
    //echo 'erros in form';
    //echo 'erros in form';
}else{
    $f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
    $l_name = mysqli_real_escape_string($conn, $_POST['l_name']);
    $u_name = mysqli_real_escape_string($conn, $_POST['u_name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm = mysqli_real_escape_string($conn, $_POST['confirm_password']);




/////create sql

$sql = "INSERT INTO users(f_name,l_name,username,password,confirm_password)
 VALUES ('$f_name','$l_name','$u_name','$password','$confirm') ";

/////save to db and check

if(mysqli_query($conn,$sql)){
    header('Location:index.php');
}else{
    echo 'query error' . mysqli_error($conn);
}
}


?>

<!DOCTYPE html>
<html>
    <head>
    <style>
    * {
    font-weight: bold !important;
    font-family:century gothic;
}
        .title{
            font-family: arial !important;
            color:rgb(248, 169, 23);
            align-items:center;
        }
        .form {  
            box-shadow:0px 0px 10px 1px;
            padding:20px;
            margin-right:300px;
            margin-left:300px;
            display:flex;
            justify-content:center;
        }
        .label1{
            box-size:50px;
            padding-bottom:px;
            font-weight:bolder;
        }
        input{
            width:500px;
            height:35px;
            border-radius:15px;
            border:2px solid black;
            outline:none;
        }
        #button{
            font-weight:bolder;
            font-size:15px;
            border-radius:5px;
            padding-top:10px;padding-bottom:10px;padding-left:40px;padding-right:40px;
            background-color:rgb(248, 169, 23);
            border:0px;
            height:40px;weight:80px;
        }
        #button:hover{
            background-color:gold;
        }
    </style>
    </head>
    <body>
        <?php include('templates/header.php') ?>

        <h1 class="title">Adding a User</h1>
        

        <div class="form">
            <section>
            <form class="add" action="add_user.php" method="POST">
                <div  class="label1">
                    <label for="">First Name:</label>
                    <br>
                    <input type="text" value="" name="f_name" placeholder="Enter the First Name">
                </div>
                    
                <br>
                <div  class="label1">
                    <label for="">Last Name:</label>
                    <br>

                    <input type="text" value="" name="l_name" placeholder="Enter the Last name">
                </div>
                <br>
                <div  class="label1">
                    <label for="">Username:</label>
                    <br>
                    <input type="text" value="" name="u_name" placeholder="Enter the username">
                </div>
                <br>
                <div  class="label1">
                    <label for="">Password:</label>
                    <br>
                    <input type="password" value="" placeholder="Enter the password" name="password">
                </div>
                <br>
                <div  class="label1">
                    <label for="">Confirm password:</label>
                    <br>
                    <input type="password" value="" name="confirm_password">
                </div>
                <br><br>
                <input type="submit" name="submit" value="ADD" id="button">
                
            </form>
            </section>
        </div>

        <?php include('templates/footer.php') ?>
    </body>
</html>
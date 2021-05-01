<?php


include('config/db_pharma.php');
$name=$categorie=$exp_date=$pv='';
$errors= array('name'=>'','categorie'=>'','expdate'=>'','pv'=>'');

if(empty($_POST['name'])){
    $errors['name'] = 'The name must Be Entered';
}else {
    $name=$_POST['name'];
}

if(array_filter($errors)){
    //echo 'erros in form';
    //echo 'erros in form';
}else{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $categorie = mysqli_real_escape_string($conn, $_POST['categorie']);
    $exp_date = mysqli_real_escape_string($conn, $_POST['expdate']);
    $pv = mysqli_real_escape_string($conn, $_POST['pvu']);



/////create sql

$sql = "INSERT INTO medecines(name,categorie,exp_date,pv) VALUES ('$name','$categorie','$exp_date','$pv') ";

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

        <h1 class="title">Add Medecine</h1>
        

        <div class="form">
            <section>
            <form class="add" action="add_med.php" method="POST">
                <div  class="label1">
                    <label for="">Name:</label>
                    <br>
                    <input type="text" value="" name="name" placeholder="Enter the name of Medecine">
                </div>
                    
                <br>
                <div  class="label1">
                    <label for="">Categorie:</label>
                    <br>

                    <input type="text" value="" name="categorie" placeholder="Clic to choose the categorie">
                </div>
                <br>
                <div  class="label1">
                    <label for="">Date d'expiration:</label>
                    <br>
                    <input type="date" value="" name="expdate" placeholder="Entrer le prix de vente unitaire">
                </div>
                <br>
                <div  class="label1">
                    <label for="">Prix de Vente Unitaire:</label>
                    <br>
                    <input type="number" value="" name="pvu">
                </div>
                <br>
                <div  class="label1">
                    <label for="">Prix de Vente Total:</label>
                    <br>
                    <input type="number" value="" name="pvt">
                </div>
                <br><br>
                <input type="submit" name="submit" value="ADD" id="button">
                
            </form>
            </section>
        </div>

        <?php include('templates/footer.php') ?>
    </body>
</html>
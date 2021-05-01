<?php


include('config/db_pharma.php');
$name=$buy_date=$pa=$achetteur=$qte=$unite_achat='';
$errors= array('name'=>'','buy_date'=>'','pa'=>'','achetteur'=>'','qte'=>'','unite_achat'=>'');

if(empty($_POST['pa'])){
    $errors['pa'] = 'The name must Be Entered';
}else {
    $name=$_POST['pa'];
}

if(array_filter($errors)){
    //echo 'erros in form';
    //echo 'erros in form';
}else{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $buy_date = mysqli_real_escape_string($conn, $_POST['buy_date']);
    $pa = mysqli_real_escape_string($conn, $_POST['pa']);
    $qte = mysqli_real_escape_string($conn, $_POST['qte']);
    $achetteur = mysqli_real_escape_string($conn, $_POST['achetteur']);
    $unite_achat = mysqli_real_escape_string($conn, $_POST['unite_achat']);



/////create sql

$sql = "INSERT INTO achat(name,buy_date,pa,qte,achetteur,unite_achat) VALUES ('$name','$buy_date','$pa','$qte','$achetteur','$unite_achat') ";

/////save to db and check

if(mysqli_query($conn,$sql)){
    header('Location:achat.php');
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
            <form class="add" action="add_achat.php" method="POST">
            <div  class="label1">
                    <label for="">Nom du medicament:</label>
                    <br>
                    <input type="text" value="" name="name" placeholder="Entrer le prix de vente unitaire">
                </div>
                <br>
                <div  class="label1">
                    <label for="">Date d'achat:</label>
                    <br>
                    <input type="date" value="" name="buy_date" placeholder="Entrer le prix de vente unitaire">
                </div>
                <br>
                <div  class="label1">
                    <label for="">Prix d'achat Unitaire:</label>
                    <br>
                    <input type="number" value="" name="pa">
                </div>
                <br>
                <div  class="label1">
                    <label for="">Quantite:</label>
                    <br>
                    <input type="number" value="" name="qte">
                </div>
                <br>
                <div  class="label1">
                    <label for="">Achetteur:</label>
                    <br>
                    <input type="text" value="" name="achetteur">
                </div>
                <br>
                <div  class="label1">
                    <label for="">Unite d'achat:</label>
                    <br>
                    <input type="text" value="" name="unite_achat">
                </div>
                <br><br>
                <input type="submit" name="submit" value="ADD" id="button">
                
            </form>
            </section>
        </div>

        <?php include('templates/footer.php') ?>
    </body>
</html>
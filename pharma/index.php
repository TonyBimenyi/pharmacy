<?php 

include('config/db_pharma.php');

///sql querry

/*$sql = "SELECT * FROM medecines ";


////make querry and get result

$result = mysqli_query($conn,$sql);

/////fetch the resulting rows as array

$medecines = mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);*/

$sql="SELECT count(name) AS total FROM medecines" ;
$result = mysqli_query($conn,$sql);
$values = mysqli_fetch_assoc($result);
$num_row = $values['total'];


$count_user="SELECT count(F_name) AS total FROM users" ;
$result = mysqli_query($conn,$count_user);
$users = mysqli_fetch_assoc($result);
$num_user = $users['total'];


$querry2 = "SELECT exp_date as expired FROM medecines";
$result = mysqli_query($conn,$querry2);
$dateexp = mysqli_fetch_assoc($result);
$dat = $dateexp['expired'];


$querry = "SELECT count(id) as expired FROM medecines WHERE exp_date<now()";
$result = mysqli_query($conn,$querry);
$exp = mysqli_fetch_assoc($result);
$ex = $exp['expired'];

$name = "SELECT l_name,f_name FROM users";
$result = mysqli_query($conn,$name);
$namep = mysqli_fetch_assoc($result);
echo $namep['l_name'].'&nbsp'.$namep['f_name'];

mysqli_close($conn);



?>
<!DOCTYPE html>
<html>
  <head>
    <title>PHARMA</title>
    
    <style>
        body {
            display: flex;
            flex-direction: column;
            height: 100%;
            overflow: hidden;
}
* {
    font-weight: bold !important;
    font-family:century gothic;
}
        #scroll-list {
            overflow: hidden;
            flex-grow: 1;
            flex-direction:column;
        }
        .title{
       
            font-family: arial !important;
            color:rgb(248, 169, 23);
            display:flex;
            justify-content:center;
        }
        .card1{
            font-size:20px;
            background-color:rgb(250, 226, 121);  
            border-radius:10px;
            display:flex;
            justify-content:center;
            flex-direction: column;
            width:400px;
            height:200px;
            
        }
        #card1{
            background-color:rgb(116, 199, 255) !important;
        }
        #card3{
            background-color:rgb(248, 169, 23);
        }
        .cards{
           display:flex;
            justify-content:space-between;
            padding-top:30px;
        }
        .card1 p{
            text-align:justify;
        }
        
        #med{
            font-size: 30px !important;
        }
        .text{
            display:flex;
            justify-content:center;   
            text-transform:uppercase;
            font-weight:bolder !important;
        }
        .text_php{
            display:flex;
            justify-content:center;
        }
        .text_php p{
            font-size:30px;
        }
        .clic a{
            display:flex;
            justify-content:center;
            text-decoration:none;
            color:black;
        }
        .clic a:hover{
            color:white;
            transition:.2s;
            cursor:pointer;
        }
    </style>
  </head>
    <?php include('templates/header.php') ?>
    <h1 class="title">Dashboard</h1>

        <div class="cards">
            <div class="card1" id="card1">
            <div class="text">
               <p >Medecines</p>
               </div>
            <div class="text_php">
               <p id="med"><strong><?php echo $num_row; ?>in Stock</strong></p>
            </div>
            <div class="clic">
                <p><a href="stock.php">Click Here to see details</a></p>
            </div>
            </div>
            <div class="card1" id="card2">
            <div class="text">
               <p >Expired</p>
               </div>
            <div class="text_php">
                <?php if($ex==0){ ?>
                <p> <strong><?php echo 'No one' ;?></strong></p>
                <?php } else {?>
               <p id="med"><strong><?php echo $ex; ?>Expired</strong></p>
               <?php } ?>
            </div>
            <div class="clic">
                <p><a href="expired.php">Click Here to see details</a></p>
            </div>
            </div>
            <div class="card1" id="card3">
            <div class="text">
               <p >Users</p>
               </div>
            <div class="text_php">
               <p id="med"><strong><?php echo $num_user; ?>Users</strong></p>
            </div>
            <div class="clic">
                <p><a href="users.php">Click Here to see details</a></p>
            </div>
            </div>
        </div>
<!------------------------------------------------------------------------------------>
        <div class="cards">
            <div class="card1" id="card1">
            <div class="text">
               <p >Medecines</p>
               </div>
            <div class="text_php">
               <p id="med"><strong><?php echo $num_row; ?>in Stock</strong></p>
            </div>
            </div>
            <div class="card1" id="card2">
            <div class="text">
               <p >Medecines</p>
               </div>
            <div class="text_php">
               <p id="med"><strong><?php echo $num_row; ?>in Stock</strong></p>
            </div>
            </div>
            <div class="card1" id="card3">
            <div class="text">
               <p >Medecines</p>
               </div>
            <div class="text_php">
               <p id="med"><strong><?php echo $num_row; ?>in Stock</strong></p>
            </div>
            </div>
        </div>

    <?php include('templates/footer.php') ?>
</html>
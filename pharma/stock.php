<?php


include('config/db_pharma.php');
$med= array('name'=>'','categorie'=>'','expdate'=>'','pv'=>'');

///sql querry

$sql = "SELECT * FROM medecines ";

////make querry and get result

$result = mysqli_query($conn,$sql);

/////fetch the resulting rows as array

$medecines = mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);

$sql="SELECT EXP_DATE AS total FROM medecines where name='indocide'";
$result = mysqli_query($conn,$sql);
$values = mysqli_fetch_assoc($result);
$izina= $values['total'];

echo $izina;
 
$sql="SELECT distinct count(name) AS total FROM medecines" ;
$result = mysqli_query($conn,$sql);
$values = mysqli_FETCH_aSSOC($result);
$num_row = $values['total'];

mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
    <head>
    <style>
    * {
    font-weight: bold !important;
    font-family:century gothic;
}
        table{
      
        }
        table td{
            padding-right:20px;
            padding-top:7px;padding-left:20px;padding-bottom:7px;
        }
        tr td{
            font-size:15px;
            background-color:rgb(192, 192, 192);
        }
        #title td{
            font-weight:bolder;
            background-color:rgb(250, 226, 121);
        }
        .title{ 
            font-family: arial !important;
            color:rgb(248, 169, 23);
            text-align:center;
        }
        button{
            background-color:rgb(250, 226, 121);
            border:0px;
            padding-top:7px;padding-bottom:7px;
            align-items:center;
            display:flex;
        }
        button a{
            text-decoration:none;
            color:black;
            font-weight:bolder;
            align-items:center;
        }
        .tableau{
            justify-content:center !important;
            display: flex;
        }
        .buttons li{
            display:inline-flex;
            padding-left:15px;
            font-weight:bolder !important;
        }
        .buttons{
            display:flex;
            justify-content:center;
        }
    </style>
    </head>
    <body>
    
        <?php include('templates/header.php') ?>
        <h1 class="title"> Medecines</h1>
        <div class="buttons">
            <li><button><a href="add_med.php">ADD MEDECINE</button></a></li>
            <li><button><a href="achat.php">ACHETER MEDECINE</button></a></li>
        </div>
<br>
            <div class="tableau">
            
                <table>
                <tr id="title">
                        <td>Id</td>
                        <td>Nom Du Medicament</td>
                        <td>Date d'expiration</td>
                        <td>Prix de vente</td>
                        <td>Categorie</td>
                        <td>Created on</td>
                        <td>Qte</td>
                        
                    </tr    >
                <?php foreach($medecines as $medecine){?>
                    
                    <tr>
                        <td><?php echo htmlspecialchars($medecine['id']) ;?></td>
                        <td><?php echo htmlspecialchars($medecine['name']) ;?></td>
                        <td><?php echo htmlspecialchars($medecine['exp_date']) ;?></td>
                        <p><td><?php echo htmlspecialchars($medecine['pv']) ;?>Fbu</td></p>
                        <td><?php echo htmlspecialchars($medecine['categorie']) ;?></td>
                        <td><?php echo htmlspecialchars($medecine['created_at']) ;?></td>
                        <td><?php echo htmlspecialchars($num_row)?></td>
                        <div class="buttons">
                        <td><input type="submit" value="EDIT" name="submit"></td>
                               <td><input type="submit" value="ACHETER" name="submit"></td>
                        </div>
                    </tr>
                    <?php } ?>
                </table>
                    
                
            </div>                    

        <?php include('templates/footer.php') ?>
    </body>
</html>
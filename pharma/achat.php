<?php


include('config/db_pharma.php');
$med= array('name'=>'','categorie'=>'','expdate'=>'','pv'=>'');

///sql querry

$sql = "SELECT * FROM achat a ";


////make querry and get result

$result = mysqli_query($conn,$sql);

/////fetch the resulting rows as array

$medecines = mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);



$query = "SELECT pa*qte as sum FROM achat";
$query_result = mysqli_query($conn, $query);
$medecine = mysqli_fetch_all($query_result,MYSQLI_ASSOC);

foreach($medecine as $med){
    $output = $med['sum'];
    echo $output,"<BR>";
}




mysqli_close($conn);



?>

<!DOCTYPE html>
<html>
    <head>
    <style>
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
            <li><button><a href="add_achat.php">ACHETER MEDECINE</button></a></li>
        </div>
<br>
            <div class="tableau">
            
                <table>
                <tr id="title">
                        <td>Id</td>
                        <td>Nom Du Medicament</td>
                        <td>Date d'achat</td>
                        <td>Achetteur</td>
                        <td>Prix d'achat Unitaire</td>
                        <td>Prix d'achat Total</td>
                        <td>Quantite</td>
                        <td>Unite d'achat</td>
                        
                        
                    </tr    >
                    
                <?php foreach($medecines as $medecine){?>
                    
                    <tr>
                        <td><?php echo htmlspecialchars($medecine['id']) ;?></td>
                        <td><?php echo htmlspecialchars($medecine['name']) ;?></td>
                        <td><?php echo htmlspecialchars($medecine['buy_date']) ;?></td>
                        <td><?php echo htmlspecialchars($medecine['achetteur']) ;?></td>
                        <p><td><?php echo htmlspecialchars($medecine['pa']) ;?>Fbu</td></p>
                        <td><?php echo htmlspecialchars($output) ;?></td>
                        <td><?php echo htmlspecialchars($medecine['qte']) ;?></td>
                        <td><?php echo htmlspecialchars($medecine['unite_achat'])?></td>
                        <div class="buttons">
                        <td><input type="submit" value="EDIT" name="submit"></td>
                        <td><input type="submit" value="DELETE" name="submit"></td>
                        </div>
                    </tr>
                    <?php } ?>
                </table>
                    
                
            </div>                    

        <?php include('templates/footer.php') ?>
    </body>
</html>
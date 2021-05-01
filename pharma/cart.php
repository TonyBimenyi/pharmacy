<?php 
include('config/db_pharma.php');

$sql = "SELECT * FROM medecines";
$result = mysqli_query($conn,$sql);
$values = mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_close($conn);



if (isset($_POST['submit'])){
    $name= $_POST['panier'];
    echo $name;
}else{
    
}



?>
<html>
<head>
    <style>
        *{
            font-weight:bold !important;
        }
        * {
    font-weight: bold !important;
    font-family:century gothic;
}
        tr{
           
        }
        td{
           
            
        }
        input{
            outline:none;
        }
            .cards{
                display:inline-block;
                padding-bottom:10px;
            }
        .card{
            padding-bottom:10px;
            width:120px;
            height:90px;
            display:flex;
            justify-items:center;
            background-color:rgb(250, 226, 121);
            
            
        }
        #nmber{
            width:110px;
            justify-content: center;
            align-items:center;
            border:none;
            display:flex;
        }
        .panier {
            height:180px;
            display:flex;
            justify-content: flex-end;
            border:2px solid black;
        }
        h1{
        
            display:none;
        }
        #scroll-list {
	height:340px; width:100%;}
#scroll-list{
	overflow:hidden; overflow-y:scroll;}

    </style>
</head> 
<body>
  
<?php include('templates/header.php') ?>
<h1>Panier</h1>
<br>
<div id="scroll-list">
<?php foreach($values as $medecine){ ?>
    <div class="cards">
    <div class="card">
            <table>
                <tr>
                    <td><?php echo htmlspecialchars($medecine['name']) ?></td>
                    </tr>
                    <tr>
                    <td id="pv"><?php echo htmlspecialchars($medecine['pv']) ?>Fbu</td>
                </tr>
                <tr>
                  <TD><input type="number" value="" id="nmber" placeholder="Enter the Qty"></TD>
                </tr>
                <tr>
                    <form action="" method="POST" >
                  <TD><input type="submit" value="ADD TO CART" name="panier" ></TD>
                  </form>
                </tr>
            </table>
            </div>
    </div>
    <?php }?>
    </div>
      
    <div class="panier">
        <table>
        <p></p>
        </table>
    </div>

<?php include('templates/footer.php') ?>
    
</body>
</html>
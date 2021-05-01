<?php 


?>

<!DOCTYPE html>
<html>
    <head>



    <style>
    body{
        font-family: arial !important;
    }
        h2{
    font-size: 25px !important;
    line-height: 23px;
    font-family: arial !important;
    text-align:justify;
    
}
.bg{
    background-color: rgb(3, 154, 192) !important;
}

 .nav-container li{
    list-style: none;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-size : 18px;
    padding-left: 0px;
    padding-right:0px;
    display:inline-block;
    
}
.menu-list{
    justify-content:flex-end;
}
.menu-list li a{
    color:black;
    font-weight:bolder !important;
    text-decoration:none;
    padding-top:16px;
    padding-bottom:16px;
    padding-left:10px;
    padding-right:10px
}
.menu-list li a:hover{
    color:black;
    background-color:skyblue;
    transition:.3s;
}
.nav-container{
    background-color: rgb(250, 226, 121) !important;
    display:flex;
    justify-content:flex-start;
}
.active{
    color:black;
    background-color:skyblue;
}

///////////FOOTER STYLE

    </style>





    </head>
    <body>
        
        <nav>
        
        <div class="nav-container">

                <ul class="menu-list">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="cart.php">Add to Cart</a></li>
                    <li><a href="vente.php">Ventes</a></li>
                    <li><a href="achat.php"> Achats</a></li>
                    <li><a href="stock.php">Stock</a></li>
                    <li><a href="medecines.php">Medecines</a></li>
                    <li>Control</li>
                </ul>
            </div>
        </nav>
        <div class="bg"></div>
</html>
    

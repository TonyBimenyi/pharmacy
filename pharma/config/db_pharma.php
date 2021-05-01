<?php 

$conn = mysqli_connect('localhost','tony','test1234','pharma');

if(!$conn){
    echo 'connexion error' . mysqli_connect_error();
}

?>
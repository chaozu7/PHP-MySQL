<?php

session_start();



require_once 'connect_msql.php';

$_SESSION['id'];
$current_id = $_SESSION['id'];
$imie = $_POST['imie'];
$_SESSION['nazwisko'];
$nazwisko = $_POST['nazwisko'];
$_SESSION['n_dom'];
$n_dom = $_POST['n_dom'];
$_SESSION['ulica'];
$ulica = $_POST['ulica'];
$_SESSION['n_mieszkanie'];
$n_mieszkanie = $_POST['n_mieszkanie'];
$_SESSION['kod_pocztowy'];
$kod_pocztowy = $_POST['kod_pocztowy'];
$_SESSION['miasto'];
$miasto = $_POST['miasto'];
$_SESSION['panstwo'];
$panstwo = $_POST['panstwo'];



$update_imie = "UPDATE klienci SET imie ='$imie' WHERE id = $current_id";
if ($imie != NULL){
mysqli_query($mysql_connection, $update_imie);
}

$update_nazwisko = "UPDATE klienci SET nazwisko ='$nazwisko' WHERE id = $current_id";
if ($nazwisko != NULL){
mysqli_query($mysql_connection, $update_nazwisko);
}

$update_ulica = "UPDATE klienci SET ulica ='$ulica' WHERE id = $current_id";
if ($ulica != NULL){
mysqli_query($mysql_connection, $update_ulica);
}

$update_n_dom = "UPDATE klienci SET n_dom ='$n_dom' WHERE id = $current_id";
if ($n_dom != NULL){
mysqli_query($mysql_connection, $update_n_dom);
}

$update_n_mieszkanie = "UPDATE klienci SET n_mieszkanie ='$n_mieszkanie' WHERE id = $current_id";
if ($imie != NULL){
mysqli_query($mysql_connection, $update_n_mieszkanie);
}

$update_miasto = "UPDATE klienci SET miasto ='$miasto' WHERE id = $current_id";
if ($miasto != NULL){
mysqli_query($mysql_connection, $update_miasto);
}

$update_panstwo = "UPDATE klienci SET panstwo ='$panstwo' WHERE id = $current_id";
if ($panstwo != NULL){
mysqli_query($mysql_connection, $update_panstwo);
}

  mysqli_close($mysql_connection);
 
  
  echo 'Twoje dane zostały przesłane poprawnie, wróć do serwisu: <a href="log_out.php">Klik!</a>';
  
?>
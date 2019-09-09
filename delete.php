<?php

session_start();

require_once 'connect_msql.php';

$_SESSION['id'];
$current_id = $_SESSION['id'];
$imie = $_SESSION['imie'];


$result = "SELECT * FROM klienci WHERE id = $current_id";
$to_copy = mysqli_query($mysql_connection, $result);
$row = mysqli_fetch_assoc($to_copy);
$_SESSION['login'] = $row['login'];
$_SESSION['haslo'] = $row['haslo'];
$_SESSION['imie'] = $row['imie'];
$_SESSION['nazwisko'] = $row['nazwisko'];
$_SESSION['email'] = $row['email'];
$_SESSION['n_dom'] = $row['n_dom'];
$_SESSION['ulica'] = $row['ulica'];
$_SESSION['n_mieszkanie'] = $row['n_mieszkanie'];
$_SESSION['kod_pocztowy'] = $row['kod_pocztowy'];
$_SESSION['miasto'] = $row['miasto'];
$_SESSION['panstwo'] = $row['panstwo'];
$_SESSION['produkt'] = $row['produkt'];
        
$zapytanie="INSERT into byli_klienci(imie,nazwisko,login, haslo, email, ulica, n_dom, n_mieszkanie, kod_pocztowy, miasto, panstwo, produkt) 
                        values
                        ('".$row["imie"]."','".$row["nazwisko"]."','".$row["login"]."','".$row["haslo"]."','".$row["email"]."',
                        '".$row["ulica"]."','".$row["n_dom"]."','".$row["n_mieszkanie"]."','".$row["kod_pocztowy"]."',"
                        . "'".$row["miasto"]."','".$row["panstwo"]."', '".$row["produkt"]."')";

 mysqli_query($mysql_connection, $zapytanie);

$usun = "DELETE FROM klienci WHERE id = $current_id"; 
mysqli_query($mysql_connection, $usun);

  echo 'Twoje konto zostało zdezaktualizowane, wróć do serwisu: <a href="log_out.php">Klik!</a>';

mysqli_close($mysql_connection);
?>

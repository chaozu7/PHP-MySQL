<?php
session_start();

if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
{
   header('Location:index.php');
   exit();
}

require_once 'connect_msql.php';


$login = $_POST['login'];
$haslo = $_POST['haslo'];

$login = htmlentities($login, ENT_QUOTES, "UTF-8");
$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");


if ($result = mysqli_query($mysql_connection, sprintf("SELECT * FROM klienci WHERE login='%s'and haslo='%s'", mysqli_real_escape_string($mysql_connection, $login), mysqli_real_escape_string($mysql_connection, $haslo))))
  {
  
  $rowcount = mysqli_num_rows($result);
       
  if($rowcount == 1){
      $row = mysqli_fetch_assoc($result);
      
  //    if(password_verify($haslo, $row["haslo"])){
              
        $_SESSION['logged'] = true;      
        $_SESSION['id'] = $row['id'];
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

        unset($_SESSION['blad']);
        mysqli_free_result($result);
        header('Location: data_panel.php');
  //    } else {
  //      $_SESSION['blad'] = '<span style="color:red"> Nieprawidłowy login lub hasło <span>';
  //      echo $_SESSION['blad'];
  //      header('Location: strona_logowania.php');
        
      }
  } else {
      $_SESSION['blad'] = '<span style="color:red"> Nieprawidłowy login lub hasło <span>';
      echo $_SESSION['blad'];
      header('Location: strona_logowania.php');
      
  }
 
 




?>

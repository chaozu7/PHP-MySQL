<?php

    require_once 'connect_msql.php';
    
    if(isset($_POST['email']))
    {
       //success
        $is_ok = true;
        //login
        $login = $_POST['login'];
        
        if((strlen($login)<3) || (strlen($login)>20))
        {
            
           $is_ok = false;
            $_SESSION['err_login'] = "Login musi posiadać od 3 do 20 znaków";
        } 
        if($is_ok == true)
        {
            $zapytanie="INSERT into klienci (imie,nazwisko,login, haslo, email, ulica, n_dom, n_mieszkanie, kod_pocztowy, miasto, panstwo, produkt) 
            values
        ('".$_POST["imie"]."','".$_POST["nazwisko"]."','".$_POST["login"]."','".$_POST["haslo"]."','".$_POST["email"]."',
         '".$_POST["ulica"]."','".$_POST["n_dom"]."','".$_POST["n_mieszkanie"]."','".$_POST["kod_pocztowy"]."','".$_POST["miasto"]."','".$_POST["panstwo"]."', '".$_POST["produkt"]."')";
        mysqli_query($mysql_connection, $zapytanie);
        
        mysqli_close($mysql_connection);
          
        if ($zapytanie == true){
        echo "Dane zostały przesłane poprawnie".'<button><a href="strona_logowania.php">Zaloguj się</a></button>';
        }; 
        }
    }

?>



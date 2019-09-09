<?php
    session_start();
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
        
        if (ctype_alnum($login)== false)
        {
            $is_ok = false;
            $_SESSION['err_login'] = "Login może składać się tylko z liter i cyfr";
        }
        
        //email
        $email = $_POST['email'];
        $email_safe = filter_var($email, FILTER_SANITIZE_EMAIL);
        
        if((filter_var($email_safe, FILTER_VALIDATE_EMAIL)== false) || ($email != $email_safe)) {
            
            $is_ok = false;
            $_SESSION['err_email'] = "Podaj poprawny adres email";
        }
        
        //haslo
        $haslo = $_POST['haslo'];
        $haslo1 = $_POST['haslo1'];
        
        if ((strlen($haslo)<8) || (strlen($haslo)>20)){
            $is_ok = false;
            $_SESSION['err_haslo'] = "Hasło musi mieć ponad 8 znaków";
        }
        
        if ($haslo != $haslo1) {
           $_SESSION['err_haslo1'] = "Hasła muszą być takie same"; 
        }
        
  //      $haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);
       
        
        
       mysqli_report(MYSQLI_REPORT_STRICT);
        
        try { 
            require_once 'connect_msql.php';
            if ($mysql_connection->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
             // email verify
                $mail_ask = mysqli_query($mysql_connection,"SELECT id FROM klienci WHERE email='$email'");
                
                $rowcount=mysqli_num_rows($mail_ask);
                    
                    if($rowcount>0){
                        $is_ok=false;
                        $_SESSION['err_email']="Istnieje już konto przypisane do tego adresu e-mail!";
                    }	
                
            // login verify
                $log_ask = mysqli_query($mysql_connection,"SELECT id FROM klienci WHERE login='$login'");
                
                $rowcount2=mysqli_num_rows($log_ask);
                    
                    if($rowcount2>0){
                        $is_ok=false;
                        $_SESSION['err_login']="Istnieje już użytkownik o takim loginie, wybierz inny.";
                    }
                        
             //is ok
                if($is_ok == true) {
                
                    $zapytanie="INSERT into klienci(imie,nazwisko,login, haslo, email, ulica, n_dom, n_mieszkanie, kod_pocztowy, miasto, panstwo, produkt) 
                        values
                        ('".$_POST["imie"]."','".$_POST["nazwisko"]."','".$_POST["login"]."','".$_POST["haslo"]."','".$_POST["email"]."',
                        '".$_POST["ulica"]."','".$_POST["n_dom"]."','".$_POST["n_mieszkanie"]."','".$_POST["kod_pocztowy"]."',"
                        . "'".$_POST["miasto"]."','".$_POST["panstwo"]."', '".$_POST["produkt"]."')";

                        mysqli_query($mysql_connection, $zapytanie);

            
                        mysqli_close($mysql_connection);          
            
                }  
            }              
           
            } catch (Exception $error) { 
                echo '<span class="error">Błąd serwera.</span>';
            }
             
        }           
               

?>

<!DOCTYPE html>
<html lang="pl">
    <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Omnifood to firma zajmująca się przygotowaniem i dowozem jedzenia.">
	<link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
	<link rel="stylesheet" type="text/css" href="resources/css/style.css">
	<link rel="stylesheet" type="text/css" href="resources/css/queries.css">
	<link rel="stylesheet" type="text/css" href="vendors/css/animate.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">       
	<title>Omnifood - formularz rejestracyjny</title>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body>
        <section>
            <div class="register">
                <div class="row">
                    <h2> Formularz rejestracyjny </h2>
                </div>
                <div class="row">
                    <form method="post" class="contact-form">
                        <div class="row">
                            <div class="col span-1-of-3">
                                <label>Imię:</label>
                            </div>
                            <div class="col span-2-of-3">
                                <input type="text" name="imie" value="" placeholder="imię" maxlength="30" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col span-1-of-3">
                                <label>Nazwisko:</label>
                            </div>
                            <div class="col span-2-of-3">
                                 <input type="text" name="nazwisko" value="" placeholder="nazwisko" required/>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col span-1-of-3">
                                 <label>Login:</label>
                            </div>
                            <div class="col span-2-of-3">
				<input type="text" name="login" value="" placeholder="login" maxlength="30" required/>
                                 <?php
                                    if (isset($_SESSION['err_login'])){
                                        echo '<div class="error">'. $_SESSION['err_login'].'</div>';
                                        unset($_SESSION['err_login']);
                                    }
                                 ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col span-1-of-3">
				<label>Hasło:</label>
                            </div>
                            <div class="col span-2-of-3">
				<input type="password" name="haslo" value="" placeholder="hasło"  required/> 
                                 <?php
                                    if (isset($_SESSION['err_haslo'])){
                                        echo '<div class="error">'. $_SESSION['err_haslo'].'</div>';
                                        unset($_SESSION['err_haslo']);
                                    }
                                 ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col span-1-of-3">
				<label>Powtórz hasło:</label>
                            </div>
                            <div class="col span-2-of-3">
				<input type="password" name="haslo1" value="" placeholder="hasło"  required/> 
                                <?php
                                    if (isset($_SESSION['err_haslo1'])){
                                        echo '<div class="error">'. $_SESSION['err_haslo1'].'</div>';
                                        unset($_SESSION['err_haslo1']);
                                    }
                                 ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col span-1-of-3">
				<label>Adres e-mail:</label>
                            </div>       
                            <div class="col span-2-of-3">
				<input type="email" name="email" value="" placeholder="e-mail" required/>
                                <?php
                                    if (isset($_SESSION['err_email'])){
                                        echo '<div class="error">'. $_SESSION['err_email'].'</div>';
                                        unset($_SESSION['err_email']);
                                    }
                                 ?>
                            </div>
                        </div>   
                        <fieldset>				
                            <legend>Podaj swój adres</legend>                            
                            <div class="row">
                                <div class="col span-1-of-12">
                                    <label>Ulica:</label>
                                </div>
                                <div class="col span-4-of-12">
                                    <input type="text" name="ulica" value="" placeholder="ulica" required>
                                </div>
                                <div class="col span-2-of-12">
                                    <label>Numer domu:</label>
                                </div>
                                <div class="col span-1-of-12">
                                    <input type="text" name="n_dom" value="" placeholder=""> 
                                </div>
                                <div class="col span-3-of-12">
                                    <label>Numer mieszkania:</label>
                                </div>
                                <div class="col span-1-of-12">
                                    <input type="text" name="n_mieszkanie" value="" placeholder="" >
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col span-2-of-12">
                                    <label>Kod pocztowy:</label>
                                </div>
                                <div class="col span-2-of-12">
                                    <input type="text" name="kod_pocztowy" value="" placeholder="kod pocztowy" required>
                                </div>
                                <div class="col span-1-of-12">
                                    <label>Miasto:</label>
                                </div>
                                <div class="col span-3-of-12">
                                    <input type="text" name="miasto" value="" placeholder="miasto" required>
                                </div>
                                <div class="col span-1-of-12">
                                    <label>Kraj:</label>
                                </div>
                                <div class="col span-3-of-12">
                                    <input type="text" name="panstwo" value="" placeholder="państwo" required>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row">
                            <div class="col span-3-of-3">
				<fieldset>
                                    <legend>Wybór subskrypcji</legend>
                                        <div>
                                            <input type="radio" name="produkt" value="premium" >  
                                                <span>PREMIUM</span>
                                        </div>
                                        <div>
                                            <input type="radio" name="produkt" value="pro" checked=""> 
                                                <span>PRO</span>
                                        </div>
                                        <div>
                                            <input type="radio" name="produkt" value="starter" > 
                                                <span>STARTER</span>
                                        </div>
                                </fieldset> 
                            </div>
                        </div>
                        
                        <div class="row submit_button">
                            <input type="submit" value="Prześlij">
                         </div>
                          <?php
                                    if (isset($_SESSION['is_ok'])){
                                        echo '<div class="success">'. $_SESSION['is_ok'].'</div>';
                                        unset($_SESSION['is_ok']);
                                    }
                           ?>
                    </form>
                </div>
            </div>
        </section>              
    </body>
</html>
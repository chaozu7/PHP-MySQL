<?php
    session_start();
    if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
    {
        header('Location: data_panel.php');
        exit();
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
		
		<title>Omnifood - Strona logowania</title>
	</head>
    <body>
        <section>
            <div class="log-box">
        
        <form action="logowanie.php" method="post" class="contact-form">
            <div class="row">
                            <div class="col span-1-of-3">
                                 <label>Login:</label>
                            </div>
                            <div class="col span-2-of-3">
				<input type="text" name="login" value="" placeholder="login" maxlength="30" required/>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col span-1-of-3">
				<label>Hasło:</label>
                            </div>
                            <div class="col span-2-of-3">
				<input type="password" name="haslo" value="" placeholder="hasło"  required/> 
                            </div>
                            </div>
            <div class="row submit_button">
                             
                                 <input type="submit" value="Zaloguj się">
                            
                            </div>
            <div>
                <?php 
                    if(isset($_SESSION['blad']))
                            echo $_SESSION['blad'];                   
                ?>
            </div>
            
        </form>
            </div>
        </section>
    </body>
</html>

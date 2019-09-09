<?php

session_start();



$_SESSION['login'];
$_SESSION['haslo'];
$_SESSION['imie'];
$_SESSION['nazwisko'];
$_SESSION['email'];
$_SESSION['n_dom'];
$_SESSION['ulica'];
$_SESSION['n_mieszkanie'];
$_SESSION['kod_pocztowy'];
$_SESSION['miasto'];
$_SESSION['panstwo'];
$_SESSION['produkt'];


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
		
		<title>Omnifood - panel użytkownika</title>
	</head>
    <body>
        <main>
            <section class="plan-box">
                <form method="post" action="save_data.php">  
                 <div>
                    <h2> Informacje o koncie </h2>
                </div>
                
                <div class="row">
                <span>Imię:</span>
                <span><input type="text" name="imie" value="" placeholder="<?PHP echo $_SESSION['imie']; ?>" maxlength="30"/></span>
                </div>
                <div class="row">
                <span>Nazwisko:</span>
                <span><input type="text" name="nazwisko" value="" placeholder="<?PHP echo $_SESSION['nazwisko']; ?>"/></span>
                </div>
                <div class="row">
                <span>Login:</span>
                <span><?PHP echo $_SESSION['login']; ?></span>
                </div>
                <div class="row">
                <span>Hasło:</span>
                <span><?PHP echo $_SESSION['haslo']; ?></span>
                </div>
                <div class="row">
                <span>E-mail:</span>
                <span><?PHP echo $_SESSION['email'];?></span>
                </div>
                <div class="row">
                <span>Ulica:</span>
                <span><input type="text" name="ulica" value="" placeholder="<?PHP echo $_SESSION['ulica']; ?>" ></span>
                </div>
                <div class="row">
                <span>Nr domu:</span>
                <span><input type="text" name="n_dom" value="" placeholder="<?PHP echo $_SESSION['n_dom']; ?>"> </span>
                </div>
                <div class="row">
                <span>Nr mieszkania:</span>
                <span><input type="text" name="n_mieszkanie" value="" placeholder="<?PHP echo $_SESSION['n_mieszkanie']; ?>" ></span>
                </div>
                <div class="row">
                <span>Kod pocztowy:</span>
                <span><input type="text" name="kod_pocztowy" value="" placeholder="<?PHP echo $_SESSION['kod_pocztowy']; ?>" ></span>
                </div>
                <div class="row">
                <span>Miasto:</span>
                <span><input type="text" name="miasto" value="" placeholder="<?PHP echo $_SESSION['miasto']; ?>"></span>
                </div>
                <div class="row">
                <span>Państwo:</span>
                <span><input type="text" name="panstwo" value="" placeholder="<?PHP echo $_SESSION['panstwo']; ?>"></span>
                </div>
                <div class="row">
                <span>Pakiet: </span>
                <span><?PHP echo $_SESSION["produkt"];?></span>
                </div>
                <div class="row">
                    <div class="col span-1-of-2 submit_button">
                        <input type = submit value="Zapisz zmiany">
                    </div>
                    <div class="col span-1-of-2 submit_button">
                        <a href="delete.php">Usuń konto</a>
                    </div>
                    
                </div>
                </form>
            </section>
        </main>
    </body>
</html>
</html>

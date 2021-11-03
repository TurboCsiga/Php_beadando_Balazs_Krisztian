<?php

require_once 'db.php';
require_once 'autok.php';

$kocsi = Japan::osszes();

$kocsiId = $_GET['id'] ?? NULL;

   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $kocsiMarka = $_POST['marka'];
     $kocsiTipus = $_POST['tipus'];
     $kocsiKialakitas = $_POST['kialakitas'];
     $kocsiTeljesitmeny = $_POST['teljesitmeny'];
     $kocsiMotor = $_POST['motor'];
     $kocsiMegjelenes = new DateTime($_POST['megjelenes']);

     Japan::kocsiMod($kocsiId, $kocsiMarka, $kocsiTipus, $kocsiKialakitas, $kocsiTeljesitmeny, $kocsiMotor, $kocsiMegjelenes);
     header('Location: index.php');
   }
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>I'm just running in the 90'-s</title>
  </head>
  <body>
    <div class="container">
           <form method="post">
                  <div>
                    <label>
                      <h1>Autó szerkesztése:</h1>
                    </label>
                  </div>
                   <div>
                     <label>
                       <input type="text" name="marka" placeholder="Márka">
                     </label>
                   </div>
                   <div>
                     <label>
                       <input type="text" name="tipus" placeholder="Típus">
                     </label>
                   </div>
                   <div>
                     <label>
                       <input type="text" name="kialakitas" placeholder="Kialakítás">
                     </label>
                   </div>
                   <div>
                     <label>
                       <input type="number" name="teljesitmeny" placeholder="Teljesítmény"> <span>(lóerő)</span>
                     </label>
                   </div>
                   <div>
                     <label>
                       <input type="text" name="motor" placeholder="Motor">
                     </label>
                   </div>
                   <div>
                     <label>
                       <input type="date" name="megjelenes"> <span>Megjelenési dátum</span>
                     </label>
                   </div>

                   <input type="submit" value="Szerkeszt" id="szerkGomb">
           </form>
  </body>
</html>

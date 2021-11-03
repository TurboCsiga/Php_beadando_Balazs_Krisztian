<?php
require_once 'db.php';
require_once 'autok.php';

$kocsi = Japan::osszes();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deleteId = $_POST['deleteId'] ?? '';

  if ($deleteId !== '') {
    Japan::kocsiTorol($deleteId);
    header('Location: index.php');
  }
}

?><!DOCTYPE html>
<html lang="hu" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Running in the 90'-s,</title>
  </head>
  <body>
    <div class="container">
    <?php
    foreach ($kocsi as $kiir) {
          echo "<div>";
          echo "<h2>";
          echo $kiir -> getMarka();
          echo " " . $kiir -> getTipus();
          echo "</h2>";
          echo "<p>Kialakítás: " . $kiir -> getKialakitas() . "</p>";
          echo "<p>Teljesítmény: " . $kiir -> getTeljesitmeny() . "</p>";
          echo "<p>Motor: " . $kiir -> getMotor() . "</p>";
          echo "<p>Megjelenési: " . $kiir -> getMegjelenes() ->format('Y-m-d') . "</p>";

          echo "<form method='POST'>";
          echo "<input type='hidden' name='deleteId' value='" . $kiir -> getId() . "'>";
          echo "<button type='submit'>Törlés</button>";
          echo "<button><a href='kocsiMod.php?id=" . $kiir->getId() . "'>Szerkeszt</a></button>";
          echo "</form>";
          echo "</div>";
        }

             /*foreach ($kocsi as $i) {
                  echo $i -> getMarka() . ", " .
                  $i -> getTipus() . ", " .
                  $i -> getKialakitas() . ", " .
                  $i -> getTeljesitmeny() . " lóerő, " .
                  $i -> getMotor() . ", " .
                  $i -> getMegjelenes() -> format('Y-m-d') . "<br>";
             }*/
        ?>
      </div>
      <div class="container">
        <button><a href='ujkocsi.php'>Új autó hozzáadása</a></button>
      </div>

  </body>
</html>

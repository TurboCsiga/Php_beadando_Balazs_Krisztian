<?php
require_once 'db.php';
require_once 'autok.php';

$kocsi = Japan::osszes();

?><!DOCTYPE html>
<html lang="hu" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Running in the 90'-s</title>
  </head>
  <body>
    <?php
             foreach ($kocsi as $i) {
                  echo $i -> getMarka() . " " .
                  $i -> getTipus() . " " .
                  $i -> getKialakitas() . " " .
                  $i -> getTeljesitmeny() . " " .
                  $i -> getMotor() . " " .
                  $i -> getMegjelenes() -> format('Y-m-d') . "<br>";
             }
        ?>
  </body>
</html>

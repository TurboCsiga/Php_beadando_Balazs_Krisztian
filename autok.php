<?php

class Japan {
  private $id;
  private $marka;
  private $tipus;
  private $kialakitas;
  private $teljesitmeny;
  private $motor;
  private $megjelenes;

  public function __construct(string $marka, string $tipus,string $kialakitas,int $teljesitmeny, string $motor, DateTime $megjelenes) {
        $this->marka = $marka;
        $this->tipus = $tipus;
        $this->kialakitas = $kialakitas;
        $this->teljesitmeny = $teljesitmeny;
        $this->motor = $motor;
        $this->megjelenes = $megjelenes;
    }


    public function getMarka() : string {
        return $this->marka;
    }


    public function getTipus() : string {
        return $this->tipus;
    }



    public function getKialakitas() : string {
        return $this->kialakitas;
    }



      public function getTeljesitmeny() : ?int {
          return $this->teljesitmeny;
      }



      public function getMotor() : string {
          return $this->motor;
      }



      public function getMegjelenes() : DateTime {
        return $this->megjelenes;
      }


      public static function osszes() : array {
            global $db;

            $t = $db -> query("SELECT * FROM japan ORDER BY id ASC")
                -> fetchAll();
                $eredmeny = [];


              foreach ($t as $elem) {
                  $autok = new Japan($elem['marka'],
                                      $elem['tipus'],
                                      $elem['kialakitas'],
                                      $elem['teljesitmeny'],
                                      $elem['motor'],
                         new DateTime($elem['megjelenes']));
                  $autok -> id = $elem['id'];
              $eredmeny[] = $autok;
          }

          return $eredmeny;
      }



}


?>

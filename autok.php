<?php

class Japan {
  private $id;
  private $marka;
  private $tipus;
  private $kialakitas;
  private $teljesitmeny;
  private $motor;
  private $megjelenes;

  public function __construct(string $marka, string $tipus,string $kialakitas,
                              int $teljesitmeny, string $motor, DateTime $megjelenes) {
        $this->marka = $marka;
        $this->tipus = $tipus;
        $this->kialakitas = $kialakitas;
        $this->teljesitmeny = $teljesitmeny;
        $this->motor = $motor;
        $this->megjelenes = $megjelenes;
    }



    public function getId() : int {
        return $this->id;
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


      public function ujAuto() {
           global $db;

           $db->prepare('INSERT INTO japan (marka, tipus, kialakitas, teljesitmeny, motor, megjelenes)
                         VALUES (:marka, :tipus, :kialakitas, :teljesitmeny, :motor, :megjelenes)')
               ->execute([':marka' => $this -> marka,
                           ':tipus' => $this -> tipus,
                           ':kialakitas' => $this -> kialakitas,
                           ':teljesitmeny' => $this -> teljesitmeny,
                           ':motor' => $this -> motor,
                           ':megjelenes' => $this -> megjelenes -> format('Y-m-d')]);
                         }

      public static function kocsiTorol(int $id) {
           global $db;
                  $db->prepare('DELETE FROM japan WHERE id = :id')
        ->execute([':id' => $id]);
            }

      public static function kocsiMod(int $kocsiId, string $kocsiMarka, string $kocsiTipus, string $kocsikialakitas, int $kocsiTeljesitmeny, string $kocsiMotor, DateTime $kocsiMegjelenes) {
          global $db;

          $db -> prepare('UPDATE japan SET marka = :marka, tipus = :tipus, kialakitas = :kialakitas,
                                          teljesitmeny = :teljesitmeny, motor = :motor,
                                          megjelenes = :megjelenes WHERE id = :id ')
              -> execute([':marka' => $kocsiMarka, ':tipus' => $kocsiTipus, ':kialakitas' => $kocsikialakitas,
                          ':teljesitmeny' => $kocsiTeljesitmeny, ':motor' => $kocsiMotor, ':megjelenes' => $kocsiMegjelenes -> format('Y-m-d'), ':id' => $kocsiId]);

    }
    }
?>

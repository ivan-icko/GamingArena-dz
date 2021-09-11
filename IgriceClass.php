<?php

class Igrica{
  public $idIgrice;
  public $nazivIgrice;
  public $verzijaIgrice;
  public $zanr;

  function __construct($idIgrice,$nazivIgrice,$verzijaIgrice,$zanr) {
        $this->idIgrice = $idIgrice;
        $this->nazivIgrice = $nazivIgrice;
        $this->verzijaIgrice = $verzijaIgrice;
        $this->zanr = $zanr;
    }


    public function save($conn){
        if($conn->query("INSERT INTO igrica(nazivIgrice,verzijaIgrice,zanrID) VALUES ('$this->nazivIgrice',$this->verzijaIgrice,$this->zanr)")){
          return true;
        }else{
          return false;
        }
    }

    public function change($conn){
        if($conn->query("UPDATE igrica SET nazivIgrice='$this->nazivIgrice',verzijaIgrice=$this->verzijaIgrice,zanrID=$this->zanr where idIgrice=$this->idIgrice")){
          return true;
        }else{
          return false;
        }
    }
    public function delete($conn,$id){
        if($conn->query("DELETE FROM igrica where idIgrice=$id")){
          return true;
        }else{
          return false;
        }
    }
}

 ?>
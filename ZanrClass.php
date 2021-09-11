<?php
class Zanr{
  public $zanrID;
  public $nazivZanra;

  function __construct($zanrID,$nazivZanra) {
        $this->zanrID = $zanrID;
        $this->nazivZanra = $nazivZanra;
    }


    public function save($conn){
        if($conn->query("INSERT INTO zanr(nazivZanra) VALUES ('$this->nazivZanra')")){
          return true;
        }else{
          return false;
        }
    }
}

 ?>
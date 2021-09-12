<?php
include 'konekcija.php';
include 'IgriceClass.php';

    $porukaUspesnosti = "";
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $igrica = new Igrica($id,null,null,null);
    if($igrica->delete($conn,$id)){
      header("Location:UpravljajIgricama.php");
    }else{
      echo "Nažalost, došlo je do greške, pokušajte ponovo!";
    }

 ?>
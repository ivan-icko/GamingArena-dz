<?php
 include 'konekcija.php';
 include 'IgriceClass.php';
 include 'ZanrClass.php';

 $porukaUspesnosti = "";
 $id = mysqli_real_escape_string($conn,$_GET['id']);
 $rez = $conn->query("select * from igrica i join zanr z on i.zanrID=z.zanrID where i.idIgrice=$id");

 while($red= $rez->fetch_assoc()){
  $zanr = new Zanr($red['zanrID'],$red['nazivZanra']);
  $IgricaIzmena = new Igrica($red['idIgrice'],$red['nazivIgrice'],$red['verzijaIgrice'],$zanr);
}


 if(isset($_POST['izmeniIgricu'])){
   $nazivIgrice = trim($_POST['nazivIgrice']);
   $verzijaIgrice = trim($_POST['verzijaIgrice']);
   $zanr = trim($_POST['zanr']);

   $igrica = new Igrica($IgricaIzmena->idIgrice,$nazivIgrice,$verzijaIgrice,$zanr);
   if($igrica->change($conn)){
      $porukaUspesnosti = "Uspešno ste izmenili igricu";
   }else{
     $porukaUspesnosti = "Nažalost, došlo je do greške, pokušajte ponovo !!! ";
   }
 }

  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gaming Arena</title>

    <link href="css/bootstrap.css" rel="stylesheet">


    <link href="css/main.css" rel="stylesheet">

  </head>

  <body>
    <div class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Gaming Arena</a>
            </div>
            <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Početna</a></li>
                <li><a href="DodajNovuIgricu.php">Dodaj novu igricu</a></li>
                <li><a href="UpravljajIgricama.php">Upravljaj igricama</a></li>
            </ul>
            </div>
        </div>
    </div>

    <div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
					<img src="slike/arena1.jpg" alt="arena" class="img img-circle">
                    <h1>Upravljaj igricama</h1>
				</div>
			</div>
	    </div>
    </div>



	<div class="container pt">
    <form action="" method="POST">
      <label for="nazivIgrice">Naziv igrice</label>
      <input type="text" name="nazivIgrice" class="form-control" value="<?php echo $IgricaIzmena->nazivIgrice; ?>" required>
      <label for="verzijaIgrice">Verzija igrice</label>
      <input type="number" name="verzijaIgrice" class="form-control" value="<?php echo $IgricaIzmena->verzijaIgrice; ?>" required>
      <label for="zanr">Zanr</label>
      <select id="zanr" name="zanr" class="form-control">
          <option value="<?php echo $IgricaIzmena->zanr->zanrID; ?>"> <?php echo $IgricaIzmena->zanr->nazivZanra; ?></option>
        <?php
            $rez = $conn->query("SELECT * FROM zanr");
            while($red = $rez->fetch_assoc()){
              ?>
            <?php if ($red['zanrID'] != $IgricaIzmena->zanr->zanrID) { ?><option value="<?php echo $red['zanrID'] ?>"> <?php echo $red['nazivZanra'] ?></option>
            <?php   }
              ?>
              <?php   }
              ?>
      </select>
      <label for="izmeniIgricu"></label>
      <input type="submit" name="izmeniIgricu" class="form-control btn-primary" value="Izmeni igricu">
  </form>
  <h3><?php echo $porukaUspesnosti ?> </h3>
	</div>

    <div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h4>Adresa</h4>
					<p>
          Vojvode Mišića 2,<br/>
						015 8950800, <br/>
						Loznica, Srbija.
					</p>
				</div>

				<div class="col-lg-4">
					<h4>Društvene mreže</h4>
					<p>
						<a href="https://www.facebook.com/fon.bg.ac.rs">Facebook</a><br/>
						<a href="https://twitter.com/fonbg">Twitter</a><br/>
						<a href="http://plus.google.com/106390371419524147048/posts">Google+</a>
					</p>
				</div>


			</div>

		</div>

  </body>
</html>

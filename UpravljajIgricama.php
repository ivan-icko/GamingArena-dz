<?php
    include 'konekcija.php';
    include 'IgriceClass.php';
    include 'ZanrClass.php';
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
					<img src="slike/sony.JPG" alt="pocetna" class="img img-circle">
                    <h1>Upravljaj igricama</h1>
				</div>
			</div>
	    </div>
    </div>



	<div class="container pt">
    <?php

    $niz = [];
    $rez = $conn->query("select * from igrica i join zanr z on i.zanrID=z.zanrID");

    while($red= $rez->fetch_assoc()){
      $zanr = new Zanr($red['zanrID'],$red['nazivZanra']);
      $igrica = new Igrica($red['idIgrice'],$red['nazivIgrice'],$red['verzijaIgrice'], $zanr);
      array_push($niz,$igrica);
    }
    ?>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Naziv igrice</th>
          <th>Verzija igrice</th>
          <th>Zanr</th>
          <th>Obriši</th>
          <th>Izmeni</th>
        </tr>
      </thead>
      <tbody>
    <?php
      foreach($niz as $vrednost){
        ?>
            <tr>
              <td><?php echo $vrednost->nazivIgrice ?>  </td>
              <td><?php echo $vrednost->verzijaIgrice ?>  </td>
              <td><?php echo $vrednost->zanr->nazivZanra ?></td>
              <td><a class="btn btn-danger" href="obrisiIgricu.php?id=<?php echo $vrednost->idIgrice ?>">Obriši</a></td>
              <td><a class="btn btn-info" href="IzmenaIgrice.php?id=<?php echo $vrednost->idIgrice ?>">Izmeni</a></td>
            </tr>
        <?php
      }
    ?>
      </tbody>
    </table>
    
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

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>

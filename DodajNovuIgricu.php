<?php
 include 'konekcija.php';
 include 'IgriceClass.php';


 $porukaUspesnosti = "";

 if(isset($_POST['sacuvajIgricu'])){
   $nazivIgrice = trim($_POST['nazivIgrice']);
   $verzijaIgrice = trim($_POST['verzijaIgrice']);
   $zanr = trim($_POST['zanr']);

   $igrica = new Igrica(-1,$nazivIgrice,$verzijaIgrice,$zanr);
   if($igrica->save($conn)){
      $porukaUspesnosti = "Uspešno ste uneli novu igricu";
   }else{
     $porukaUspesnosti = "Nažalost, došlo je od greške, pokušajte ponovo! ";
   }
 }

  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gaming Arena</title>

    <link href="css/bootstrap.css" rel="stylesheet">


    <link href="css/main.css" rel="stylesheet">


  </head>

  <body>
    <div id="header"></div>

    <div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
					<img src="slike/arena1.jpg" alt="arena" class="img img-circle">
                    <h1>Dodaj novu igricu</h1>
				</div>
			</div>
	    </div>
    </div>



	<div class="container pt">
    <form action="" method="POST">
      <label for="nazivIgrice">Naziv igrice</label>
      <input type="text" name="nazivIgrice" class="form-control" placehodler="Unesite igricu" required>
      <label for="verzijaIgrice">Verzija igrice</label>
      <input type="text" name="verzijaIgrice" class="form-control" placehodler="Unesite verziju igrice" required>
      <label for="zanr">Zanr</label>
      <select id="zanr" name="zanr" class="form-control">
        <?php
            $rez = $conn->query("SELECT * from zanr");
            while($red = $rez->fetch_assoc()){
              ?>
            <option value="<?php echo $red['zanrID'] ?>"> <?php echo $red['nazivZanra'] ?></option>
          <?php  }
              ?>
      </select>
      <label for="sacuvajIgricu"></label>
      <input type="submit" name="sacuvajIgricu" class="form-control btn-primary" value="Sačuvaj igricu">
  </form>
  <h3><?php echo $porukaUspesnosti ?> </h3>
	</div>

    <div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h4>Adresa</h4>
					<p>
						Jove Ilića 154,<br/>
						011 3950800, <br/>
						Beograd, Srbija.
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

    <script>
    function header(){
      $.ajax({
        url: "header.php",
        success: function(html){
          $("#header").html(html);
        }
      })
    }
    </script>
    <script>
    header();
    </script>
  </body>
</html>

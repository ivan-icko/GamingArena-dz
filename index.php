<?php
 include 'konekcija.php';
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                <li><a href="">Dodaj novu igricu</a></li>
                <li><a href="">Upravljaj igricama</a></li>
            </ul>
            </div>
        </div>
    </div>

    <div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
					<img src="slike/logo.jpg" alt="pocetna" class="img img-circle">
                    <h1>U našem gaming centru očekuje Vas high level gameplay! Posetite nas svakog 
                      radnog dana od 10h do 01h u Vojvode Mišića 2 Loznica.</h1>
                    <p>Najbolje igrice za vas.</p>
				</div>
			</div>
	    </div>
    </div>

    <div class="container pt">
    <label for="pretraga">Pretraži igrice za odabrani žanr</label>
    <select id="pretraga" onchange="pretraga()" class="form-control">
      <?php
          $rez = $conn->query("SELECT * from zanr");
          while($red = $rez->fetch_assoc()){
            ?>
          <option value="<?php echo $red['zanrID'] ?>"> <?php echo $red['nazivZanra'] ?></option>
        <?php   }
            ?>
    </select>
    <div id="podaciPretraga"></div>
	</div>
    
    <div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h4>Adresa</h4>
					<p>
          Vojvode Mišića 2 Loznica,<br/>
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
    </div>
    
    
    <script>
    function pretraga(){
      $.ajax({
        url: "pretragaIgrica.php",
        data: {zanrID: $("#pretraga").val()},
        success: function(html){
          $("#podaciPretraga").html(html);
        }
      })
    }
    </script>
    <script>
        pretraga();
    </script>
</body>
</html>
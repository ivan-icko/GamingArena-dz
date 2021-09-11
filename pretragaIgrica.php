<?php
    include 'konekcija.php';
    include 'IgriceClass.php';
    if(isset($_GET['zanrID']))
    {
        $id = mysqli_real_escape_string($conn,$_GET['zanrID']);
        $niz = [];
        $rez = $conn->query("select * from igrica where zanrID=$id");

        while($red= $rez->fetch_assoc()):
            
        $igrice = new Igrica($red['idIgrice'],$red['nazivIgrice'],$red['verzijaIgrice'],$id);
        array_push($niz,$igrice);
        endwhile;
    ?>
    <table class="table table-hover">
    <thead>
        <tr>
            <th>Naziv igrice</th>
            <th>Verzija igrice</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($niz as $vrednost):
            ?>
                <tr>
                <td><?php echo $vrednost->nazivIgrice ?>  </td>
              <td><?php echo $vrednost->verzijaIgrice ?>  </td>
                </tr>
            <?php
        endforeach;
        ?>
    </tbody>
    </table>
    <?php

    }else{
    echo("Molimo vas da prosledite zanr za koji želite igrice.");
    }


 ?>
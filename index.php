<?php
session_start();
require 'funciones.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maxium-scale=1.0, minium-scale=1.0">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="assets/css/slider.css" rel="stylesheet" type="text/css" />

    <title>TecLag Games store</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link href="assets/css/main.css" rel="stylesheet">
  </head>

  <body bgcolor="#B1B7B1">


  <div id="contenedor_carga">
    <div id="carga"></div>
  </div>

  <div class="slider">
            <?php
                $ids = array(1,2,3,4,5);
                $alt = array(
                    "Slide 1",
                    "Slide 2",
                    "Slide 3",
                    "Slide 4",
                    "Slide 5"
                );
                $max = count($ids);
                for($s=0;$s<$max;$s++){ ?>
                    <input type="radio" id="<?= $ids[$s]; ?>" name="image-slide" hidden />
                <?php }
            ?>
            <div class="slideshow">
                <?php for($s=0;$s<$max;$s++){ ?>
                <div class="item-slide">
                    <img src="img/<?= $ids[$s]; ?>.jpg" alt="<?= $alt[$s]; ?>" />
                </div>
                <?php } ?>
            </div>
            <div class="pagination">
                <?php for($s=0;$s<$max;$s++){ ?>
                <label class="pag-item" for="<?= $ids[$s]; ?>">
                    <img src="img/<?= $ids[$s]; ?>.jpg" alt="<?= $alt[$s]; ?>" />
                </label>
                <?php } ?>
            </div>
        </div>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">TecLag Games Store</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li>
            <a href="carrito.php" class="btn">CARRITO <span class="badge"><?php print cantidadPeliculas(); ?></span></a>
            </li> 
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!--AQUI VAS TODO EL CONTENIDO SOBRE LOS PRODUCTOS A LA VISTA DEL CLIENTE-->
    <div class="container" id="main">
    <div class="row">
            <?php
              require 'vendor/autoload.php';
              $pelicula = new Kawschool\Pelicula;
              $info_peliculas = $pelicula->mostrar();
              $cantidad = count($info_peliculas);
              if($cantidad > 0){
                for($x =0; $x < $cantidad; $x++){
                  $item = $info_peliculas[$x];
            ?>
              <div class="col-md-3">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 cclass="text-center titulo-pelicula"><?php print $item['titulo'] ?></h4>  
                    </div>
                    <div class="panel-body">
                      <?php
                          $foto = 'upload/'.$item['foto'];
                          if(file_exists($foto)){
                        ?>
                          <img src="<?php print $foto; ?>" class="img-responsive">
                      <?php }else{?>
                        <img src="assets/imagenes/not-found.jpg" class="img-responsive">
                      <?php }?>
                    </div>
                    <div class="panel-footer">
                        <a href="carrito.php? id=<?php print $item['id'] ?>" class="btn btn-success btn-block">
                          <span class="glyphicon glyphicon-shopping-cart"></span> Comprar
                        </a>
                    </div>
                  </div>
              
              
              </div>
          <?php
                }
            }else{?>
              <h4>NO HAY REGISTROS</h4>

          <?php }?>




        </div>
    </div> <!-- /container -->

            
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
      window.onload = function(){
        var contenedor = document.getElementById('contenedor_carga');

        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = '0';
      }
    </script>

<center><b> <!--validaciones-->

<form method="post" name="formula" onSubmit="return comprueba()" action="../../index.php">
<input type="text" name="cCONTROL" id="cCONTROL"/>
<br />
<input type="text" name="cCONTRASENA" id="cCONTRASENA"/>
<br />
<input type="submit" value="enviar "/>
</form>

<script>
function comprueba()
{ 

//var re=/^\d+\d+\d+\d+\d+\d+\d+\d+/;
var re=/^[A-Z]{0,1}[0-9]{7,8}$/;
var re2= /^[a-zA-Z]{2}[0-9]{1,4}(lag)$/;

var cCONTROL=document.formula.cCONTROL.value;
var cCONTRASENA=document.formula.cCONTRASENA.value;

alert ("hola");
alert (cCONTROL);
alert (cCONTRASENA);


if ((re.test(document.getElementById("cCONTROL").value))
&&(re2.test(document.getElementById("cCONTRASENA").value)))
{ 
alert("Correcto");

}
else
{
alert("Error");
return false;


}


}

</script>
<!--validaciones arriba--></b></center>

      

  </body>
</html>

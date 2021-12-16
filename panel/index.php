
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

    <title>TecLag Game Store</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link href="assets/css/main.css" rel="stylesheet">
  </head>

  <body bgcolor="#B1B7B1">

  <!--validaciones-->
  

  

  <div id="contenedor_carga">
    <div id="carga"></div>
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
          <a class="navbar-brand" href="index.php">TecLag Game Store</a>
        </div>
       
      </div>
    </nav>

    

    <div class="container" id="main">
        <div class="main-login">
            <form action="login.php" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="text-center">ACCESOS AL PANEL</h3>
                    </div>
                    <div class="panel-body">
                        <p class="text-center">
                            <img src="../assets/imagenes/logo_tec.png" alt="">
                        </p>
                      <!-- AQUI ESTAN LOS CAMPOS A VALIDAR PAR LOS EXPRESIONES REGULARES-->
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" id = 'usuario' class="form-control"  name="nombre_usuario" placeholder="Usuario" required >
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id = 'password' class="form-control"  name="clave" placeholder="Password" required >
                        </div>

                        <div id = 'error'></div>
                      <!--fin de los campos par la validacion-->
                        <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
                        </div>
                </div>
            </form>
        </div>

    </div> <!-- /container -->

    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src= "../assets/js/app.js"></script>
    <script>
      window.onload = function(){
        var contenedor = document.getElementById('contenedor_carga');

        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = '0';
      }
    </script>
   <center> <b> <!--validaciones-->

<form method="post" name="formula" onSubmit="return comprueba()" action="../../index.php">
<input type="text" name="cCONTROL" id="cCONTROL"/>
<br />
<input type="text" name="cCONTRASENA" id="cCONTRASENA"/>
<br />
<input type="submit" value="enviar "/>
</form>

<th>Por favor escribe la palabra y la contraseña secreta en los cuadros de arriba</th>
<script>


function comprueba()
{ 

//var re=/^\d+\d+\d+\d+\d+\d+\d+\d+/;
var re= /^[a-zA-Z0-9]+([a-zA-z0-9](_|-| )[a-zA-Z0-9])*[a-zA-Z0-9]+$/     /*^[A-Z]{0,1}[0-9]{7,8}$/;*/
var re2= /^[a-zA-Z]{2}[0-9]{1,4}(lag)$/;

var cCONTROL=document.formula.cCONTROL.value;
var cCONTRASENA=document.formula.cCONTRASENA.value;

alert ("Espere por favor...");
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
<?php

//PRIMERO HAY QUE VALIDAR LAS SESSIONES EN PHP
session_start();
//session_start();
require 'funciones.php';

if( isset( $_GET[ 'id' ] ) && is_numeric( $_GET[ 'id' ] ) ){
    $id = $_GET['id'];
    require 'vendor/autoload.php';
    $pelicula = new Kawschool\Pelicula;
    $resultado = $pelicula->mostrarPorId( $id );

    var_dump( $resultado );//Validar la conexion a la base de datos

    if( !$resultado )
        header( 'Location: index.php' );

        if( isset( $_SESSION[ 'carrito' ] ) ){ ///AQUI VALIDAMOS QUE EL CARRITO SI EXISTE
            if( array_key_exists( $id, $_SESSION[ 'carrito' ] ) ){  //PARA SABER SI EL PRODUCTO EXISTE
                actualizarPeliculas( $id );
            }else{
                agregarPeliculas( $resultado, $id );//ESTE ES EL METODO PARA AGREGAR PELICULAS SI ESTE NO EXISTE EN EL CARRITO
            }

        }else{ ///SI EL CARRITO NO EXISTE
            agregarPeliculas( $resultado, $id );
        }

        /*print '<pre>';
        print_r( $_SESSION[ 'carrito' ] );
        die;*/
}    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TecLag Games store</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
  </head>

  <body>

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
              <a href="" class="btn">CARRITO <span class="badge"><?php print cantidadPeliculas(); ?></span></a>
            </li> 
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!--AQUI VAS TODO EL CONTENIDO SOBRE LOS PRODUCTOS A LA VISTA DEL CLIENTE-->
    <div class="container" id="main">
            <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Pelicula</th>
                      <th>Foto</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Total</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
                        $c=0;
                        foreach($_SESSION['carrito'] as $indice => $value){
                            $c++;
                            $total = $value['precio'] * $value['cantidad'];
                    ?>
                    <tr>
                        <form action="actualizar_carrito.php" method="post">
                            <td><?php print $c ?></td>
                            <td><?php print $value['titulo']  ?></td>
                            <td>
                                <?php
                                    $foto = 'upload/'.$value['foto'];
                                    if(file_exists($foto)){
                                    ?>
                                    <img src="<?php print $foto; ?>" width="35">
                                <?php }else{?>
                                    <img src="assets/imagenes/not-found.jpg" width="35">
                                <?php }?>
                            </td>
                            <td>$<?php print $value['precio']  ?> MXN</td>
                            <td>
                            <input type="hidden" name="id"  value="<?php print $value['id'] ?>">
                                <input type="text" name="cantidad" class="form-control u-size-100" value="<?php print $value['cantidad'] ?>">
                            </td>
                            <td>
                                $<?php print $total  ?> MXN
                            </td>
                            <td>
                                <button type="submit" class="btn btn-success btn-xs">
                                    <span class="glyphicon glyphicon-refresh"></span> 
                                </button>

                                <a href="eliminar_carrito.php?id=<?php print $value['id']  ?>" class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-trash"></span> 
                                </a>


                            </td>
                        </form>
                    </tr>

                <?php
                    }
                    }else{
                ?>
                    <tr>
                        <td colspan="7">NO HAY PRODUCTOS EN EL CARRITO</td>

                    </tr>
                <?php
                    }
                ?>
            </tbody>
                <tfoot>
                        <tr>
                            <td colspan="5" class="text-right">Total</td>
                            <td>$<?php print calcularTotal(); ?> MXN</td>
                            <td></td>
                        </tr>

                </tfoot>
            </table>
            <hr>
            <?php
                if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
            ?>  
            <div class="row">
                    <div class="pull-left">
                        <a href="index.php" class="btn btn-info">Seguir Comprando</a>
                    </div>
                    <div class="pull-right">
                        <a href="finalizar.php" class="btn btn-success">Finalizar Compra</a>
                    </div>
            </div>

            <?php
                }
            ?>

    </div> <!-- /container -->
    

<center><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" align="center">
<input type="hidden" name="cmd" value="_s-xclick"align="center">
<input type="hidden" name="hosted_button_id" value="MFBQS4YGBLQGN" align="center">
<input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" align="center" border="2" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
<img alt="" border="2" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="0" height="0" align="center">
</form></center>

            
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>

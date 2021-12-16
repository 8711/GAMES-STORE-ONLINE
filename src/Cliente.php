<?php

$cadena1 = "1234567";
$cadena2 = "abcdefg";
$patron = "/^[[:digit:]]+$/";

if (preg_match($patron, $cadena1)) {
    print "<p>La cadena $cadena1 son sólo números.</p>\n";
} else {
    print "<p>La cadena $cadena1 no son sólo números.</p>\n";
}

if (preg_match($patron, $cadena2)) {
    print "<p>La cadena $cadena2 son sólo números.</p>\n";
} else {
    print "<p>La cadena $cadena2 no son sólo números.</p>\n";
} 

namespace Kawschool;

class Cliente{

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;

        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
        
    }

    public function registrar($_params){
        $sql = "INSERT INTO `clientes`(`nombre`, `apellidos`, `email`, `telefono`, `comentario`) 
        VALUES (:nombre,:apellidos,:email,:telefono,:comentario)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre" => $_params['nombre'],
            ":apellidos" => $_params['apellidos'],
            ":email" => $_params['email'],
            ":telefono" => $_params['telefono'],
            ":comentario" => $_params['comentario']
        );

        if($resultado->execute($_array))
            return $this->cn->lastInsertId();

        return false;
    }


}
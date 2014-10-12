<?php
/**
 * Created by PhpStorm.
 * User: Migue
 * Date: 9/10/14
 * Time: 12:49 AM
 */
require("Login.php");
$login = new Login();
$login->brindarSeguridad();

/*$usuario_id=$_COOKIE['clave'];
$accesos=$_COOKIE['permisos'];
if($usuario_id=="" or $accesos=="")
{
    print"<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
}*/
/*session_start();
$usuario_id2=$_SESSION['clave'];
$acceso2=$_SESSION['permisos'];
if($usuario_id2=="" or $acceso2=="")
{
    print"<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
}*/


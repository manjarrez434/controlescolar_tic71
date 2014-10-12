<?php
require("security.php");
$nivelUsuario=$_SESSION['permisos'];
?>
<?php
require("header.php");
if($nivelUsuario == 1)//Administrador
{
    require("menu.php");
}
else
    if($nivelUsuario == 2)//Maestro
    {
        require("menu-maestro.php");
    }
/**
 * Created by PhpStorm.
 * User: Migue
 * Date: 29/09/14
 * Time: 07:41 PM
 */
require("Usuario.php");
$idmaestro=$_POST["combomaestro"];
require("Materia.php");
require("bd.php");

$materia = new Materia();
$materia->datosMaestro($idmaestro);
$materia->materiasAsignadas($idmaestro);
$materia->asignarMateriasMaestro($idmaestro);


?>
</body>
</html>

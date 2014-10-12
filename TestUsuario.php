<?php require_once("security.php");
$nivelUsuario=$_SESSION['permisos'];
?>
<?php
require ("Usuario.php");
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

?>
<div class="container theme-showcase" role="main">
    <form name='alumno' action='TestUsuario.php' method='POST'>
        <table class="table table-bordered">
        <tr>
            <td>Nombre(s):</td>
            <td><input type="text" name="nombre"></td>
        </tr>
        <tr>
            <td>Apellido Paterno:</td>
            <td><input type="text" name="app"></td>
        </tr>
        <tr>
             <td>Apellido Materno:</td>
             <td><input type="text" name="apm"></td>
        </tr>
        <tr>
            <td>Nivel:</td>
            <td><select name="nivel">
                    <option value="1">Administrador</option>
                    <option value="2">Maestro</option>
                    <option value="3">Alumno</option>
                    </select>
            </td>
        </tr>
        <tr><td colspan="2" align="center"><input type="submit" name="submit" class="btn btn-success" value="Agregar"></td></tr>
        <tr>
            <td>ID:<input type="text" name="ide" placeholder="Eliminar"></td>
            <td><input type="submit" name="submit" class="btn btn-danger" value="Eliminar"> </td>
        </tr>
        <tr>
                <td>ID:<input type="text" name="idm" placeholder="Modificar"></td>
                <td><input type="submit" name="submit" class="btn btn-warning" value="Modificar"> </td>
        </tr>
        <tr>
                <td>ID:<input type="text" name="idc" placeholder="Consultar"></td>
                <td><input type="submit" name="submit" class="btn btn-info" value="Consultar" required> </td>
        </tr>

        </table>
    </form>
</div>
</div>
<?php
require ("bd.php");
$usuario = new usuario;
//$usuario->readUsuarioG();

if(isset($_POST["submit"]))
{
    switch($_POST["submit"])
    {
        case "Agregar":
            $nombre=$_POST['nombre'];
            $app=$_POST['app'];
            $apm=$_POST['apm'];
            $usuario->createUsuario("$nombre","$app","$apm",$_POST['nivel']);

            break;
        case "Eliminar":
            $usuario->deleteUsuario("$_POST[ide]");

            break;
        case "Modificar":
            $nombre=$_POST['nombre'];
            $app=$_POST['app'];
            $apm=$_POST['apm'];
            $usuario->updateUsuario("$_POST[idm]","$nombre","$app","$apm",$_POST['nivel']);

            break;
        case "Consultar":

            $usuario->readUsuarioS("$_POST[idc]");

            break;
    }
unset($_REQUEST);
}
?>
</body>
</html>


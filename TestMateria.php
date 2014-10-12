<?php
require("security.php");
$nivelUsuario=$_SESSION['permisos'];
$claveUsuario=$_SESSION['clave'];
?>
<?php
require("header.php");
require("Materia.php");
require("bd.php");
$materia = new Materia();

/***********************************************************/
    if($nivelUsuario == 1)//Administrador
    {
        require("menu.php");
        if(isset($_REQUEST["maestro"]))
        {
            $id=$_REQUEST["maestro"];
        }
        else
        {
            $id = 0;
        }

        if(isset($_REQUEST["accion"]))
        {
            $accion = $_REQUEST["accion"];
        }
        else
        {
            $accion = 0;
        }

        if(isset($_REQUEST["materia"]))
        {
            $id_materia = $_REQUEST["materia"];
        }
        else
        {
            $id_materia = 0;
        }

        switch($accion){
            case 0:
                $materia->seleccionaMaestro($id);
                break;
            case 1:
                $materia->createMaestroMateria($id,$id_materia);
                $materia->seleccionaMaestro($id);
                break;
            case 2:
                $materia->deleteMaestroMateria($id_materia);
                $materia->seleccionaMaestro($id);
                break;
        }
    }
        else
    if($nivelUsuario == 2)//Maestro
    {
        require("menu-maestro.php");
        $materia->datosMaestro($claveUsuario);
        $materia->materiasAsignadasIndividual($claveUsuario);
    }
/************************************************************/


?>
</body>
</html>
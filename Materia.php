<?php
/**
 * Created by PhpStorm.
 * User: Migue
 * Date: 29/09/14
 * Time: 07:04 PM
 */
class Materia{

    public $id;
    public $nombre;
    public $avatar;
    public $orden;
    public $estatus;

    public function createMateria()
    {}

    public function deleteMateria()
    {}

    public function readMateriaG()
    {}

    public function readMateriaS()
    {}

    public function updateMateria()
    {}

    public function seleccionaMaestro()
    {

        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";
        $sql="SELECT Id,CONCAT(Nombre, ' ' ,ApellidoPaterno, ' ' ,ApellidoMaterno) AS ncompleto
                FROM usuario WHERE nivel = 2 AND Estatus = 1 ";
        $consulta=mysql_query($sql) or die ("Error en el metodo seleccionaMaestro".mysql_error());
        $registros=mysql_num_rows($consulta);
        echo"<form method='POST' action='ajax.php' id='frmdo' name='frmdo'>";
        echo"<tr><td>Maestro:</td><td>";
        echo"<select name='combomaestro' id='combomaestro'>";
        for($i=0;$i<$registros;$i++)
        {
            $Id=mysql_result($consulta,$i,'Id');
            $ncompleto=mysql_result($consulta,$i,'ncompleto');
            echo"<option value='$Id'>".utf8_decode($ncompleto)."</option>";

        }
        echo"</select><input type='submit' name='submit' value='Seleccionar'></td>";
        echo"</form>";
        echo"</table>";
        echo"</div>";
    }

    public function datosMaestro($id)
    {
        $sql="SELECT Id,CONCAT(Nombre, ' ' ,ApellidoPaterno, ' ' ,ApellidoMaterno) AS ncompleto
                FROM usuario WHERE Id = $id ";
        $consulta=mysql_query($sql) or die ("Error al mostrar maestro".mysql_error());
        //$id=mysql_result($consulta,0,'Id');
        $ncompleto=mysql_result($consulta,0,'ncompleto');
        echo"<h3>Maestro:</h3> <h2>$ncompleto</h2>";

    }

    public function materiasAsignadas($idmaestro)
     {
        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";

        $sql="SELECT mm.id AS clave,mm.id_materia AS idm,m.nombre FROM maestro_materia AS mm,materia AS m WHERE id_maestro = $idmaestro
                AND mm.id_materia = m.id";
        $consulta=mysql_query($sql);
        $registros=mysql_num_rows($consulta);
        echo"<tr><td>Materias</td><td>Eliminar</td></tr>";
        for($i=0;$i<$registros;$i++)
        {
        $id=mysql_result($consulta,$i,'idm');
            $clave=mysql_result($consulta,$i,'clave');
        $materia=mysql_result($consulta,$i,'m.nombre');
            echo'<tr><td>'.utf8_decode($materia).'</td>
            <td><a href="TestMateria.php?maestro='.$id.'&accion=2&materia='.$clave.'">Borrar</a></td></tr>';

        }
        echo"</table>";
        echo"</div>";
    }

    public function asignarMateriasMaestro($id_maestro)
    {
        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";
        echo"<form action='TestMateria.php' method='POST' id='idmaterias'>";
           echo"<tr><td>Materia:</td><td><select name='materia' id='materia'>";
        $sql="SELECT * FROM materia WHERE estatus = 1 ORDER BY nombre ASC";
        $consulta=mysql_query($sql) or die ("error sql1");
        while($field=mysql_fetch_array($consulta))
        {
            $id_materia=$field["id"];
            $opcion=utf8_decode($field["nombre"]);
            $sql2="SELECT * FROM maestro_materia WHERE id_maestro = $id_maestro AND id_materia = $id_materia";
            $consulta2=mysql_query($sql2) or die ("error sql1");
            $registros = mysql_num_rows($consulta2);
            if ($registros > 0)
            {
                echo"<option value='0'>No Disponible</option>";
            }
            else
            {
                echo"<option value='$id_materia'>".$opcion."</option>";
            }
        }
        echo"</select></td></tr>";
            echo"<input type='hidden' id='accion' name='accion' value='1'>";
            echo"<input type='hidden' id='maestro' name='maestro' value='$id_maestro'>";
           echo"<tr><td><input type='submit' value='Agregar'></td></tr>";
            echo"</form>";
            echo"</table>";
            echo"</div>";

    }

    public function createMaestroMateria($id,$id_materia){
        $sql="INSERT INTO maestro_materia(id_maestro,id_materia) VALUES ('$id','$id_materia')";
        $queryCreate=mysql_query($sql) or die ("Error createMaestroMateria".mysql_error());
    }

    public function deleteMaestroMateria($id_materia){
        //$sql="DELETE FROM maestro_materia WHERE id_maestro='$id' and id_materia='$id_materia'";
        $sql="DELETE FROM maestro_materia WHERE id=$id_materia";
        $queryDelete=mysql_query($sql) or die ("Error deleteMaestroMateria".mysql_error());
        echo"<input type='hidden' id='accion' name='accion' value='2'>";
    }

    public function materiasAsignadasIndividual($idmaestro)
    {
        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";

        $sql="SELECT mm.id AS clave,mm.id_materia AS idm,m.nombre FROM maestro_materia AS mm,materia AS m WHERE id_maestro = $idmaestro
                AND mm.id_materia = m.id";
        $consulta=mysql_query($sql);
        $registros=mysql_num_rows($consulta);
        echo"<tr><td>Materias</td></tr>";
        for($i=0;$i<$registros;$i++)
        {
            $id=mysql_result($consulta,$i,'idm');
            $clave=mysql_result($consulta,$i,'clave');
            $materia=mysql_result($consulta,$i,'m.nombre');
            echo'<tr><td>'.utf8_decode($materia).'</td></tr>';

        }
        echo"</table>";
        echo"</div>";
    }

}
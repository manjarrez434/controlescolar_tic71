
<?php
//require("menu.php");
?>
<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 18/09/14
 * Time: 07:47 PM
 */
class Usuario {
    private $Id;
    private $Nombre;
    private $ApellidoPaterno;
    private $ApellidoMaterno;
    private $Telefono;
    private $Calle;
    private $NumeroExterior;
    private $NumeroInterior;
    private $Colonia;
    private $Municipio;
    private $Estado;
    private $CP;
    private $Correo;
    private $Usuario;
    private $Contrasena;
    private $Nivel;
    private $Estatus;


    public function createUsuario($nombre,$apellidop,$apellidom,$nivel){
        $Insert="INSERT INTO usuario(Nombre,ApellidoPaterno,ApellidoMaterno,Nivel,Estatus) VALUES('$nombre','$apellidop','$apellidom','$nivel',1)";
        $queryInsert=mysql_query($Insert) or die ("Error al generar la inserción".mysql_error());
        echo"<div class='alert alert-success' role='alert'>Se insertó correctamente</div>";
    }
    public function deleteUsuario($id){
        $Delete="DELETE FROM usuario WHERE Id = $id";
        $queryDelete=mysql_query($Delete) or die ("Error al eliminar registro".mysql_error());
        //$afectados=mysql_affected_rows($queryDelete);
        echo"<div class='alert alert-success' role='alert'>Se eliminó correctamente </div>";


    }
    public function updateUsuario($id,$nombre,$apellidop,$apellidom,$nivel){
        $Update="UPDATE usuario SET Nombre='$nombre',ApellidoPaterno='$apellidop',ApellidoMaterno='$apellidom',Nivel='$nivel'
                  WHERE Id = $id";
        $queryUpdate=mysql_query($Update) or die ("Error al modificar".mysql_error());
        echo"<div class='alert alert-success' role='alert'>Se modificó correctamente</div>";
    }
    public function readUsuarioS($id){
        if($id == "")
        {
            $sql01 = "SELECT * FROM usuario ORDER BY ApellidoPaterno ASC";
        }
        else{
            $sql01 = "SELECT * FROM usuario WHERE Id=$id ORDER BY ApellidoPaterno ASC";
        }
        $result01 = mysql_query($sql01) or die ("Error $sql01") ;
        $registros=mysql_num_rows($result01);
        if($registros != 0)
        {
            echo"<div class=table-responsive>";
            echo"<table class=\"table table-striped\">";
            echo"<tr><td colspan='5' align='center'><strong>CONSULTA USUARIO ESPECIFICO</strong></td></tr>";
            echo"<tr><td>ID</td><td>NOMBRE</td><td>A PATERNO</td><td>A MATERNO</td><td>ESTATUS</td></tr>";
            while($field = mysql_fetch_array($result01)){
                $this->Id = $field['Id'];
                $this->Nombre = $field['Nombre'];
                $this->ApellidoPaterno = $field['ApellidoPaterno'];
                $this->ApellidoMaterno = $field['ApellidoMaterno'];
                $this->Nivel = $field['Nivel'];
                switch($this->Nivel){
                    case 1:
                        $type ="Administrador";
                        break;
                    case 2:
                        $type ="Maestro";
                        break;
                    case 3;
                        $type ="Alumno";
                        break;
                }
                echo"<tr><td>$this->Id</td><td>$this->Nombre</td><td>$this->ApellidoPaterno</td><td>$this->ApellidoMaterno</td><td>$this->Nivel</td></tr>";
            }

            echo"</table>";
            echo"</div>";
        }
        else
        {
            echo'<div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <strong>Disculpa!</strong>No se han encontrado registros, intenta de nuevo.
            </div>';
        }
    }
    public function readUsuarioG(){
        $sql01 = "SELECT * FROM usuario WHERE Estatus=1 ORDER BY ApellidoPaterno ASC";
        $result01 = mysql_query($sql01) or die ("Error $sql01") ;

        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";
        echo"<tr><td colspan='5' align='center'><strong>Lista de usuario</strong></td></tr>";
        echo"<tr><td>ID</td><td>NOMBRE</td><td>A PATERNO</td><td>A MATERNO</td><td>ESTATUS</td></tr>";
        while($field = mysql_fetch_array($result01)){
            $this->Id = $field['Id'];
            $this->Nombre = $field['Nombre'];
            $this->ApellidoPaterno = $field['ApellidoPaterno'];
            $this->ApellidoMaterno = $field['ApellidoPaterno'];
            $this->Nivel = $field['Nivel'];
            switch($this->Nivel){
                case 1:
                    $type ="Administrador";
                    break;
                case 2:
                    $type ="Maestro";
                    break;
                case 3;
                    $type ="Alumno";
                    break;
            }
            echo"<tr><td>$this->Id</td><td>$this->Nombre</td><td>$this->ApellidoPaterno</td><td>$this->ApellidoMaterno</td><td>$this->Nivel</td></tr>";
        }
        echo"</table>";
        echo"</div>";
    }
}
?>


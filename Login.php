<?php
/**
 * Created by PhpStorm.
 * User: Migue
 * Date: 7/10/14
 * Time: 12:10 PM
 */
class Login{
    private $user;
    private $password;
    private $status;

    public function validarUsuario($getuser,$getpassword)
    {
        $getuser=mysql_escape_string($getuser);
        $getpassword=mysql_escape_string($getpassword);
        $sql="CALL validateLogin('$getuser','$getpassword')";
        $consulta=mysql_query($sql) or die ("Error al validar informacion");
        $registros=mysql_num_rows($consulta);
        if($registros > 0)
        {

            $Estatus=mysql_result($consulta,0,'Estatus');
            if($Estatus != 0)
            {
                $Id=mysql_result($consulta,0,'Id');
                $Nivel=mysql_result($consulta,0,'Nivel');
                //echo"Acceso permitido";
                echo"<form method=POST action=permitir.php name=frm>";
                echo"<input type=hidden name='_usuarioid' value=$Id>";
                echo"<input type=hidden name='_usuarionivel' value=$Nivel>";
                echo"</form>";
                echo"<script language='JavaScript'>document.frm.submit();</script>";
            }
            else
            {
                echo'<div class="alert alert-warning" role="alert">Usuario inactivo. Consultar a su administrador</div>';

            }
        }
        else
        {
            echo'<div class="alert alert-danger" role="alert">Usuario inexistente</div>';

        }
    }

    public function mostrarFormulario()
    {
        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";
        echo"<form  id=frmdo name=frmdo>";
        echo"<tr><td>Usuario:</td><td><input type=text name=usuario></td>";
        echo"<tr><td>Contraseña:</td><td><input type=password name=password></td>";
        echo"<tr><td colspan=2 align='center'>
                <input type=submit name=Entrar value=Entrar id=Entrar class='btn btn-success'>
         </td></tr>";
        echo"</table>";
        echo"</div>";
        echo"</form>";
        echo"<div id=ajax></div>";
		echo'<script type="text/javascript">
    $(function(){
        $("#Entrar").click(function(){
            $.ajax({
                type: "POST",
                url: "valida.php",
                data: $("#frmdo").serialize(),
                success: function(data)
                {
                    $("#ajax").html(data);

                }
            });
            return false;
        });
    });
</script>';
    }

    public function permitirAcceso()
    {
        unset($_GET);
        if($_POST)
        {
            $usuarioid=$_POST["_usuarioid"];
            $usuarionivel=$_POST["_usuarionivel"];
            /*setCookie ('clave',$usuarioid);
            setCookie ('permisos',$usuarionivel);*/
            session_start();
            $_SESSION['clave']=$usuarioid;
            $_SESSION['permisos']=$usuarionivel;
            if(($usuarioid!="") and ($usuarionivel==1) )
            {print"<meta http-equiv='refresh' content='0; url=TestUsuario.php'>";}
            else
                if(($usuarioid!="") and ($usuarionivel==2) )
                {print"<meta http-equiv='refresh' content='0; url=TestMateria.php'>";}
                else
            {print "<meta http-equiv='refresh' content='0; url=index.php'>";}
        }
    }

    public function brindarSeguridad()
    {
        /*$usuario_id=$_COOKIE['clave'];
        $accesos=$_COOKIE['permisos'];
        if($usuario_id=="" or $accesos=="")
        {
            print"<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }*/
        session_start();
        $usuario_id2=$_SESSION['clave'];
        $acceso2=$_SESSION['permisos'];
        if($usuario_id2=="" or $acceso2=="")
        {
            print"<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }
    }
}
?>

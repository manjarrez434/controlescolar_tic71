<?php
/**
 * Created by PhpStorm.
 * User: Migue
 * Date: 7/10/14
 * Time: 12:18 PM
 */
require("header.php");
//require 'bd.php';
require 'Login.php';
echo'<blockquote>
  <p>CONTROL ESCOLAR</p>
  <footer>Miguel Ángel Manjarrez - TIC 71</footer>
</blockquote>';
$login = new Login();
$login->mostrarFormulario();

?>




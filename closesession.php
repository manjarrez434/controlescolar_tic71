<?php
/**
 * Created by PhpStorm.
 * User: Migue
 * Date: 9/10/14
 * Time: 11:17 AM
 */
session_start();
session_unset();
session_destroy();
print"<meta http-equiv='refresh' content='0;url=index.php'>";
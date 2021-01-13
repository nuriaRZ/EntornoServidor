<?php
setcookie(session_name(), "", time()-3600, "/");
session_unset();
session_destroy();
header('Location: login.php');

?>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


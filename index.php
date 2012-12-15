<?php

require_once('resources/config.php');

require_once(LIBRARY_PATH.'/templatesFunctions.php');

$template = $_GET['errorlogin'];

$variables = seleccionTemplate($template);

cargaTemplateConContentFile('home.php', $variables);

?>

    <?php
    /*
    Array con los datos de configuración. 
    */
    $config = array(
    "dbname" => "c214eklegein",
    "username" => "c214eklegein",
    "password" => "mont999666",
    "host" => "ispmysql1",
    "baseUrl" => "http://eklegein.net",
    "resources" => "/path/to/resources",
    "content" => $_SERVER["DOCUMENT_ROOT"]."/imges/content",
    "layout" => $_SERVER["DOCUMENT_ROOT"]."/imges/layout"
    );
    /*
    Hacemos la conexión
    */
    $link = mysql_connect($config['host'],$config['username'],$config['password'])or die(mysql_error());
    mysql_select_db($config['dbname'],$link);
    /*
    Iniciamos las sesiones
    */
    session_start();
    /*
    Definimos constantes para las rutas más utilizadas.
    */
    defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));

    defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));
    /*
    Error reporting.
    */
    ini_set("error_reporting", "true");
    error_reporting(E_ALL|E_STRCT);

    ?>
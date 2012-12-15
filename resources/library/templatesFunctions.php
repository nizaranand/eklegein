<?php
/*
*Cargamos el fichero de configuración
*/
require_once(realpath(dirname(__FILE__).'/../config.php'));
/*
*Creamos la función que cargará el fichero. 
*/
function cargaTemplateConContentFile($contentFile, $variables = array()){
    /*
    * Cargamos el template que necesitamos.
    */
    $contentFileFullPath = TEMPLATES_PATH.'/'.$contentFile;
    /*
    * 
    */
    if(count($variables)>0){
        foreach ($variables as $key => $value) {
            if(strlen($key)>0){
                ${$key} = $value;
            }
        }
    }
    require_once(TEMPLATES_PATH.'/cabecera.php');
    /*
    * Cargamos el cuerpo. 
    */
    if(file_exists($contentFileFullPath)){
        require_once($contentFileFullPath);
    }else{
        require_once(TEMPLATES_PATH.'/error.php');
    }
    /*
    * Cargamos el pie. 
    */
    require_once(TEMPLATES_PATH.'/pie.php');
}

function seleccionTemplate($plantilla){
    
    if(empty($plantilla)){
        $CuerpoLogin = 'CuerpoLogin.php';
    }

    if($plantilla == 'CuerpoLoginFallo.php'){
        $CuerpoLogin = $plantilla;
    }

    if($plantilla == 'CuerpoMail.php'){
        $CuerpoLogin = $plantilla;
    }

    if($plantilla == 'CuerpoRegistroFallo.php'){
        $CuerpoLogin = $plantilla;
    }

    $setInIndexDotPhp = "require_once(TEMPLATES_PATH.'/$CuerpoLogin');";

    $variables = array(
        'setInIndexDotPhp' => $setInIndexDotPhp,
        'setHeader' => $setHearde,
        'setBody' => $setBody,
        'setFooter' => $setFooter
    );
    return $variables;
}
?>

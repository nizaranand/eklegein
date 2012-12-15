<!DOCTYPE html>
<?php
require_once('resources/config.php');
require_once(LIBRARY_PATH.'/mysql.php');
 if($_POST){
    $usuario = $_POST['user'];
    $clau = $_POST['pass'];
    $ControlInsert = 0;
    //comprovamos que ha introducido el usuarios i la contraseña
    if(empty($usuario)){
  //Esta variable '$ControlInsert' controla si hemos dejado el sitio en blanco y avisa que no debemos iniciar la busqueda en la bbdd
        $ControlInsert = 1;
    }
    if(empty($clau)) {
        $ControlInsert = 1;
    }
  //iniciamos la busqueda en la bbdd para saber si existe el usuario
    $datos = new MySql(); 
    //$sql = mysql_query("SELECT * FROM usuaris where nickname = '".$usuario."' and pass = '".$clau."'");
    $sql1 = "SELECT * FROM usuaris where nickname = '".$usuario."' and pass = '".$clau."'";
    $sql = $datos->consulta($sql1);
    $row = mysql_fetch_assoc($sql);
    if($link){
        if($ControlInsert == 0){
            if($usuario == $row['nickname'] && $clau == $row['pass']){  
                $_SESSION['nick'] = $usuario;
                //$error_login->fallo_user_pass = 0;
                if($row['numeroentrada'] == 0){ 
                    header('Location: http://www.eklegein.net/generico.php');
                    }else{
                        header('Location: http://www.eklegein.net/afinidad.php');
                        }
            }else{
                header('Location: http://www.eklegein.net/index.php?errorlogin=CuerpoLoginFallo.php');
                }
         }else{
            header('Location: http://www.eklegein.net/index.php?errorlogin=CuerpoLoginFallo.php');
            } 
        }else{
                echo 'Conexion NOK';
            }
    }
?>

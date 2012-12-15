<!DOCTYPE html>
        <form action="login.php" class="formulario" method="post">
              <a class="letras_formulario">nickname</a>
              <input type="text" class="login" name="user"><br><br><br>
              <a class="letras_formulario">password</a>
              <input type="password" class="login" name="pass"><br><br>
              <br><a class="olvidar_password" href="http://www.eklegein.net/index.php?errorlogin=CuerpoMail.php">Has olvidado la password</a>
              <div id="aceptar">
                 <div class="fallo_user_pass">
                     <a class="equis">X</a>
                     <a class="mensaje_error">Hay un error en el nickname o password</a>
                    <input class="clik" type="submit" value="Aceptar">    
                 </div>
              </div>
        </form>
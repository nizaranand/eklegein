<?php
/**
 * Description of final
 *
 * @author David
 */
class ResultadoFinal {
    
  var $conexion1; 
  var $DesFinal;
  var $EFinal;
  var $GenFinal;

  public function ResultadoFinal(){ 
    if(!isset($this->conexion1)){
      $this->conexion1 = (mysql_connect("ispmysql1","c214eklegein","mont999666"))
        or die(mysql_error());
      mysql_select_db("c214eklegein",$this->conexion1) or die(mysql_error());
    }
  } 
    public function FinalGen($tagN,$tagT)
    {
        $sql = mysql_query("select * from tags where titulo = '".$tagT."'and nick = '".$tagN."'",$this->conexion1);
        $row = mysql_fetch_assoc($sql);
        $GenResult = $row['genResult'];
        $this->GenFinal = $GenResult; 
    }
 
     public function FinalEsp($espResult)
    {
        foreach($espResult as $key => $espFinal){
            if($key == 'espe1'){
               $this->EFinal = $espFinal; 
            }else{
               $this->EFinal = $this->EFinal - $espFinal; 
            }
        }
    }
    
    
    public function FinalDes($tagN,$tagT)
    {
        $sql = mysql_query("select * from tags where titulo = '".$tagT."' and nick = '".$tagN."'",$this->conexion1);
        $row = mysql_fetch_assoc($sql);
        $Des1Result = $row['des1Result'];
        $Des2Result = $row['des2Result'];
        $Des3Result = $row['des3Result'];
        $Des4Result = $row['des4Result'];
        $Des5Result = $row['des5Result'];
        $Des6Result = $row['des6Result'];
        $Des7Result = $row['des7Result'];
        $this->DesFinal = $Des1Result - $Des2Result - $Des3Result - $Des4Result - $Des5Result - $Des6Result - $Des7Result;
  
    }
}
?>

<?php
class MySQL{

  private $conexion; 
  private $total_consultas;
  var $suma = array();
  var $resultado = 0;
  var $DesFinal;
  var $EspFinal;
  var $GenFinal;
  var $contador = 0;

  public function MySQL(){ 
    if(!isset($this->conexion)){
      $this->conexion = (mysql_connect("ispmysql1","c214eklegein","mont999666"))
        or die(mysql_error());
      mysql_select_db("c214eklegein",$this->conexion) or die(mysql_error());
    }
  }
  
   public function resta($tag)
    {
        $contador = 1;
        $longitud = strlen($tag); 
        if($longitud >= 8){
            $longitud = 8;
        }
        for($i = 0; $i < $longitud; ++$i){
        $caracter = $tag[$i];  
        $sql = mysql_query("select * from abcd_esp where letra = '".$caracter."'",$this->conexion);
        $row = mysql_fetch_assoc($sql);
        $this->suma[$i] = $row['valor'];
        }
        $this->resultado = $this->suma[0];
        while($contador != $longitud)
        {
            $this->resultado = $this->resultado - $this->suma[$contador];
            $contador++;
        }
        return $this->resultado;
        
    }
 public function consulta($consulta){ 
    $this->total_consultas++; 
    $resultado = mysql_query($consulta,$this->conexion);
    if(!$resultado){ 
      echo 'MySQL Error: ' . mysql_error();
      exit;
    }
    return $resultado;
  }

  public function fetch_array($consulta){
   return mysql_fetch_array($consulta);
  }

  public function num_rows($consulta){
   return mysql_num_rows($consulta);
  }

  public function getTotalConsultas(){
   return $this->total_consultas; 
  }
  
  public function palabra($tag,$id_tag){
        $busca = "select * from palabras_numero where tag = '".$tag."'";
        $sql = mysql_query($busca,$this->conexion);
        $row1 = mysql_fetch_assoc($sql);
        $row2 = mysql_num_rows($sql);
        if($row2>0){
            $this->contador = $row1['impactos'];
            $this->contador++;
              $actualiza = "update palabras_numero set impactos = '".$this->contador."' where tag = '".$row1['tag']."'";
              mysql_query($actualiza,$this->conexion);

        }else{
              $inserta = "insert into palabras_numero (tag,impactos,id_tag) value ('$tag','$this->contador','$id_tag')";
              $inserat2 = mysql_query($inserta,$this->conexion);

        }
    }
  public function relacion($tag,$tipo_tag,$trabajo,$nick,$id_tag){
    $busca = "select * from relacion_trabajos where tag = '".$tag."' and trabajo = '".$trabajo."'";
    $sql = mysql_query($busca,$this->conexion);
    $row1 = mysql_fetch_assoc($sql);
    $row2 = mysql_num_rows($sql);
    if($row2<0){
          $inserta = "insert into relacion_trabajos (tag,tipo_tag,trabajo,nick,id_tag) value ('$tag','$tipo_tag','$trabajo','$nick','$id_tag')";
          $inserat2 = mysql_query($inserta,$this->conexion);
        }
    }
}

?>


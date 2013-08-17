<?php

function ver($array){
echo "<pre>";
print_r($array);
echo "</pre>";

}
//1)array con los datos necesarios
//2) titulo que se desplegara en el drop
//3) valor de cada opcion del dropdown
//$tipo de drop idetica si sera drop multple o sencillo
//$arrelo d svn 
function get_dropdown($name, $arreglo,$titulo,$value,$texto_inicio,$tipo_drop=null,$arreglo_s_n=null){
if($texto_inicio != ""){
array_unshift($arreglo, array($value=>0, $titulo=>$texto_inicio));	
}

if($tipo_drop==2){
	if($arreglo_s_n==1){
$drop="<select multiple id=".$name." name=".$name."[] style='width:100%; height:52px;'>";
   }else{
$drop="<select multiple id=".$name." name=".$name." style='width:100%; height:52px;'>";

   }
}else{
if($arreglo_s_n!=""){
$drop="<select multiple id=".$name." name=".$name."[] style='width:100%; height:52px;'>";
}else{
$drop="<select  id=".$name." name=".$name." style='width:100%; height:42px;'>";
}
}
foreach($arreglo as $arr){

$drop.="<option value=".$arr[$value].">".$arr[$titulo]."</option>";

                         }
$drop.= "</select>";
return $drop; 

   }




?>

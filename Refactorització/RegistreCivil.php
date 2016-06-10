<?php
include_once 'dades.php';
include_once 'Util.php';
include_once 'RegPersones.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function splitear($pilot,$simbolo){
        $pit[] = explode($simbolo, $pilot);
        return $pit[];
    }
    
function tointeger($text){
    $integerData = (int) $text;
    return $integerData;
}

function createPersonas(){
    $personas = array(count(dades.personas));
        for($i = 0;$i<count(dades.personas);$i++){
            $p = dades.personas[i];
            $ps[] = splitear($p,":");
            $Persona = new Persona($ps[0],Util.parseDate($ps[1]),tointeger($ps[2]),$ps[3]);
            $personas.add($Persona);
        }
        return $personas;
}

/*
* Esta funcion se encarga de añadir las personas en registro civil
*/
    function addPersonas($personas){
        $reg_civil = new RegPersones();
        for($i=0;i<count($personas);$i++){
            $p = $personas.get($i);
            $reg_civil.add_persona($p);
        }
      return $reg_civil;
    }
    
/*
* Esta funcion se encarga de asignar los padres
*/
function AsignParents($personas,$indice,$pare,$mare){
    $per = $personas.get($indice);
    $per.setPare($pare);
    $per.setMare($mare);
}

/*
* Esta funcion se encarga de gestrionar el casamiento
*/
    
function SetMarry($reg_civil,$personas,$p1,$p2,$data,$reg_matrimonis){
    //Canvia el estat de les persones
    if($reg_civil.casar($personas.get($p1),$personas.get($p2),$data)){
        //Registrem el matrimoni
        $reg_matrimonis.addPareja(new Matrimoni($personas.get($p1),$personas.get($p2),Util.parseDate($data)));
    } 
}

/*
* Esta Function gestiona los divorcios
*/
function SetDivorce($reg_matrimonis,$personas,$index,$data){
    $mat;
    $mat = $reg_matrimonis.get($personas.get($index));
    if($mat != null){
        //Canviem l'estat a separat
        $mat.home.setEstat_civil(3);
        $mat.dona.setEstat_civil(3);
        //Assignem la dat de finalització del matrimoni
        $mat.$data_final = Util.parseDate($data);
    }
}

/*
* Esta funcion que gestiona las muertes de las personas
*/
function SetDead($reg_matrimonis,$personas,$index,$data){
    $mat;
    $persona = $personas.get($index);
    $persona.setEstat_civil(0);
    //Si està casat canviar l'estat del conjugue a vidu/a
    $mat = $reg_matrimonis.get($personas.get($index));
    if($mat != null){
        //Canviem l'estat a vidu/a
        if($mat.home.getDni().equals($personas.get($index).getDni())){
            $mat.home.setEstat_civil(0); //Difunt
            $mat.dona.setEstat_civil(0);//Vidu
            $mat.home.setData_defuncio(Util.parseDate($data));
        }else{
            $mat.dona.setEstat_civil(0); //Difunt
            $mat.home.setEstat_civil(4);//Vidu
            $mat.dona.setData_defuncio(Util.parseDate($data));
        }
        //Assignem la dat de finalització del matrimoni
        $mat.$data_final = Util.parseDate($data);
    }

}

/*
* Esta funcion gestiona de listar las lista de personas y matrimoño
*/
function toList($reg_matrimonis,$reg_civil){
    //llistat de les persones
    echo "LLISTAT PERSONES\n===================";
    echo reg_civil.llistat();

    //Llistat dels matrimonis
    echo "LLISTAT MATRIMONIS\n===================";
    foreach($reg_matrimonis.getRegistre() as $un){
        echo $un;
    }

}

//crear personas
$persona = createPersonas();

//añadir personas
$reg_civil = addPersonas($personas);

//asignar a los padres
AsignParents($personas,7,"1","2");
AsignParents($personas,8,"3","4");

//casar las personas
$reg_matrimonis = new RegMatrimonis();

//Casar personas
SetMarry($reg_civil,$personas,1,1,"12/2/2013",$reg_matrimonis);
SetMarry($reg_civil,$personas,3,4,"18/5/1951",$reg_matrimonis);
SetMarry($reg_civil,$personas,5,6,"14/7/1992",$reg_matrimonis);
SetMarry($reg_civil,$personas,7,8,"14/7/1992",$reg_matrimonis);

//Divorciar personas
SetDivorce($reg_matrimonis,$personas,3,"4/4/2005");
        
//Establecer las personas como muertas
SetDead($reg_matrimonis,$personas,3,"14/5/2013");
        
//llamamos la funcion listar a las personas y matrimoni
toList($reg_matrimonis,$reg_civil);
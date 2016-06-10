<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegPersones
 *
 * @author daw2
 */
class RegPersones {
    //put your code here
    public $registre = array();

    function RegPersones() {
        $this->registre = $resgistre;
    }
    
    function llistat(){
        $sb;
        foreach($registre as $una){
            $sb.append($una.toString()).append("\n");
        }
        return sb.toString();
    }
    
    function add_persona($per){
        $registre.add($per);
    }

   function casar($persona,$persona2,$data) {
        if($persona.getEdat(Util.parseDate($data)) >= 18 && ($persona.getEstat_civil() == 1 || $persona.getEstat_civil() == 3)
                && $persona2.getEdat(Util.parseDate($data)) >= 18 && ($persona2.getEstat_civil() == 1 || $persona2.getEstat_civil() == 3)){
            $persona.setEstat_civil(2);
            $persona2.setEstat_civil(2);
            
            return true;
        }
        return false;
    }
}

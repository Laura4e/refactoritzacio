<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegMatrimonis
 *
 * @author daw2
 */
class RegMatrimonis {
    //put your code here
    private $registre;

    function RegMatrimonis() {
        $registre = array();
    }

    function get($persona) {
        foreach($registre as $mat){
            if($mat.dona.getDni().equals($persona.getDni()) || $mat.home.getDni().equals($persona.getDni()))
                return $mat;
        }
        return null;
    }
    function addPareja($obj ){
        $registre.add($obj);
    }

    function getRegistre() {
        return $registre;
    }

    function setRegistre($registre) {
        $this->registre = $registre;
    }
}

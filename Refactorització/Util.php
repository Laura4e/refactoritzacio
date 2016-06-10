<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Util
 *
 * @author daw2
 */
class Util {
    //put your code here
    function parseDate($unDia){
        $date = new DateTime($unDia);
        $date->format('dd/MM/yyyy');
        
        return $date;
    }
    
    function dateToString($dia){ 
        $date = new DateTime($dia);
        $date->format('dd/MM/yyyy');
        
        return $date;
    }
    
}

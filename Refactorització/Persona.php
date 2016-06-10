<?php
include_once 'Util.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Persona
 *
 * @author daw2
 */
class Persona {
    //put your code here
    private $nom;
    private $data_naixement;
    private $data_defuncio;
    private $estat_civil;
    private $dni;
    private $pare;
    private $mare;
    
    function __construct($nom, $estat_civil, $dni) {
        $this->nom = $nom;
        $this->estat_civil = $estat_civil;
        $this->dni = $dni;
        $this->data_defuncio = null;
    }
    
    function toString(){
        $defuncio;
        $defuncio = ", Defunció: " +Util.dateToString($data_defuncio);
      
        return"nom: " + nom + ", Naixement: " + Util.dateToString(data_naixement) + ", Estat: " + estat_civil + ", dni: " + dni + ", Pare:" + pare + ", Mare:" + mare + defuncio ;
    }
    
    function getNom() {
        return $this->nom;
    }

    function getData_naixement() {
        return $this->data_naixement;
    }

    function getData_defuncio() {
        return $this->data_defuncio;
    }

    function getEstat_civil() {
        return $this->estat_civil;
    }

    function getDni() {
        return $this->dni;
    }

    function getPare() {
        return $this->pare;
    }

    function getMare() {
        return $this->mare;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setData_naixement($data_naixement) {
        $this->data_naixement = $data_naixement;
    }

    function setData_defuncio($data_defuncio) {
        $this->data_defuncio = $data_defuncio;
    }

    function setEstat_civil($estat_civil) {
        $this->estat_civil = $estat_civil;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setPare($pare) {
        $this->pare = $pare;
    }

    function setMare($mare) {
        $this->mare = $mare;
    }


    
    

}

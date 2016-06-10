<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Matrimoni
 *
 * @author daw2
 */
class Matrimoni {
    //put your code here
    public $home;
    public $dona;
    public $data_inici;
    public $data_final;

    function Matrimoni($home,$dona,$data_inici) {
        $this->home = $home;
        $this->dona = $dona;
        $this->data_inici = $data_inici;
    }

    function toString() {
        $dat_inici = "";
        $dat_final = "";
        
        return "Matrimoni\n       1r Conjugue:" + home + "\n       2n Conjugue" + dona + ", Inici: " + dat_inici +", Final: " + dat_final;
    }
}

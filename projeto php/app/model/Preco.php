<?php

class Preco{
    private $id;
    private $preco;


    function getId(){
        return $this->$id;
    }
    function getPrecos(){
        return $this->$preco;
    }


    function setId($id) {
        $this->id = $id;
    }
    function setPrecos($preco) {
        $this->preco = $preco;
    }

}
?>
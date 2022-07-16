<?php

class Produto{
    private $idprod;
    private $nome;
    private $cor;
    private $preco;

    function getId(){
        return $this->idprod;
    }

    function getNome(){
        return $this->nome;
    }

    function getCor(){
        return $this->cor;
    }

    function getPreco(){
        return $this->preco;
    }




    function setId($id) {
        $this->idprod = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCor($cor) {
        $this->cor = $cor;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }
}


?>
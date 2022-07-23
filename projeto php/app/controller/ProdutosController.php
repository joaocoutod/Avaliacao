<?php

include_once "../conexao/Conexao.php";
include_once "../model/Produto.php";
include_once "../model/Preco.php";
include_once "../crud/produto_crud.php";


//instancia as classes
$produto = new Produto();
$produtocrd = new ProdutoCRD();

//pega todos os dados passado por POST
$d = filter_input_array(INPUT_POST);


//se for para cadastrar entrar nessa condição
if(isset($_POST['cadastrar'])){

    $produto->setNome($d['nome']);
    $produto->setCor($d['cor']);

    //Aplicando Regra de negocio
    //Produtos das cores AZUL e VERMELHO, Terão um desconto de 20%.
    if ($d['cor'] == 'azul' || $d['cor'] == 'vermelho') {
        $desconto = 20; //20% de desconto
        $preco = $d['preco'];
        $resultado = (($desconto * $preco)/100)-$preco;
        $produto->setPreco($resultado);
    }
    
    //Produtos das cores AMARELO, terão um desconto de 10%.
    else if ($d['cor'] == 'amarelo') {
        $desconto = 10; //10% de desconto
        $preco = $d['preco'];
        $resultado = (($desconto * $preco)/100)-$preco;
        $produto->setPreco($resultado);
    }

    //Produtos de cor VERMELHO e com VALOR MAIOR que R$ 50.00.  Será aplicado um desconto de 5%.
    else if ($d['cor'] == 'vermelho' && $d['preco'] > 50.00){
        $desconto = 5; //10% de desconto
        $preco = $d['preco'];
        $resultado = (($desconto * $preco)/100)-$preco;
        $produto->setPreco($resultado);
    }

    $produtocrd->create($produto);

    header("Location: ../../");
}

// se a requisição for editar
else if(isset($_POST['editar'])){

    $produto->setId($d['id']);
    $produto->setNome($d['nome']);
    
    $produtocrd->update($produto);

    header("Location: ../../");
}

// se a requisição for deletar
else if(isset($_GET['del'])){

    $produto->setId($_GET['del']);

    $produtocrd->delete($produto);

    header("Location: ../../");
} else{
    header("Location: ../../");
}
?>
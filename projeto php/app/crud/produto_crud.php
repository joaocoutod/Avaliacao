<?php

/*
    Criação de classes dos Produtos com o crud
*/

class ProdutoCRD{

    // Cria produto
    public function create(Produto $produto) {
        try {
            $sql = "INSERT INTO produtos (                   
                  nome, cor, preco)
                  VALUES (
                  :nome, :cor, :preco) ";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $produto->getNome());
            $p_sql->bindValue(":cor", $produto->getCor());
            $p_sql->bindValue(":preco", $produto->getPreco());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir produto <br>" . $e . '<br>';
        }
    }


    //seleciona todos os produtos para exibir
    public function read() {
        try {
            $sql = "SELECT * FROM produtos order by idprod desc";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaProdutos($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }


    //atualiza produto
    public function update(Produto $produto) {
        try {
            $sql = "UPDATE produtos set nome=:nome WHERE idprod = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $produto->getNome());
            $p_sql->bindValue(":id", $produto->getId());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }


    //exclui produto
    public function delete(Produto $produto) {
        try {
            $sql = "DELETE FROM produtos WHERE idprod = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $produto->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir usuario<br> $e <br>";
        }
    }


    //lista de produtos 
    private function listaProdutos($row) {
        $produto = new Produto();
        $produto->setId($row['idprod']);
        $produto->setNome($row['nome']);
        $produto->setCor($row['cor']);
        $produto->setPreco($row['preco']);

        return $produto;
    }

}

?>
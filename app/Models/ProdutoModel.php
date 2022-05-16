<?php

namespace App\Models;
use CodeIgniter\Model;

class ProdutoModel extends Model {

    protected $table = 'produto';
    protected $primaryKey = 'id_produto';
    protected $allowedFields = ['preco_unitario', 'descricao','sistema','tipo_produto'];

    public function pegarDados($id = null){
        if ($id == null){
            return $this->findAll();
        } return $this->asArray()->where(['id_produto' => $id])->first();
    }

    public function inserirProduto($dados){            
        return $this->insert($dados);
    }

    public function editarProduto($id, $dados){
        return $this->update($id, $dados);
    }

    public function pegarProdutos($id_produto){
        return $this->asArray()->where(['id_produto'=> $id_produto])->findAll();
    }
    public function removerProduto($id = null){
        if ($id != null){
            $this->delete($id);
        }
    }
}

?>
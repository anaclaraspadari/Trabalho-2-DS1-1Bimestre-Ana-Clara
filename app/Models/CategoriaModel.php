<?php

namespace App\Models;
use CodeIgniter\Model;

class ProdutoModel extends Model {

    protected $table = 'categoria';
    protected $primaryKey = 'id_categoria';
    protected $allowedFields = ['nome'];

    public function pegarDados($id = null){
        if ($id == null){
            return $this->findAll();
        } return $this->asArray()->where(['id_categoria' => $id])->first();
    }

    public function inserirCategoria($dados){            
        return $this->insert($dados);
    }

    public function removerCategoria($id = null){
        if ($id != null){
            $this->delete($id);
        }
    }
}

?>
<?php

namespace App\Models;
use CodeIgniter\Model;

class PedidoModel extends Model {
    protected $table = 'pedido';
    protected $primaryKey = 'id';
    protected $allowedFields = ['quantidade', 'produto','usuario'];
    
    public function pegarDados($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }
    public function inserirPedido($dados){            
        return $this->insert($dados);
    }
    public function attPedido($id, $dados){
        return $this->update($id, $dados);
    }
    public function acharPedidoPorUsuario($usuario){
        return $this->asArray()->where(['usuario'=> $usuario])->findAll();
    }
    public function removePedido($id = null){
        if ($id != null){
            $this->delete($id);
        }
    }
}

?>
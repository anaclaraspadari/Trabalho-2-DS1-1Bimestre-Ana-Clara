<?php

namespace App\Models;
use CodeIgniter\Model;

class UsuarioModel extends Model {

    protected $table = 'usuario';
    protected $primaryKey = 'email';
    protected $allowedFields = ['nome', 'email', 'senha', 'administrador'];

    public function pegarDados($email = null){
        if ($email == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['email' => $email])->first();
    }

    public function inserirDadosLogin($dados)
    {            
        return $this->insert($dados);
    }

    public function verificarSenha($dados){
        return $this->where(['email' => $dados['email'], 'senha' => md5($dados['senha'])])->first();
    }
}
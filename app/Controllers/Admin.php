<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\PedidoModel;
use App\Models\ProdutoModel;
use App\Models\UsuarioModel;

class Admin extends BaseController
{
	public function sessaoAdmin(){
        // $model_pedido = new PedidoModel();
        // $model_produto = new ProdutoModel();
        // $model_usuario = new UsuarioModel();
        // $model_categoria = new CategoriaModel();
        // $dados_pedidos = $model_pedido->getData();
        // $dados_produtos = $model_produto->getData();
        // $dados_usuarios = $model_usuario->getData();
        // $dados_categorias = $model_categoria->getData();
       
        // $dados = $this->session->get();
        // $todos_os_dados['pedido'] = $dados_pedidos;
        // $todos_os_dados['produto'] = $dados_produtos;
        // $todos_os_dados['usuario'] = $dados_usuarios;
        // $todos_os_dados['categoria'] = $dados_categorias;

		echo view ('common/headerUsuario');
		echo view ('lista-admin',$todos_os_dados);
		echo view ('common/footer');
	}

    public function adicionarProduto($id){
		$data['categoria'] = $id;
		echo view ('common/headerUsuario');
		echo view ('adicionar-categoria',$dados);
		echo view ('common/footer');
    }
    
    public function editarProduto($id,$dados){
        $model_produto = new ProdutoModel();
		$resultado = $model_produto->getData($id);
		$dados = $resultado;
		echo view ('common/headerUser');
		echo view ('editar-produto',$dados);
		echo view ('common/footer');
    }

    public function removerProduto($id=null){
        if ($id==null){
			return redirect()->to('customersession');
		}
		$model_produto = new ProdutoModel();
		$resultado = $model_produto->getData($id);
		if ($result !=NULL){
			$model_produto->removerProduto($resultado['id_produto']);		
			return redirect()->to(base_url('customersession'));
		}else{
			return redirect()->to(base_url('customersession'));
		}
    }

    
	//--------------------------------------------------------------------

}
?>
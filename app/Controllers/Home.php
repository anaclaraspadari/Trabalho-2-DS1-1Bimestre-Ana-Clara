<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\PedidoModel;
use App\Models\ProdutoModel;
use App\Models\CategoriaModel;


class Home extends BaseController
{
	// I defined session variable in BaseController.php provided by Codeigniter. See code. 
	
	public function index()

	{   
		return view('login');
	}


	public function registration()
	{
		echo view ('common/headerCadastro');
		echo view ('cadastro-usuario');
		echo view ('common/footer');
	}

	public function sessaoUsuario(){
		//$session = \Config\Services::session();
		$modelo_pedido = new PedidoModel();
		$dados = $this->session->get();
		$dados['pedido'] = $modelo_pedido->acharPedidoPorUsuario($dados['id']);

		echo view ('common/headerUsuario');
		echo view ('listar-produto',$dados);
		echo view ('common/footer');
	}

	public function inserirPedido($id){
		$data['usuario'] = $id;
		echo view ('common/headerUsuario');
		echo view ('insertOrderView',$data);
		echo view ('common/footer');
	}

	public function editarPedido($id){
		$orders_model = new OrdersModel();
		$result = $orders_model->getData($id);
		$data = $result;
		
		echo view ('common/headerUser');
		echo view ('editOrderView',$data);
		echo view ('common/footer');
	}


	public function editarPedidoDB($id){
		$rules = [
			'description' => 'required|min_length[3]|max_length[255]',
			'amount' => 'required', 
		];// revisar

		$orders_model = new PedidoModel();

		if ($this->validate($regras)){
			$dados = array(

				'id_produto' =>  $this->request->getVar('id_produto'),

				'quantidade' => $this->request->getVar('quantidade'),
				
				'produto' => $this->request->getVar('produto'),

				'usuario' => $this->request->getVar('usuario'),
			);
			

			$modelo_pedido->update_order($id, $dados);
 			return redirect()->to(base_url('customersession'));
			
		}
		else{
			$this->editOrder($id);	
					
		}

	}

	public function inserirPedidosDB($id_produto){


		$regras = [
			'quantidade' => 'required',
			'produto' => 'required', 
			'usuario' => 'required', 
		];

		$model_pedido = new PedidoModel();

		if ($this->validate($regras)){
			$dados = array(

				'id_produto' =>  $id_produto,

				'quantidade' => $this->request->getVar('quantidade'),
				
				'produto' => $this->request->getVar('produto'),

				'usuario' => $this->request->getVar('usuario'),
			);
			

			$model_pedido->insert_order($dados);
 			return redirect()->to(base_url('customersession'));
			
		}
		else{
			$this->insertOrder($id_produto);	
					
		}
	}



	public function removePedido($id=null){
		
		if ($id==null){
			return redirect()->to('customersession');
		}

		$model_pedido = new PedidoModel();

		$resultado = $orders_model->getData($id);

		if ($resultado !=NULL){
			$model_pedido->removePedido($resultado['id']);		
			return redirect()->to(base_url('customersession'));
			
		}else{
			return redirect()->to(base_url('customersession'));
		}


	} 


	public function inserirDados(){

		$regras = [
			'name' => 'required|min_length[3]|max_length[100]',
			'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[customers.email]',
			'passwd'=> 'required|min_length[6]|max_length[100]', 
		];

		// Codeigniter 3: $this->load->model("CustomersModel");
		$model_usuario = new UsuarioModel();
		// Codeigniter 3: $this->load->library("session");
//		$session = \Config\Services::session();

		// codeignter 3 : $this->input->post("...");

		if ($this->validate($regras)){
			$dados = array(


				'nome' => $this->request->getVar('nome'),
				
				'email' => $this->request->getVar('email'),

				'senha' => md5($this->request->getVar('senha'))

			);

			$model_usuario->inserirDadosLogin($dados);
			$this->session->setFlashdata('messageRegisterOk',' Registered Successfull. Please, login.' );
			return redirect()->to('/');
			
		}
		else{
			$this->registration();	
		}
		
	}


	public function usuarioLogin(){
		
		$regras = [
			'email' => 'required|min_length[6]|max_length[50]|valid_email',
			'senha'=> 'required|min_length[5]|max_length[60]' 
		];

		$model_usuario = new UsuarioModel();
//		$session = \Config\Services::session();
		 
		if ($this->validate($regras)){
			$dados = array(

				'email' => $this->request->getVar('email'),

				'senha' => $this->request->getVar('senha'),

				'nome' => '',

				'logado' => FALSE

			);
			
			if(!($userRow = $model_usuario->verificarSenha($dados))){
				$this->session->setFlashdata('loginFail',' Incorrect username (your e-mail) or password.' );
				return redirect()->to('/');
			}else{
				//$orders_model = new OrdersModel();
				$dados['logado'] = TRUE;
				$dados['email'] = $userRow['email'];
				$dados['nome'] = $userRow['nome'];
				//$data['orders'] = $orders_model->getOrdersbyCustomer($data['id']);
				$this->session->set($dados);
				if ($dados['administrador'] == 1){
					return redirect()->to(base_url('adminsession'));
				}else{ 
					return redirect()->to(base_url('customersession'));
				}
				
			}
			

		}
		else {
			return view('login');
			
		}

	
	} 




	public function logout(){
//		$session = \Config\Services::session();
		$dados['logado'] = FALSE;
		$dados['nome'] = "";
		$dados['email']="";
		$dados['senha']="";
		$this->session->set($dados);
		$this->session->destroy();
		return redirect()->to('/'); 

	}

	//--------------------------------------------------------------------

}
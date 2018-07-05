<?php 
class Controler{
	public $edit = false;
	public $msg;
	public function index(){
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			if (isset($_POST['cadastrar'])) {
				$u = new Usuario();
				$newstr = filter_var($_POST['nome'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
				$u->setNome($newstr);
				$u->setLogin($_POST['login']);
				$u->setSenha($_POST['senha']);
				$u->setStatus($_POST['status']);

				$d= new UsuarioDAO();

				if ($d->salvar($u)) {
					$this->msg = "Salvo com Sucesso!";
					header("location:index.php");
				}
		}//end if cadastrar
		
		if (isset($_POST['editar'])) {
			$u=new Usuario();
			$u->setId($_POST['id']);
			$d = new UsuarioDAO();
			if ($d->buscar($u)) {
				return  $this->edit = $d->buscar($u);
			}

		}//end if button buscar para editar
		if (isset($_POST['update'])) {
			$u=new Usuario();
			$u->setId($_POST['id']);
			$newstr = filter_var($_POST['nome'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
			$u->setNome($newstr);
			$u->setLogin($_POST['login']);
			$u->setSenha($_POST['senha']);
			$u->setStatus($_POST['status']);
			$d = new UsuarioDAO();
			$d->atualizar($u);
		}//atualizar usuário

		if (isset($_POST['excluir'])) {
			$u = new Usuario();
			$u->setId($_POST['id']);
			$d= new UsuarioDAO();

			if ($d->excluir($u)) {
				$this->msg ="Excluído com Sucesso!";
				header("location:index.php");
			}
		}//end if excluir

	}//end if request_method
}//fim function index
}//fim class

?>

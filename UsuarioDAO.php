<?php 
require_once 'Conexao.php';
require_once 'ClassUsuario.php';

class UsuarioDAO{
	public function salvar(Usuario $u){ 
		try{
			$sql="INSERT INTO usuario(nome,login,senha,status) VALUES (?,?,?,?)";

			$stm = Conexao::conectar()->prepare($sql);
			$stm->bindValue(1,$u->getNome());
			$stm->bindValue(2,$u->getLogin());
			$stm->bindValue(3,$u->getSenha());
			$stm->bindValue(4,$u->getStatus());
			$stm->execute();
			return "Usuário Salvo Com sucesso!";
		}catch(Exception $e){
			print_r($e->getMessage());
		}
	}

	public function listar(){
		try{
			$sql = "SELECT * FROM usuario";
			$stm = Conexao::conectar()->query($sql);
			if ($stm->rowCount()>0) {
				$result= $stm->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			
			
		}catch(Exception $e){
			print_r($e->getMessage());
		}
	}

	public function atualizar(Usuario $u){
		try{
			$sql= "UPDATE usuario SET nome =?,login=?,senha=?,status=? WHERE id=?";
			$stm= Conexao::conectar()->prepare($sql);
			$stm->bindValue(1,$u->getNome());
			$stm->bindValue(2,$u->getLogin());
			$stm->bindValue(3,$u->getSenha());
			$stm->bindValue(4,$u->getStatus());
			$stm->bindValue(5,$u->getId());
			$stm->execute();
			return "Deu certo";
		}catch(Exception $e){
			print_r($e->getMessage());
		}
	}

	public function excluir(Usuario $u){
		try{
			$sql= "DELETE FROM usuario WHERE id=?";
			$stm= Conexao::conectar()->prepare($sql);
			$stm->bindValue(1,$u->getId());
			$stm->execute();
			return "Excluído com sucesso!";
		}catch(Exception $e){
			print_r($e->getMessage());
		}
	}

	public function buscar(Usuario $u){
		try {
			$sql="SELECT * FROM usuario WHERE id=?";
			$stm= Conexao::conectar()->prepare($sql);
			$stm->bindValue(1,$u->getId());
			$stm->execute();

			if ($stm->rowCount()>0) {
				$result = $stm->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			
		} catch (Exception $e) {
			print_r($e->getMessage());
		}
	}
}

?>
<?php

class Usuario {
	private $id;
	private $nome;
	private $login;
	private $senha;
	private $status;

	public function setId($value){
		$this->id = $value;
	}
	public function getId(){
		return $this->id;
	}
	public function setNome($value){
		$this->nome = $value;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setLogin($value){
		$this->login = $value;
	}
	public function getLogin(){
		return $this->login;
	}
	public function setSenha($value){
		$this->senha = $value;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function setStatus($value){
		$this->status = $value;
	}
	public function getStatus(){
		return $this->status;
	}
	
}
?>
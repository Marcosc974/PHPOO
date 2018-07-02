<!DOCTYPE html>
<html>
<head>
	<title>CRUD-PHP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
	<?php
	require_once 'Conexao.php';
	require_once 'ClassUsuario.php';
	require_once 'UsuarioDAO.php';
	require_once 'Controler.php';
	$c=new Controler();
	$c->index();
	$d= new UsuarioDAO();
	?>

	<div class="container">
		<h1><a href="">CRUD-PHP OO</a></h1>
		<?php 
		if (isset($c->edit) && !empty($c->edit)):
			foreach ($c->edit as $oi):?>
				<form method="post">
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $oi['id']; ?>">
						<label>Nome</label><input type="text" name="nome"  class="form-control" value="<?php echo $oi['nome']; ?>">
						<label>Login<input type="text" name="login"  class="form-control" value="<?php echo $oi['login']; ?>"></label>
						<label>Senha<input type="password" name="senha" class="form-control" value="<?php echo $oi['senha']; ?>"></label>
						<label>
							<select name="status" required class="form-control">
								<?php if ($oi['status']):?>
									<option value="1" selected>Ativo</option>
									<option value="0">Inativo</option>
									<?php else:?>
										<option value="1">Ativo</option>
										<option value="0" selected>Inativo</option>
									<?php endif; ?>

								</select>
							</label>
						</div>
						<label><button class="btn btn-success" name="update">Alterar</button></label>
					</form>
					<?php
				endforeach;
			else:
				?>
				<form method="post">
					<div class="form-group">
						<label>Nome<input type="text" name="nome" required class="form-control"></label>
						<label>Login<input type="text" name="login" required class="form-control"></label>
						<label>Senha<input type="password" name="senha" required class="form-control"></label>
						<label>
							<select name="status" required class="form-control">
								<option value="1">Ativo</option>
								<option value="0">Inativo</option>
							</select>
						</label>
					</div>
					<label><button class="btn btn-primary" name="cadastrar">Cadastrar</button></label>
				</form>
				<?php
			endif;
			if ($d->listar()):?>
				<table class="table table-striped">
					<thead>
						<th>ID</th>
						<th>NOME</th>
						<th>LOGIN</th>
						<th>STATUS</th>
						<th>AÇÃO</th>
					</thead>
					<?php	
					foreach ($d->listar() as $usuario):
						?>
						<tr>
							<td><?php echo $usuario['id']; ?></td>
							<td><?php echo $usuario['nome']; ?></td>
							<td><?php echo $usuario['login']; ?></td>
							<td>
								<?php if ($usuario['status']) {
									echo "Ativo";
								}else{
									echo "Inativo";
								} ?>
							</td>
							<td>
								<form method="post">
									<input type="hidden" name="id" value="<?php echo$usuario['id'];?>">
									<button class="btn btn-warning" name="editar">Editar</button>
									<button class="btn btn-danger" name="excluir">Excluir</button>
								</form>
							</td>
						</tr>
						
					<?php endforeach;	
				else:
					echo "<h3 class='alert alert-warning'>Não existem usuários cadastrados</h3>";
				endif;
				?>
				
			</table>
		</div>
	</body>
	</html>
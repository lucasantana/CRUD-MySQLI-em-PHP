<?php
///////////////////////////////////////////////////////////////////////
// @ CRUD POO MYSQLI EM PHP											 //
// @ Desenvolvido por Lucas Zanevich				 				 //
// @ Portfolio: www.lucaszanevich.com.br 							 //
// @ Blog: blog.lucaszanevich.com.br 							 	 //
// @ Github: github.com/lucaszanevich 							 	 //
// @ Versão: 0.0.1													 //
///////////////////////////////////////////////////////////////////////

	// Incluir Arquivos
	include("conexao.class.php");
	include("crud.class.php");
	
	// Cria o objeto
	$usuarios = new Crud('_usuarios');
	
	/* EXEMPLOS DE UTILIZAÇÃO */
	
	///////////////////////////////////
	// Total de usuários registrados //
	///////////////////////////////////
	$lista = $usuarios->select("*");
	echo "Total de usu&aacute;rios registrados: " . $lista->num_rows . "";
	
	echo "<hr>";
	
	/////////////////////////////////////////////
	// Mostrar todos os usuários em ordem DESC //
	/////////////////////////////////////////////
	$lista_total = $usuarios->select("*", "", "id, DESC");
	while ( $usuario_lista = $lista_total->fetch_object() )
	{
		echo "<br>";
		echo "ID: " . $usuario_lista->id;
		echo "<br>";
		echo "NOME: " . $usuario_lista->nome;
		echo "<br>";
		echo "CIDADE: " . $usuario_lista->cidade;
		echo "<br>";
		echo "EMAIL: " . $usuario_lista->email;
		echo "<br>";
	}
	
	echo "<hr>";
	
	//////////////////////////////////
	// Seleciona usuário específico //
	//////////////////////////////////
	$id = 1;
	$usuario = $usuarios->select("*", "id = '{$id}'");
	$usuario = $usuario->fetch_object();
	echo "<pre>";
	print_r($usuario);
	echo "</pre>";
	
	echo "<hr>";
	
	//////////////////////
	// Adiciona usuário //
	//////////////////////
	$novo = $usuarios->insert("nome,cidade,email", "'Lucas Zanevich','Sao Paulo','example@email.com'");
	if ( $novo ) 
	{
		echo "Usu&aacute;rio cadastrado com sucesso!";
	}
	
	echo "<hr>";
	
	///////////////////////////////
	// Deleta usuário específico //
	///////////////////////////////
	$deleta = $usuarios->delete("nome = 'Lucas Zanevich'");
	if ( $deleta )
	{
		echo "Usu&aacute;rio deletado com sucesso!";
	}
	
	echo "<hr>";
	
	/////////////////////////////////
	// Atualiza usuário específico //
	/////////////////////////////////
	$atualiza = $usuarios->update("nome = 'Lucas Zanevich Novo'", "id = 1");
	if ( $atualiza ) {
		echo "Usu&aacute;rio atualizado com sucesso!";
	}
?>
	
	
	
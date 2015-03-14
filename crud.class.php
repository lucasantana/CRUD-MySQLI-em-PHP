<?php
///////////////////////////////////////////////////////////////////////
// @ CRUD POO MYSQLI EM PHP											 //
// @ Desenvolvido por Lucas Zanevich				 				 //
// @ Portfolio: www.lucaszanevich.com.br 							 //
// @ Blog: blog.lucaszanevich.com.br 							 	 //
// @ Github: github.com/lucaszanevich 							 	 //
///////////////////////////////////////////////////////////////////////

	class Crud extends Conexao {
		
		// Propriedades Privadas
		private $_select;
		private $_insert;
		private $_delete;
		private $_update;
		
		// Propriedade Construtora
		private $_table = NULL;
		
		// Propriedade de Conexão
		private $connection;
		
		
		// Método Construtor
		public function __construct( $tabela ) {
			
			// Define o nome da tabela na propriedade da classe
			$this->_table = $tabela;
			
			// Define a conexão na propriedade da classe
			$this->connection = parent::conn();
			
			
		}
		
		// Método Select
		public function select( $values = NULL, $where = NULL, $order = NULL )
		{
			
			// Se não existir nenhum valor na $values, define um padrão
			if ( !isset($values) or $values == '' ) {
				
				// Define um valor padrão
				$values = "*";
				
			}
			
			// Se existir "..ORDER BY.."
			if ( isset($order) ) {
				
				// Explode o paramêtro separando por virgula
				$order = explode(',', $order);
				
				// Define o resultado no objeto da classe
				$order = "ORDER BY `{$order[0]}` {$order[1]}";
				
			}
			
			// Se existir "..WHERE.." e o paramêtro for diferente de string vazia
			if ( isset($where) && $where != "" )
			{
				
				// Define o resultado na propriedade da classe
				$this->_select = "SELECT {$values} FROM `{$this->_table}` WHERE {$where} {$order}";
				
				// Cria a query na propriedade
				$this->_select = $this->connection->query($this->_select);
				
				// Executa a query
				if ( !$this->_select ) 
				{
					
					exit("N&atilde;o foi poss&iacute;vel realizar a consulta.");
					
				}
				
				// Retorna resultado da query
				return $this->_select;
				
			}
			
			// Define o resultado na propriedade da classe (SEM WHERE)
			$this->_select = "SELECT {$values} FROM `{$this->_table}` {$order}";
			
			// Cria a query na propriedade
			$this->_select = $this->connection->query($this->_select);
			
			// Executa a query
			if ( !$this->_select ) 
			{
				
				exit("N&atilde;o foi poss&iacute;vel realizar a consulta.");
				
			}
			
			// Retorna resultado da query
			return $this->_select;
				
		}
		
		
		// Método Insert
		public function insert( $fields, $values )
		{
			
			// Define o resultado na propriedade da classe
			$this->_insert = "INSERT INTO `{$this->_table}`({$fields}) VALUES ({$values})";
			
			// Cria a query na propriedade
			$this->_insert = $this->connection->query($this->_insert);
			
			// Executa a query
			if ( !$this->_insert ) 
			{
				
				exit("N&atilde;o foi poss&iacute;vel realizar a consulta.");
				
			}
			
			// Retorna resultado da query
			return $this->_insert;
				
		}
		
		// Método Delete
		public function delete( $where = NULL )
		{
			
			// Se existir "..WHERE.." e o paramêtro for diferente de string vazia
			if ( isset($where) && $where != "" )
			{
				
				// Define o resultado na propriedade da classe
				$this->_delete = "DELETE FROM `{$this->_table}` WHERE {$where}";
				
				// Cria a query na propriedade
				$this->_delete = $this->connection->query($this->_delete);
				
				// Executa a query
				if ( !$this->_delete ) 
				{
					
					exit("N&atilde;o foi poss&iacute;vel realizar a consulta.");
					
				}
				
				// Retorna resultado da query
				return $this->_delete;
				
			}
			
			// Define o resultado na propriedade da classe
			$this->_delete = "DELETE FROM `{$this->_table}`";
			
			// Cria a query na propriedade
			$this->_delete = $this->connection->query($this->_delete);
			
			// Executa a query
			if ( !$this->_delete ) 
			{
				
				exit("N&atilde;o foi poss&iacute;vel realizar a consulta.");
				
			}
			
			// Retorna resultado da query
			return $this->_delete;
			
		}
		
		// Método Update
		public function update( $values, $where = NULL )
		{
			
			// Se existir "..WHERE.." e o paramêtro for diferente de string vazia
			if ( isset($where) && $where != "" )
			{
				
				// Define o resultado na propriedade da classe
				$this->_update = "UPDATE `{$this->_table}` SET {$values} WHERE {$where}";
				
				// Cria a query na propriedade
				$this->_update = $this->connection->query($this->_update);
				
				// Executa a query
				if ( !$this->_update ) 
				{
					
					exit("N&atilde;o foi poss&iacute;vel realizar a consulta.");
					
				}
				
				// Retorna resultado da query
				return $this->_update;
				
			}
			
			// Define o resultado na propriedade da classe
			$this->_update = "UPDATE `{$this->_table}` SET {$values}";
			
			// Cria a query na propriedade
			$this->_update = $this->connection->query($this->_update);
			
			// Executa a query
			if ( !$this->_update ) 
			{
				
				exit("N&atilde;o foi poss&iacute;vel realizar a consulta.");
				
			}
			
			// Retorna resultado da query
			return $this->_update;
			
		}
				
			
	}

?>
<?php
///////////////////////////////////////////////////////////////////////
// @ CRUD POO MYSQLI EM PHP											 //
// @ Desenvolvido por Lucas Zanevich				 				 //
// @ Portfolio: www.lucaszanevich.com.br 							 //
// @ Blog: blog.lucaszanevich.com.br 							 	 //
// @ Github: github.com/lucaszanevich 							 	 //
///////////////////////////////////////////////////////////////////////

	class Conexao extends Mysqli {
	
		// Informações do servidor
		private static $_host = "localhost";
		private static $_username = "root";
		private static $_password = "";
		private static $_database = "_crud";
		
		protected static $instance;
		
		public function __construct() 
		{
			
			// Método Construtor da classe Mysqli
			@parent::__construct(
			isset(self::$_host) ? self::$_host : '',
			isset(self::$_username) ? self::$_username : '',
			isset(self::$_password) ? self::$_password : '',
			isset(self::$_database) ? self::$_database : ''
			);
			
			// Se a conexão não existir
			if( mysqli_connect_errno() ) 
			{
			
				return;
				
			}
			
		}
		
		public static function conn() {
			
			if ( !self::$instance ) {
				self::$instance = new self();
			}
			
			return self::$instance;
			
		}
			
		
	}
	
?>
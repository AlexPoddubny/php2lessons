<?php
	
	
	namespace App\Controllers;
	
	
	use App\Exceptions\Core;
	use App\View;
	use Exception;
	
	class Base
	{
		protected $view;
		
		public function __construct()
		{
			$this->view = new View;
		}
		
		public function beforeAction()
		{

		}
		
		public function action($action)
		{
			$methodName = 'action' . $action;
			$this->beforeAction();
			return $this->$methodName();
		}
	}
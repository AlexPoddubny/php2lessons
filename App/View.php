<?php
	
	
	namespace App;
	
	
	class View
		implements \Countable
	{
		
		use Magic;
		
		public function render($template)
		{
			ob_start();
			foreach ($this->data as $prop => $value){
				$$prop = $value;
			}
			include __DIR__ . '/templates/header.php';
			include $template;
			include __DIR__ . '/templates/footer.php';
			$content = ob_get_contents();
			ob_end_clean();
			return $content;
		}
		
		public function display($template)
		{
			echo $this->render($template);
		}
		
		/**
		 * Count elements of an object
		 * @link https://php.net/manual/en/countable.count.php
		 * @return int The custom count as an integer.
		 * </p>
		 * <p>
		 * The return value is cast to an integer.
		 * @since 5.1.0
		 */
		public function count()
		{
			return count($this->data);
		}
	}
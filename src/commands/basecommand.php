<?php 
	
	require 'note.php';

	class BaseCommand
	{
		
		public function __construct($parsecode)
		{
			$this->parsecode = $parsecode;
		}

		public function execute($param){
			switch ($this->parsecode) {
				case '11':
				case '21':
					$note = new Note($param);
					$note -> makeNote();
					break;
				
				default:
					break;
			}

		}

	}
?>
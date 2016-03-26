<?php

	class Command{
		public $verb;
		public $noun;

		function __construct($verb,$noun){
			$this->verb = $verb;
			$this->noun = $noun;
			echo $this->parseCommand($verb,$noun);
		}

		private function parseCommand($verb,$noun){
			$parsecode = "00";
			switch ($verb) {
				case 'take':
					$parsecode[0] = 1;
					break;
				default:
					$parsecode[0] = 0;
					break;
			};
			switch ($noun) {
				case 'note':
					$parsecode[1] = 1;
					break;
				default:
					$parsecode[1] = 0;
					break;
			};
			if($parsecode == "00"){
				return false;
			}else{
				return $parsecode;
			}
		}

		function execute($parsecode){

		}
	}
?>
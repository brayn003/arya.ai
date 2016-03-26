<?php
	require 'commands/basecommand.php';

	class Command{

		public function __construct($verb,$noun){
			$this->verb = $verb;
			$this->noun = $noun;
			// echo $this->parseCommand($verb,$noun);
		}

		public function parseCommand(){
			foreach ($this->verb as $vb) {
				foreach ($this->noun as $nn) {
					$parsecode = "00";
					switch ($vb) {
						case 'take':
							$parsecode[0] = 1;
							break;
						case 'make':
							$parsecode[0] = 2;
							break;
						default:
							$parsecode[0] = 0;
							break;
					};
					switch ($nn) {
						case 'note':
							$parsecode[1] = 1;
							break;
						default:
							$parsecode[1] = 0;
							break;
					};
					if($parsecode[0] != "0" && $parsecode[1] != "0"){
						return $parsecode;
					}
				}
			}
			return false;
		}

	}
?>
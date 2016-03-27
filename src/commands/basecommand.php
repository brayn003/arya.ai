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
					$dlink = $note -> makeNote();
					// $note -> forceDownload();
					return "Done! I have sent you the note. <a target=\"_blank\" href = \"".$dlink."\" download>Here's your link</a> to download it.";
					break;
				
				default:
					return false;
					break;
			}

		}
	}
?>
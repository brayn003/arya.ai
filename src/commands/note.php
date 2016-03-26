<?php
	// require '../globals.php';

	class Note
	{
		public function __construct($msg)
		{
			$this->msg = $msg;
		}

		public function makeNote()
		{
			$file = fopen(str_replace("/src/commands","",__DIR__)."/tmp/note(".date('Y-m-d H:i:s',time()).").txt", "w");
			fwrite($file, $this->msg);
			fclose($file);
		}
	}
?>
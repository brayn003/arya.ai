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
			$filename = "note".time().".txt";
			$fileloc = str_replace("/src/commands","",__DIR__)."/tmp/";
			$file = fopen($fileloc.$filename, "w");
			fwrite($file, $this->msg);
			fclose($file);
			return "/arya.ai/tmp/".$filename;
		}

		// public function forceDownload()
		// {
		// 	if (file_exists($this->file)) {
		// 	    header('Content-Description: File Transfer');
		// 	    header('Content-Type: application/octet-stream');
		// 	    header('Content-Disposition: attachment; filename="'.basename($this->file).'"');
		// 	    header('Expires: 0');
		// 	    header('Cache-Control: must-revalidate');
		// 	    header('Pragma: public');
		// 	    header('Content-Length: ' . filesize($this->file));
		// 	    readfile($this->file);
		// 	    exit;
		// 	}
		// }
	}
?>
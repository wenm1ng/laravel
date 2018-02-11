<?php 
	function rand_name(){
		$str = 'abcdefghijklmnopqrstuvwxyz0123456789';
		$name = '';
		//随机13位用户名
		for ($i=0; $i < 13; $i++) { 
			$name .= substr($str,mt_rand(0,strlen($str)-1),1);
		}

		return $name;
	}

	//错误日志记录
    function log_error($name, $text , $path) {
    	if(!file_exists($path)){
    		mkdir($path);
    	}

    	if(!file_exists($path."/" . date("Y-m-d") . "/")){
    		mkdir($path."/" . date("Y-m-d") . "/");
    	}
    	
    	$myfile = fopen($path."/" . date("Y-m-d") . "/" . $name . ".txt", "a+") or die("Unable to open file!");
        fwrite($myfile, $text . "---------" . date("Y-m-d G:i:s") . "\r\n");
        fclose($myfile);
    }
 ?>
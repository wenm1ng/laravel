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
 ?>
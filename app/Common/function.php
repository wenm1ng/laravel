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

    //递归创建目录
    function Directory( $dir ){  
 
       return  is_dir ( $dir ) or Directory(dirname( $dir )) and  mkdir ( $dir , 0777);
     
    }

    //对象转数组
    function obj_to_array($object){
        $object =  json_decode( json_encode( $object),true);
        return $object;
    }

    //判断数组是几维数组
    function getmaxdim($vDim)
    {
      if(!is_array($vDim)) return 0;
      else
      {
        $max1 = 0;
        foreach($vDim as $item1)
        {
         $t1 = getmaxdim($item1);
         if( $t1 > $max1) $max1 = $t1;
        }
        return $max1 + 1;
      }
    }

    //返回一段随机数
    function rand_string($number){
        $string = '123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
        $new_string = str_shuffle($string);

        return substr($new_string,0,$number);
    }
 ?>
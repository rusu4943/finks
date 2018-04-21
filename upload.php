<?php  

class upload {  
    /**声明**/  
    var $upfile_type,$upfile_size,$upfile_name,$upfile;  
    var $d_alt,$extention_list,$tmp,$arri;  
    var $datetime,$date;  
    var $filestr,$size,$ext,$check;  
    var $flash_directory,$extention,$file_path,$base_directory,$file_newname;   
    var $url; //文件上传成功后跳转路径;
   
    function upload($files=array())  
    {
        /**构造函数**/     
        $this->set_extention(); //初始化扩展名列表;  
        $this->set_size(5000); //初始化上传文件KB限制;   
        $this->set_datetime(); //设置文件名称前缀;  
        $this->set_base_directory(dirname(__FILE__).'/upload/'); //初始化文件上传根目录名，可修改！; 		
        $this->set_flash_directory();  //初始化文件上传子目录名; 
		$this->set_file($files);
    }  
    /*设置文件值*/
    function set_file($files)  
    {   
		$this->set_file_type($files['type']);   //获得文件类型 
		$this->set_file_name($files['name']);   //获得文件名称 
		$this->set_file_size($files['size']);   //获得文件尺寸 
		$this->set_upfile($files['tmp_name']);  //服务端储存的临时文件名        
    }
        
    /**文件类型**/  
    function set_file_type($upfile_type)  
    {  
        $this->upfile_type = $upfile_type; //取得文件类型;  
    }  
    
    /**获得文件名**/  
    function set_file_name($upfile_name)  
    {  
        $this->upfile_name = $upfile_name;//取得文件名称;  
    }  
    
    /**获得文件**/  
    function set_upfile($upfile)  
    {  
        $this->upfile = $upfile; //取得文件在服务端储存的临时文件名;  
    }  
  
    /**获得文件大小**/  
    function set_file_size($upfile_size)  
    {  
        $this->upfile_size = $upfile_size; //取得文件尺寸;  
    }  
  
    /**设置文件上传成功后跳转路径**/  
    function set_url($url)  
    {  
        $this->url = $url;   //设置成功上传文件后的跳转路径;  
    }  
    
    /**获得文件扩展名**/  
    function get_extention()  
    {  
        $this->extention = preg_replace('/.*\.(.*[^\.].*)*/iU','\\1',$this->upfile_name); //取得文件扩展名;  
    }   
        
    /**设置文件名称**/  
    function set_datetime()  
    {  
        $this->datetime = time(); //按时间生成文件名;  
    }  
  
    /**设置目录名称**/  
    function set_date()  
    {  
        $this->date = date("Y-m-d"); //按日期生成目录名称;  
    }  
  
    /**初始化允许上传文件类型**/  
    function set_extention()  
    {  
        $this->extention_list = "gif|jpg|png|bmp|doc|xls|rar|docx|pptx|xlsx|zip|pdf|jpeg"; //默认允许上传的扩展名称;  
    }    
  
    /**设置最大上传KB限制**/  
    function set_size($size)  
    {  
        $this->size = $size; //设置最大允许上传的文件大小;  
    }  
  
    /**初始化文件存储根目录**/  
    function set_base_directory($directory)  
    {
        $this->base_directory = $directory; //生成文件存储根目录;  
		$this->mk_base_dir();      //如果根目录不存在则创建；
    }  
  
    /**初始化文件存储子目录**/  
    function set_flash_directory()  
    {  
        $this->flash_directory = $this->base_directory; //生成文件存储子目录;  
    }  

	function get_directory(){
		return $this->flash_directory;
	}  
  
    /**错误处理**/  
    function showerror($errstr="未知错误！"){  
        echo "<script language=javascript>alert('$errstr');location='javascript:history.go(-1);';</script>";  
        exit();  
    }  
    
    /**跳转**/  
    function go_to($str,$url)
    {  
        echo "<script language='javascript'>alert('$str');location='$url';</script>";  
        exit();  
    }  
  
    /**如果根目录没有创建则创建文件存储目录**/  
    function mk_base_dir()  
    {  
        if (! file_exists($this->base_directory)){ //检测根目录是否存在;  
            @mkdir($this->base_directory,0777); //不存在则创建;  
        }
    }   
  
    /**如果子目录没有创建则创建文件存储目录**/  
    function mk_dirs()  
    {
		$arr = explode('/',$this->dirs);
		$basedir = $this->base_directory;
		foreach($arr as $val){
			$basedir .='/'. $val;
			if (! file_exists($basedir)){ //检测子目录是否存在;  
				@mkdir($basedir,0777); //不存在则创建;  
			}
		}
    }    
  
    /**以数组的形式获得分解后的允许上传的文件类型**/  
    function get_compare_extention()  
    {  
        $this->ext = explode("|",$this->extention_list); //以"|"来分解默认扩展名;  
    }  
  
    /**检测扩展名是否违规**/  
    function check_extention()  
    {  
        for($i=0;each($this->ext);$i++) //遍历数组;  
        {  
            if($this->ext[$i] == strtolower($this->extention)) //比较文件扩展名是否与默认允许的扩展名相符;  
            {  
                $this->check = true; //相符则标记;  
                break;  
            }  
        }  
        //不符则警告  
        if(!$this->check){  
            $this->showerror($this->extention."正确的扩展名必须为".$this->extention_list."其中的一种！");  
        }  
          
    }  
  
    /**检测文件大小是否超标**/  
    function check_size()  
    {  
        if($this->upfile_size > round($this->size*1024)) //文件的大小是否超过了默认的尺寸;  
        {  
            $this->showerror("上传附件不得超过".$this->size."KB"); //超过则警告;  
        }  
    }  
  
    /**文件完整访问路径**/  
    function set_file_path()  
    {  
		$rand =	rand(1000,9999);
		$this->file_newname = $this->datetime.$rand;
        $this->file_path = $this->flash_directory."/".$this->datetime.$rand.".".$this->extention; //生成文件完整访问路径;  
		$document = str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']);
		$directory = str_replace('\\','/',$this->flash_directory);
		$directory = str_replace($document,'',$directory);
		$this->file_url = 'http://'.$_SERVER['HTTP_HOST'].$directory.$this->datetime.$rand.".".$this->extention;
    }  
	function get_file_path(){
		return $this->file_path;
	}
	function get_file_name(){
		return $this->file_newname;
	}
	function get_file_dirs(){
		return $this->dirs;
	}
  
    /**上传文件**/  
    function copy_file()  
    {  
        if(copy($this->upfile,$this->file_path)){ //上传文件;  
			return $this->file_url; 
        }else {  
            print $this->showerror("意外错误，请重试！"); // 上传失败;  
			return false; 
        }  
    }  
    
    /**完成保存**/  
    function save()  
    {  
        $this->get_extention();     //获得文件扩展名;  
        $this->get_compare_extention(); //以"|"来分解默认扩展名;  
        $this->check_extention();    //检测文件扩展名是否违规;  
        $this->check_size();      //检测文件大小是否超限;
        $this->set_file_path();     //生成文件完整访问路径;  
		return $this->copy_file();       //上传文件; 
    }    
 }
?>
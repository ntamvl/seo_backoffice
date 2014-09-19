<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require "Smarty-2.6.28/libs/Smarty.class.php";

/**
* @file system/application/libraries/Mysmarty.php
*/
class Smview extends Smarty
{
	function Smview()
	{
		$this->Smarty();

		$config =& get_config();
		
		// absolute path prevents "template not found" errors
		$this->template_dir = $config['smarty_template_dir'] ;																	
		$this->compile_dir  = $config['smarty_compile_dir'] ;       
		
		$this->left_delimiter = "<[" ;
		$this->right_delimiter = "]>" ;
		
		if (function_exists('site_url')) {
    		// URL helper required
			$this->assign("site_url", site_url()); // so we can get the full path to CI easily
		}
	}
	
	/**
	* @param $resource_name string
	* @param $params array holds params that will be passed to the template
	* @desc loads the template
	*/
	function view($resource_name, $params = array())   {
		if (strpos($resource_name, '.') === false) {
			$resource_name .= '.tpl';
		}
		
		if (is_array($params) && count($params)) {
			foreach ($params as $key => $value) {
				$this->assign($key, $value);
			}
		}
		
		// check if the template file exists.
		if (!is_file($this->template_dir . $resource_name)) {
			show_error("template: [$resource_name] cannot be found.");
		}
		
		return parent::display($resource_name);
	}
	
	
	function smassign( $name , $object_data )
	{
		//建立回傳array $mem_array_data
		$data = array() ;
		//設定計數參數
		$i = 0 ;
		//開始foreach迴圈轉換過程
		foreach ( $object_data->result_array()  as $var ) 
		{
			//將物件轉乘
			$data[$i] = $var ; 
			//計數器增加
			$i++ ;
		}
		$this->assign( $name , $data ) ;
	}
	
	
	
	
} // END class smarty_library
?>

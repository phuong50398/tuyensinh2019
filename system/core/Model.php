<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2019, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/libraries/config.html
 */
class CI_Model {

	/**
	 * Class constructor
	 *
	 * @link	https://github.com/bcit-ci/CodeIgniter/issues/5332
	 * @return	void
	 */
	public function __construct() {}

	/**
	 * __get magic
	 *
	 * Allows models to access CI's loaded classes using the same
	 * syntax as controllers.
	 *
	 * @param	string	$key
	 */
	public function __get($key)
	{
		$CI =& get_instance();
		$ses = $CI->session->userdata('user');

		if (is_array($CI->$key->queries)){
			$sql = end($CI->$key->queries);
		}
		else{
			$sql = $CI->$key->queries;
		}
		
		if (!empty($sql) && (!isset($CI->$key->data_cache_sql) || $CI->$key->data_cache_sql!=$sql)){
			$CI->$key->data_cache_sql = $sql;
			$checksql = substr(trim($sql), 0, 6);
			if ($checksql != 'SELECT'){
				//Kiểm tra tồn tại thư mục
				if (!is_dir('./LOGS'))
				{
				   //Tạo thư mục
					mkdir('./LOGS', 0777, true);
				}
				if (!is_dir('./LOGS/'.date('m-Y')))
				{
				   //Tạo thư mục
					mkdir('./LOGS/'.date('m-Y'), 0777, true);
				}
				$file = "./LOGS/".date('m-Y')."/".date('d-m-Y').".txt";
				if (isset($ses['sobd'])){
					$sobd = $ses['sobd'];
				}
				else{
					$ses = $CI->session->userdata('user');
					$macb = $ses['macb'];
				}

				if(!file_exists($file)){
					$myfile = fopen($file, "w") or die("Unable to open file!");
					$txt = $macb."---".date('d/m/Y H:i:s').'---'.$sql."\r\n"."\r\n"."\r\n";
					fwrite($myfile, $txt);
					fclose($myfile);
				}else{
					$myfile = fopen($file, "a") or die("Unable to open file!");
					$txt = $macb."---".date('d/m/Y H:i:s').'---'.$sql."\r\n"."\r\n"."\r\n";
					fwrite($myfile, $txt);
					fclose($myfile);
				}
			}
		}
		return get_instance()->$key;
	}

}

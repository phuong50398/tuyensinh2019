<?php 
	/**
	 * summary
	 */
	class Chethong extends CI_Controller
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	        parent::__construct();
	        date_default_timezone_set("Asia/Ho_Chi_Minh");
	        $this->load->model('hethong/Mhethong');
	    }
	    public function index(){
	    	if($this->input->post('donghethong')){
	    		$check = $this->donghethong();
	    		if($check > 0){
	    			setMessages('success','Đóng hệ thống thành công!', 'Thông báo');
	    		}
	    	}
	    	if($this->input->post('mohethong')){
	    		$check = $this->mohethong();
	    		if($check > 0){
	    			setMessages('success','Mở hệ thống thành công!', 'Thông báo');
	    		}
	    	}
	    	$trangthai_hethong = $this->Mhethong->check_trangthai_hethong();
	    	// pr($trangthai_hethong);
	    	$temp = array(
	    		'template' => 'hethong/Vhethong',
	    		'data'     => array(
	    			'message' 	  => getMessages(),
	    			'trangthai_hethong' => $trangthai_hethong,
	    		),
	    	);
        	$this->load->view('layout/content', $temp);
	    }
	    public function donghethong(){
	    	$session      = $this->session->userdata('user');
	    	$thoigian_thuchien = date('Y-m-d H:i:s');
	    	$data_dong = array(
	    		'trangthai_hethong' => 'dong',
	    		'macanbo_thuchien'	=> $session['macb'],
	    		'tencanbo_thuchien'	=> $session['tencb'],
	    		'thoigian_thuchien' =>  $thoigian_thuchien
	    	);	
			$check_dong = $this->Mhethong->insert('tbl_hethong',$data_dong);  
			return $check_dong;	
	    }
	    public function mohethong(){
	    	$session      = $this->session->userdata('user');
	    	$session      = $this->session->userdata('user');
	    	$thoigian_thuchien = date('Y-m-d H:i:s');
	    	$data_mo = array(
	    		'trangthai_hethong' => 'mo',
	    		'macanbo_thuchien'	=> $session['macb'],
	    		'tencanbo_thuchien'	=> $session['tencb'],
	    		'thoigian_thuchien' =>  $thoigian_thuchien
	    	);	
	    	$check_mo = $this->Mhethong->insert('tbl_hethong',$data_mo);  
			return $check_mo;
	    }
	    
	}
 ?>
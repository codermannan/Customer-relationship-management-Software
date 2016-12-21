<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/*	
 *	@author : Abdul Mannan  
 *	date	: 07 August, 2015
 *	Datastate Solutions
 *	Property Management system
 *	www.datastatebd.com
 */

class Report extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		/*cache control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                $this->load->model('Operation_Model');
                $this->load->model('Search_Model');
                $this->load->model('Report_Model');
	}
	
	/***Default function, redirects to login page if no admin logged in yet***/
	public function index()
	{
		
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		if ($this->session->userdata('admin_login') == 1)
			redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
	}
	/***user_activity report**/
        function user_activity($param1 = '', $param2 = '', $param3 = ''){
            if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
            
            if($param1='search'):
                
                $user   = $this->input->post('user');
                $date1  = $this->input->post('from_date');
                $date2  = $this->input->post('to_date');
                
                $page_data['page_name'] = 'reports/activity';
                $page_data['page_title'] = 'user_activity';
                $page_data['haspermission']= $this->Operation_Model->hasPermission(8);
                if($this->session->userdata('access_level')==1 || $this->session->userdata('access_level')==2):
                    $page_data['user']         = $this->db->get('users')->result_array();
                else:
                    $page_data['user']         = $this->Search_Model->getAllDataFromTableBycondition('users','reporting_manager',$this->session->userdata('user_id'));
                endif;
                
                $page_data['loghis']        = $this->Report_Model->totalSigninHour($user, strtotime($date1), strtotime($date2));
                $page_data['totalQto']      = $this->Report_Model->totalQuotationSent($user, date('Y-m-d',  strtotime($date1)), date('Y-m-d',  strtotime($date2)));
                $page_data['totalCustomer'] = $this->Report_Model->totalCustomerEntry($user, date('Y-m-d',  strtotime($date1)), date('Y-m-d',  strtotime($date2)));
                $page_data['totalExpense']  = $this->Report_Model->totalExpensebill($user, date('Y-m-d',  strtotime($date1)), date('Y-m-d',  strtotime($date2)));
                $page_data['signintime']    = $this->Report_Model->firstSigninTime($user, strtotime($date1), strtotime($date2));
                
//                echo '<pre>';
//                print_r($page_data['signintime']);
//                echo '</pre>';
                $this->load->view('index',$page_data);
                
                
            else:
                $page_data['page_name'] = 'reports/activity';
                $page_data['page_title'] = 'user_activity';
                $page_data['haspermission']= $this->Operation_Model->hasPermission(8);
                if($this->session->userdata('access_level')==1 || $this->session->userdata('access_level')==2):
                    $page_data['user']         = $this->db->get('users')->result_array();
                else:
                    $page_data['user']         = $this->Search_Model->getAllDataFromTableBycondition('users','reporting_manager',$this->session->userdata('user_id'));
                endif;
                $this->load->view('index',$page_data);
            endif;
        }
        
}

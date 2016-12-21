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

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
                $this->load->helper('url');
                $this->load->helper('form');
		/*cache control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                $this->load->model('Operation_Model');
                $this->load->model('Search_Model');
                $this->load->model('Crud_Model');
	}
	
	/***Default function, redirects to login page if no admin logged in yet***/
	public function index()
	{
		
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		if ($this->session->userdata('admin_login') == 1)
			redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
	}
	
        /***MANAAGE BUILDING********/
	function user_management($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
                        $data['user_id']            = $this->input->post('userName');
			$data['password']           = md5($this->input->post('password'));
                        $data['real_name']          = $this->input->post('fullName');
                        $data['designation']        = $this->input->post('designation');
                        $data['department']         = $this->input->post('department');
                        $data['access_level']       = $this->input->post('accessLevel');
                        $data['reporting_manager']  = $this->input->post('rmanager');
                        $data['email']              = $this->input->post('email');
                        $data['mobile']             = $this->input->post('mobile');
                        $data['telephone']          = $this->input->post('telephone');
                        $data['assigned_company']   = $this->input->post('assignedCompany');
                        $data['status']             = $this->input->post('userStatus');
                        
                        $this->db->insert('users', $data);
			$this->session->set_flashdata('insert_message', get_phrase('user_created_successfully'));
			redirect(base_url() . 'index.php?user/user_management', 'refresh');
		}
                
		if ($param1 == 'edit' && $param2 == 'do_update') {
                        $data['real_name']          = $this->input->post('fullName');
                        $data['designation']        = $this->input->post('designation');
                        $data['department']         = $this->input->post('department');
                        if($this->session->userdata('access_level')==1):
                        $data['access_level']       = $this->input->post('accessLevel');
                        $data['password']           = md5($this->input->post('password'));
                        endif;
                        $data['reporting_manager']  = $this->input->post('rmanager');
                        $data['email']              = $this->input->post('email');
                        $data['mobile']             = $this->input->post('mobile');
                        $data['telephone']          = $this->input->post('telephone');
                        $data['assigned_company']   = $this->input->post('assignedCompany');
                        $data['status']             = $this->input->post('userStatus');
     
			$this->db->where('id', $param3);
			$this->db->update('users', $data);
                        $this->session->set_flashdata('update_message', get_phrase('user_updated_successfully'));
			redirect(base_url() . 'index.php?user/user_management', 'refresh');
                        
		} else if ($param1 == 'edit') {
			$page_data['edit_user'] = $this->db->get_where('users', array(
				'id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('id', $param2);
			$this->db->delete('users');
                        $this->session->set_flashdata('delete_message', get_phrase('user_deleted_successfully'));
			redirect(base_url() . 'index.php?user/user_management', 'refresh');
		}
                
                $page_data['page_name']  = 'manage_users';
		$page_data['page_title'] = 'Users';
                if($this->session->userdata('access_level')==1 || $this->session->userdata('access_level')==2):
                    $page_data['user']         = $this->db->get('users')->result_array();
                else:
                    $page_data['user']         = $this->Search_Model->getAllDataFromTableBycondition('users','reporting_manager',$this->session->userdata('user_id'));
                endif;
                $page_data['haspermission']= $this->Operation_Model->hasPermission(8);
                $page_data['org']          = $this->Search_Model->autoSuggest('setup_company','com_id,com_name','com_name','com_id');
                $this->load->view('index', $page_data);
               
	}
        /***menu_management********/
	function menu_management($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
                    
                        $data['menu_name']  = $this->input->post('menuName');
			$data['sub_menu']   = $this->input->post('parentMenu');
                        
			$this->db->insert('menu', $data);
			$this->session->set_flashdata('flash_message', get_phrase('menu_created'));
			redirect(base_url() . 'index.php?user/menu_management', 'refresh');
		}
                
		if ($param1 == 'edit' && $param2 == 'do_update') {
//                        $data['business_name']= $this->input->post('business_name');
//			$data['first_name']   = $this->input->post('first_name');
//                        $data['last_name']    = $this->input->post('last_name');
//                        $data['dob']          = $this->input->post('birth_date');
//                        $data['contact_no']   = $this->input->post('phone_number');
//                        $data['email']        = $this->input->post('lanlord_email');
//                        $data['address']      = $this->input->post('landlord_address');
//                        $data['city']         = $this->input->post('city');
//                        $data['country']      = $this->input->post('landlord_country');
//                        $data['state']        = $this->input->post('landlord_province');
//                        $data['zip_code']     = $this->input->post('zip_code');
//                        
//			$this->db->where('landlord_id', $param3);
//			$this->db->update('p_landlord', $data);
//			$this->session->set_flashdata('flash_message', get_phrase('landlord_updated'));
//			redirect(base_url() . 'index.php?admin/manage_landlord', 'refresh');
			
		} else if ($param1 == 'edit') {
			$page_data['edit_landlord'] = $this->db->get_where('p_landlord', array(
				'landlord_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('landlord_id', $param2);
			$this->db->delete('p_landlord');
			$this->session->set_flashdata('flash_message', get_phrase('property_deleted'));
			redirect(base_url() . 'index.php?admin/manage_landlord', 'refresh');
		}
                $page_data['page_name']  = 'manage_menu';
		$page_data['page_title'] = 'Menu';
                $page_data['menu']       = $this->db->get('menu')->result_array();
		$this->load->view('index', $page_data);
		
	}
        /***MANAAGE BUILDING********/
	function access_management($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') { 
                    $data['role_id']= $this->input->post('accessLevel');
                    $data['menu_id']= $this->input->post('menu');
                    $data['permission']= json_encode($this->input->post('permission'));

                    $wherecondition = array("role_id"=>$this->input->post('accessLevel'),"menu_id"=>$this->input->post('menu'));
                    
                    if($this->Operation_Model->checkDublicate('menu_access', $wherecondition)==1):
                        $this->session->set_flashdata('dup_message', get_phrase('access_setup_duplicate'));
                        redirect(base_url() . 'index.php?user/access_management', 'refresh');
                    else:
                        $this->db->insert('menu_access', $data);
                        $this->session->set_flashdata('insert_message', get_phrase('access_setup_success'));
                        redirect(base_url() . 'index.php?user/access_management', 'refresh');
                    endif;
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['role_id']= $this->input->post('accessLevel');
                        $data['menu_id']= $this->input->post('menu');
//                        if(!empty($this->input->post('permission'))):
                        $data['permission']= json_encode($this->input->post('permission'));
//                        endif;
                        
			$this->db->where('id', $param3);
			$this->db->update('menu_access', $data);
                        
			$this->session->set_flashdata('update_message', get_phrase('access_setup_updated'));
                        redirect(base_url() . 'index.php?user/access_management', 'refresh');
			
		} else if ($param1 == 'edit') {
			$page_data['edit_access'] = $this->db->get_where('menu_access', array(
				'id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('id', $param2);
			$this->db->delete('menu_access');
			$this->session->set_flashdata('delete_message', get_phrase('access_setup_deleted'));
                        redirect(base_url() . 'index.php?user/access_management', 'refresh');
		}
                $this->session->set_userdata('menuid',10);
                $page_data['page_name']  = 'access_setup';
		$page_data['page_title'] = 'access_setup';
                $page_data['menue']       = $this->db->order_by("menu_id", "asc")->get('menu')->result_array();
                $page_data['access']     = $this->Search_Model->joinTableData('menu_access', 'menu', 'menu_access.*,menu.menu_name', 'menu_access.menu_id=menu.menu_id', 'menu_access.id', 'DESC');
		$this->load->view('index', $page_data);
                
	}
	
}

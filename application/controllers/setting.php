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

class Setting extends CI_Controller
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
	
	/***currency_management********/
	function currency_management($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
                    
			$data['code']       = $this->input->post('code');
                        $data['country']    = $this->input->post('country');
                     
			$this->db->insert('currencies', $data);
                        $this->session->set_flashdata('flash_message', get_phrase('currency_created'));
			redirect(base_url() . 'index.php?setting/currency_management', 'refresh');
                    
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['property_type']        = $this->input->post('property_type');
                      
			$this->db->where('property_id', $param3);
			$this->db->update('property', $data);
			$this->session->set_flashdata('flash_message', get_phrase('property_updated'));
			redirect(base_url() . 'index.php?admin/manage_property', 'refresh');
			
		} else if ($param1 == 'edit') {
			$page_data['edit_property'] = $this->db->get_where('property', array(
				'property_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('property_id', $param2);
			$this->db->delete('property');
			$this->session->set_flashdata('flash_message', get_phrase('property_deleted'));
			redirect(base_url() . 'index.php?admin/manage_property', 'refresh');
		}
                
                $page_data['page_name']   = 'manage_currency';
                $page_data['page_title']  = get_phrase('currency_management');
                $page_data['curren'] = $this->db->get('currencies')->result_array();
                $this->load->view('index', $page_data);
                
	}
        
        /***sku_management********/
	function sku_management($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
                    
			$data['sku']        = $this->input->post('sku');
                        $data['sku_details']= $this->input->post('sku_details');
                     
			$this->db->insert('product_sku', $data);
                        $this->session->set_flashdata('flash_message', get_phrase('sku_created'));
			redirect(base_url() . 'index.php?setting/sku_management', 'refresh');
                    
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['property_type']        = $this->input->post('property_type');
                      
			$this->db->where('property_id', $param3);
			$this->db->update('property', $data);
			$this->session->set_flashdata('flash_message', get_phrase('property_updated'));
			redirect(base_url() . 'index.php?admin/manage_property', 'refresh');
			
		} else if ($param1 == 'edit') {
			$page_data['edit_property'] = $this->db->get_where('property', array(
				'property_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('property_id', $param2);
			$this->db->delete('property');
			$this->session->set_flashdata('flash_message', get_phrase('property_deleted'));
			redirect(base_url() . 'index.php?admin/manage_property', 'refresh');
		}
                
                $page_data['page_name']   = 'manage_sku';
                $page_data['page_title']  = get_phrase('sku_management');
                $page_data['sku'] = $this->db->get('product_sku')->result_array();
                $this->load->view('index', $page_data);
                
	}
        /***incoterm management********/
	function incoterm_management($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
                    
			$data['incoterm']        = $this->input->post('incoterm');
                     
			$this->db->insert('incoterm', $data);
                        $this->session->set_flashdata('flash_message', get_phrase('incoterm_created'));
			redirect(base_url() . 'index.php?setting/incoterm_management', 'refresh');
                    
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['property_type']        = $this->input->post('property_type');
                      
			$this->db->where('property_id', $param3);
			$this->db->update('property', $data);
			$this->session->set_flashdata('flash_message', get_phrase('property_updated'));
			redirect(base_url() . 'index.php?admin/manage_property', 'refresh');
			
		} else if ($param1 == 'edit') {
			$page_data['edit_property'] = $this->db->get_where('property', array(
				'property_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('property_id', $param2);
			$this->db->delete('property');
			$this->session->set_flashdata('flash_message', get_phrase('property_deleted'));
			redirect(base_url() . 'index.php?admin/manage_property', 'refresh');
		}
                
                $page_data['page_name']   = 'manage_incoterm';
                $page_data['page_title']  = get_phrase('incoterm_management');
                $page_data['inco']        = $this->db->get('incoterm')->result_array();
                $this->load->view('index', $page_data);
                
	}
        /***payment_terms********/
	function pterms_management($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
                    
			$data['terms']        = $this->input->post('terms');
                     
			$this->db->insert('payment_terms', $data);
                        $this->session->set_flashdata('flash_message', get_phrase('pterms_created'));
			redirect(base_url() . 'index.php?setting/pterms_management', 'refresh');
                    
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['property_type']        = $this->input->post('property_type');
                      
			$this->db->where('property_id', $param3);
			$this->db->update('property', $data);
			$this->session->set_flashdata('flash_message', get_phrase('property_updated'));
			redirect(base_url() . 'index.php?admin/manage_property', 'refresh');
			
		} else if ($param1 == 'edit') {
			$page_data['edit_property'] = $this->db->get_where('property', array(
				'property_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('property_id', $param2);
			$this->db->delete('property');
			$this->session->set_flashdata('flash_message', get_phrase('property_deleted'));
			redirect(base_url() . 'index.php?admin/manage_property', 'refresh');
		}
                
                $page_data['page_name']   = 'manage_pterms';
                $page_data['page_title']  = get_phrase('payment_terms');
                $page_data['terms']       = $this->db->get('payment_terms')->result_array();
                $this->load->view('index', $page_data);
                
	}
        /***ports_management********/
	function ports_management($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
                    
			$data['port_name']        = $this->input->post('port_name');
                        $data['country']          = $this->input->post('country_name');
                     
			$this->db->insert('ports', $data);
                        $this->session->set_flashdata('flash_message', get_phrase('ports_created'));
			redirect(base_url() . 'index.php?setting/ports_management', 'refresh');
                    
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['property_type']        = $this->input->post('property_type');
                      
			$this->db->where('property_id', $param3);
			$this->db->update('property', $data);
			$this->session->set_flashdata('flash_message', get_phrase('property_updated'));
			redirect(base_url() . 'index.php?admin/manage_property', 'refresh');
			
		} else if ($param1 == 'edit') {
			$page_data['edit_property'] = $this->db->get_where('property', array(
				'property_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('property_id', $param2);
			$this->db->delete('property');
			$this->session->set_flashdata('flash_message', get_phrase('property_deleted'));
			redirect(base_url() . 'index.php?admin/manage_property', 'refresh');
		}
                
                $page_data['page_name']   = 'manage_ports';
                $page_data['page_title']  = get_phrase('ports_management');
                $page_data['ports']       = $this->db->get('ports')->result_array();
                $page_data['coun']       = $this->db->get('country')->result_array();
                $this->load->view('index', $page_data);
                
	}
        /***city_management********/
	function city_management($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
                    
			$data['city_name']        = $this->input->post('city_name');
                        $data['country_name']     = $this->input->post('country_name');
                     
			$this->db->insert('city', $data);
                        $this->session->set_flashdata('flash_message', get_phrase('city_created'));
			redirect(base_url() . 'index.php?setting/city_management', 'refresh');
                    
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['property_type']        = $this->input->post('property_type');
                      
			$this->db->where('property_id', $param3);
			$this->db->update('property', $data);
			$this->session->set_flashdata('flash_message', get_phrase('property_updated'));
			redirect(base_url() . 'index.php?admin/manage_property', 'refresh');
			
		} else if ($param1 == 'edit') {
			$page_data['edit_property'] = $this->db->get_where('property', array(
				'property_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('property_id', $param2);
			$this->db->delete('property');
			$this->session->set_flashdata('flash_message', get_phrase('property_deleted'));
			redirect(base_url() . 'index.php?admin/manage_property', 'refresh');
		}
                
                $page_data['page_name']   = 'manage_city';
                $page_data['page_title']  = get_phrase('city_management');
                $page_data['city']       = $this->db->get('city')->result_array();
                $page_data['coun']       = $this->db->get('country')->result_array();
                $this->load->view('index', $page_data);
                
	}
        /***freight_management********/
	function freight_management($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
                    
			$data['freight']        = $this->input->post('freight');
                     
			$this->db->insert('freight', $data);
                        $this->session->set_flashdata('flash_message', get_phrase('freight_created'));
			redirect(base_url() . 'index.php?setting/freight_management', 'refresh');
                    
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['property_type']        = $this->input->post('property_type');
                      
			$this->db->where('property_id', $param3);
			$this->db->update('property', $data);
			$this->session->set_flashdata('flash_message', get_phrase('property_updated'));
			redirect(base_url() . 'index.php?admin/manage_property', 'refresh');
			
		} else if ($param1 == 'edit') {
			$page_data['edit_property'] = $this->db->get_where('property', array(
				'property_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('property_id', $param2);
			$this->db->delete('property');
			$this->session->set_flashdata('flash_message', get_phrase('property_deleted'));
			redirect(base_url() . 'index.php?admin/manage_property', 'refresh');
		}
                
                $page_data['page_name']   = 'manage_freight';
                $page_data['page_title']  = get_phrase('freight_management');
                $page_data['freight']       = $this->db->get('freight')->result_array();
                $this->load->view('index', $page_data);
                
	}
	/***transport_management********/
	function transport_management($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
                    
			$data['transport_mode']        = $this->input->post('transport_mode');
                     
			$this->db->insert('transport_mode', $data);
                        $this->session->set_flashdata('flash_message', get_phrase('transport_created'));
			redirect(base_url() . 'index.php?setting/transport_management', 'refresh');
                    
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['property_type']        = $this->input->post('property_type');
                      
			$this->db->where('property_id', $param3);
			$this->db->update('property', $data);
			$this->session->set_flashdata('flash_message', get_phrase('property_updated'));
			redirect(base_url() . 'index.php?admin/manage_property', 'refresh');
			
		} else if ($param1 == 'edit') {
			$page_data['edit_property'] = $this->db->get_where('property', array(
				'property_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('property_id', $param2);
			$this->db->delete('property');
			$this->session->set_flashdata('flash_message', get_phrase('property_deleted'));
			redirect(base_url() . 'index.php?admin/manage_property', 'refresh');
		}
                
                $page_data['page_name']   = 'manage_transport';
                $page_data['page_title']  = get_phrase('transport_management');
                $page_data['trmode']      = $this->db->get('transport_mode')->result_array();
                $this->load->view('index', $page_data);
                
	}
        
        function getAjaxccode()
	{
            $uId  =  $this->uri->segment(3);
            $ccode = $this->Search_Model->getSinglefield('country', 'prefix', 'cid', $uId);
            echo json_encode($ccode);
        }
        function getProdcutByAjax()
	{
            $uId  =  $this->uri->segment(3);
            $ccode = $this->Search_Model->getSinglefield('products', 'price', 'item_code', $uId);
            echo json_encode($ccode);
        }
}

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

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->helper('perfex_db_helper');
		/*cache control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                $this->load->model('Operation_Model');
                $this->load->model('Search_Model');
                $this->load->model('Crud_Model');
                $this->load->model('Email_Model');
	}
	
	/***Default function, redirects to login page if no admin logged in yet***/
	public function index()
	{
		
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		if ($this->session->userdata('admin_login') == 1)
			redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
                
	}
	
	/***ADMIN DASHBOARD***/
	function dashboard()
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		$page_data['page_name']  = 'dashboard';
		$page_data['page_title'] = get_phrase($this->session->userdata('login_as').'_dashboard');
                $page_data['customer']   = $this->Search_Model->autoSuggest('setup_company','com_id,com_name','com_name','com_id');
                $page_data['todo']       = $this->db->get('todo_list')->result_array();
                $page_data['activity']   = $this->db->order_by("id", "desc")->get('tblactivitylog')->result_array();
                $page_data['quotation']  = $this->Search_Model->quotationList();
		$this->load->view('index', $page_data);
	}
        
        /***company**/
	function manage_company($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {  
			$data['com_name']     = $this->input->post('com_name');
                        $data['com_address']  = $this->input->post('address');
                        $data['com_country']  = $this->input->post('country');
                        $data['com_phone1']   = $this->input->post('telephone1');
                        $data['com_phone2']   = $this->input->post('telephone2');
                        $data['com_fax']      = $this->input->post('fax');
                        $data['com_type']     = $this->input->post('comType');
                        $data['com_industry'] = $this->input->post('industry');
                        $data['entryBy']      = $this->session->userdata('user_id');
                        
			$this->db->insert('setup_company', $data);
                        logActivity('New Company Created [' . $this->input->post('com_name') . ']', $this->session->userdata('user_id'));
                        $this->session->set_flashdata('insert_message', get_phrase('company_opened_successfully'));
			redirect(base_url() . 'index.php?admin/manage_company', 'refresh'); 
		}
                
		if ($param1 == 'edit' && $param2 == 'do_update') {
                    
                        $data['com_name']     = $this->input->post('com_name');
                        $data['com_address']  = $this->input->post('address');
                        $data['com_country']  = $this->input->post('country');
                        $data['com_phone1']   = $this->input->post('telephone1');
                        $data['com_phone2']   = $this->input->post('telephone2');
                        $data['com_fax']      = $this->input->post('fax');
                        $data['com_type']     = $this->input->post('comType');
                        $data['com_industry'] = $this->input->post('industry');
                        
                        $this->db->where('com_id',$param3);
                        $this->db->update('setup_company',$data);
                        logActivity('Company Update [' . $this->input->post('com_name') . ']', $this->session->userdata('user_id'));
                        $this->session->set_flashdata('update_message',  get_phrase('data_updated_successfully'));
                        redirect(base_url() . 'index.php?admin/manage_company', 'refresh'); 
			
		} else if ($param1 == 'edit') {
			$page_data['edit_company'] = $this->db->get_where('setup_company', array(
				'com_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
                        $this->db->where('com_id', $param2);
                        $this->db->delete('setup_company');
                        logActivity('Company Deleted [' . $param3 . ']', $this->session->userdata('user_id'));
                        $this->session->set_flashdata('delete_message', get_phrase('data_deleted_successfully'));
                        redirect(base_url() . 'index.php?admin/manage_company', 'refresh');
		}
                     
                $page_data['page_name']   = 'manage_company';
                $page_data['page_title']  = get_phrase('manage_company');
                $page_data['haspermission']= $this->Operation_Model->hasPermission(4);
                if($param1 != ''):
                    $where=array('setup_company.com_id'=>$param1);
                    $page_data['compinfo']    = $this->Search_Model->joinTableData('setup_company', 'country', 'setup_company.*,country.cname', 'setup_company.com_country=country.cid', 'setup_company.com_id', 'DESC',TRUE,$where);
                else:
                    $page_data['compinfo']    = $this->Search_Model->joinTableData('setup_company', 'country', 'setup_company.*,country.cname', 'setup_company.com_country=country.cid', 'setup_company.com_id', 'DESC');
                endif;
                $page_data['country']     = $this->db->get('country')->result_array();
                $page_data['org']         = $this->Search_Model->autoSuggest('setup_company','com_id,com_name','com_name','com_id');
                $page_data['com_dup']     = $this->Operation_Model->rawQuery('SELECT setup_company.com_id,setup_company.com_name,setup_company.com_address,setup_company.com_phone1,com_phone2,setup_company.com_fax,setup_company.com_type,setup_company.com_industry,country.cname FROM setup_company LEFT JOIN `country` ON `setup_company`.`com_country`=`country`.`cid` WHERE setup_company.com_name IN ( SELECT com_name FROM setup_company GROUP BY com_name HAVING COUNT(com_id) > 1 ) AND setup_company.com_phone1 IN ( SELECT com_phone1 FROM setup_company GROUP BY com_phone1 HAVING COUNT(com_id) > 1 ) ORDER BY setup_company.com_name');
                $this->load->view('index', $page_data);

	}
        /***people**/
	function manage_people($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {  
			$data['FullName']     = $this->input->post('fullName');
                        $data['designation']  = $this->input->post('designation');
                        $data['department']   = $this->input->post('department');
                        $data['organization'] = $this->input->post('orgid');
                        $data['countryId']    = $this->input->post('country');
                        $data['mobile']       = $this->input->post('mobile1');
                        $data['mobile2']      = strlen($this->input->post('mobile2'))>5?$this->input->post('mobile2'):null;
                        $data['type']         = $this->input->post('telType');
                        $data['extension']    = $this->input->post('extention');
                        $data['telephone']    = $this->input->post('telephone');
                        $data['email']        = $this->input->post('email');
                        $data['status']  = 1;
                        $data['entryBy']      = $this->session->userdata('user_id');
                        
			$this->db->insert('people', $data);
                        $this->session->set_flashdata('insert_message', get_phrase('people_has_been_created'));
			redirect(base_url() . 'index.php?admin/manage_people', 'refresh');
		}
                
		if ($param1 == 'edit' && $param2 == 'do_update') {
                        $data['FullName']     = $this->input->post('fullName');
                        $data['designation']  = $this->input->post('designation');
                        $data['department']   = $this->input->post('department');
                        $data['organization'] = $this->input->post('orgid');
                        $data['countryId']    = $this->input->post('country');
                        $data['mobile']       = $this->input->post('mobile1');
                        $data['mobile2']      = strlen($this->input->post('mobile2'))>5?$this->input->post('mobile2'):null;
                        $data['type']         = $this->input->post('telType');
                        $data['extension']    = $this->input->post('extention');
                        $data['telephone']    = $this->input->post('telephone');
                        $data['email']        = $this->input->post('email');
                        
			$this->db->where('id', $param3);
			$this->db->update('people', $data);
			$this->session->set_flashdata('update_message', get_phrase('people_updated'));
			redirect(base_url() . 'index.php?admin/manage_people', 'refresh');
			
		} else if ($param1 == 'edit') {
			$page_data['edit_people'] = $this->db->get_where('people', array(
				'id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('id', $param2);
			$this->db->delete('people');
			$this->session->set_flashdata('delete_message', get_phrase('people_deleted'));
			redirect(base_url() . 'index.php?admin/manage_people', 'refresh');
		}
                        if($param1 != ''):
                            $where=array('people.status'=>1,'people.id'=>$param1);
                        else:
                            $where=array('people.status'=>1);
                        endif;
                        
                        $page_data['page_name']   = 'manage_people';
                        $page_data['page_title']  = get_phrase('manage_people');
                        $page_data['haspermission']= $this->Operation_Model->hasPermission(3);
                        $page_data['people']      = $this->Search_Model->getdoubleJoinData('people','setup_company','country','people.*,setup_company.com_name,country.cname','people.organization=setup_company.com_id','people.countryId=country.cid',TRUE,$where);
                        $page_data['country']     = $this->db->get('country')->result_array();
                        $page_data['org']         = $this->Search_Model->autoSuggest('setup_company','com_id,com_name','com_name','com_id');
                        $page_data['p_dup']       = $this->Operation_Model->rawQuery("SELECT p.id,p.FullName,p.designation,p.department,p.organization,p.mobile,p.mobile2,p.type,p.extension,p.telephone,p.email,p.status,c.com_name,cn.cname FROM people p LEFT JOIN setup_company c ON p.organization=c.com_id LEFT JOIN country cn ON p.countryId=cn.cid WHERE p.status=1 AND p.mobile in ( SELECT mobile FROM people GROUP BY mobile HAVING COUNT(id) > 1 AND mobile<>'' )OR p.email IN ( SELECT email FROM people GROUP BY email HAVING COUNT(id) > 1 AND email<>'' )OR p.telephone IN ( SELECT telephone FROM people GROUP BY telephone HAVING COUNT(id) > 1 AND telephone<>'' ) ORDER BY p.id");
                        $this->load->view('index', $page_data);

	}
        /***single quotation**/
	function manage_quotation($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {  
                        $qtono = $this->Operation_Model->getNextId('quotation','MAX(quotation_no)','Q');
			$data['quotation_no'] = $qtono;
                        $data['productId']    = $this->input->post('product_id');
                        $data['customerId']   = $this->input->post('customerId');
                        $data['attention']    = $this->input->post('customerId');
                        $data['attn_email']   = $this->input->post('attn_email');
                        $data['supplierId']   = $this->input->post('supplierId');
                        $data['payment_terms']= $this->input->post('payment_terms');
                        $data['note']         = $this->input->post('condition');
                        $data['qdate']        = date('Y-m-d',  time());
                        $data['exp_date']     = date('Y-d-d', strtotime("+30 days"));
                        $data['userId']       = $this->session->userdata('user_id');
                        $data['includeoption']= json_encode($this->input->post('includeoption'));
                        $data['method']       = $this->input->post('method');
                        
                        $this->db->insert('quotation', $data);
                        
                        //pdf generate//
                        $page['qcontent'] = $this->Search_Model->generatePdfcontent($qtono);

                         //now pass the data //
                        $html = $this->load->view('admin/quotation_pdf', $page, true);
                
                        $this->load->library('mpdf/mpdf');

                        $mpdf=new mPDF('c','A4','','',10,10,10,10,0,0); 

                        $mpdf->SetDisplayMode('fullpage');

                        $mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
                        
                        $pdfFilePath = "C:\Users\mannan\Downloads/".$qtono.".pdf";
//                        $pdfFilePath = FILE_PATH.$qtono.".pdf";
                        //$mpdf=new mPDF();
                        $mpdf->WriteHTML($html);
                        $mpdf->Output($pdfFilePath, 'F');
                        
                        //email
                        if($this->input->post('method')==1 && $this->input->post('attn_email')<>NULL):
                            $email = $this->Email_Model->quotation_email($this->input->post('attn_email'),$qtono);
                        else:
                            echo '<a href="<?php base_url()."uploads/quotation/00000010.pdf"?> download="mn"></a>';
                        endif;
                        
                        $this->session->set_flashdata('insert_message', get_phrase('Quotations sent successfully'));
			redirect(base_url() . 'index.php?admin/manage_quotation', 'refresh');
                        
                        exit;
                  
		}
                
		if ($param1 == 'edit' && $param2 == 'do_update') {
/*                       $data['quotation_no'] = $this->input->post('quotation_no');
                        $data['customerId']   = $this->input->post('customerId');
                        $data['productId']    = $this->input->post('product');
                        $data['userId']       = $this->session->userdata('user_id');
                        $data['method']       = $this->input->post('method');*/
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
//			$this->db->where('landlord_id', $param2);
//			$this->db->delete('p_landlord');
//			$this->session->set_flashdata('flash_message', get_phrase('property_deleted'));
//			redirect(base_url() . 'index.php?admin/manage_landlord', 'refresh');
		}
                
                if ($param1 == 'list') {
                    $page_data['page_name']   = 'quotation_list';
                    $page_data['page_title']  = get_phrase('quotation_list');
                    if($param2 != ''):
                        $page_data['quotation']   = $this->Search_Model->generatePdfcontent($param2);
                    else:
                        $page_data['quotation']   = $this->Search_Model->quotationList(); 
                    endif;
                    $this->load->view('index', $page_data);
                }else{
                    $page_data['page_name']   = 'manage_quotation';
                    $page_data['page_title']  = get_phrase('manage_quotation');
                    $page_data['products']    = $this->Search_Model->autoSuggest('products','item_code,item_name','item_name','item_code');
                    $page_data['customer']    = $this->Search_Model->autoSuggest('setup_company','com_id,com_name','com_name','com_id');
                    $page_data['pterms']      = $this->db->get('payment_terms')->result_array();
                    $this->load->view('index', $page_data);
                }
	}
        /***multiple_quotation**/
	function multiple_quotation($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
                    
                    foreach($this->input->post('customer') as $key=>$value):
                        
                        $qtono = $this->Operation_Model->getNextId('quotation','MAX(quotation_no)','Q');
			$data['quotation_no'] = $qtono;
                        $data['productId']    = $this->input->post('product_id');
                        $data['customerId']   = $this->input->post('customer')[$key];
                        $data['attention']    = $this->input->post('contact')[$key];
                        $data['attn_email']   = $this->input->post('attn_email')[$key];
                        $data['supplierId']   = $this->input->post('supplierId');
                        $data['payment_terms']= $this->input->post('payment_terms');
                        $data['note']         = $this->input->post('condition');
                        $data['qdate']        = date('Y-m-d',  time());
                        $data['exp_date']     = date('Y-m-d', strtotime("+30 days"));
                        $data['userId']       = $this->session->userdata('user_id');
                        $data['includeoption']= json_encode($this->input->post('includeoption'));
                        $data['method']       = $this->input->post('method');
                        
                        $this->db->insert('quotation', $data);
                        
                        //pdf generate//
                        $page['qcontent'] = $this->Search_Model->generatePdfcontent($qtono);

                         //now pass the data //
                        $html = $this->load->view('admin/quotation_pdf', $page, true);
                
                        $this->load->library('mpdf/mpdf');

                        $mpdf=new mPDF('c','A4','','',10,10,10,10,0,0); 

                        $mpdf->SetDisplayMode('fullpage');

                        $mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
                        
                        $pdfFilePath = "C:\Users\mannan\Downloads/".$qtono.".pdf";
//                        $pdfFilePath = FILE_PATH.$qtono.".pdf";
                        
                        $mpdf->WriteHTML($html);
                        $mpdf->Output($pdfFilePath, 'F');
                        
                        //email
                        if($this->input->post('method')==1 && $this->input->post('attn_email')<>NULL):
                            $email = $this->Email_Model->quotation_email($this->input->post('attn_email')[$key],$qtono);
                        else:
                            echo '<a href="<?php base_url()."uploads/quotation/00000010.pdf"?> download="mn"></a>';
                        endif;
                        
                        endforeach; 
                        
                        $this->session->set_flashdata('insert_message', get_phrase('Quotations sent successfully'));
			redirect(base_url() . 'index.php?admin/multiple_quotation', 'refresh');
                        exit;
		}
                
                    $page_data['page_name']   = 'manage_mquotation';
                    $page_data['page_title']  = get_phrase('manage_multiple_quotation');
                    $page_data['products']    = $this->Search_Model->autoSuggest('products','item_code,item_name','item_name','item_code');
                    $page_data['customer']    = $this->Search_Model->autoSuggest('setup_company','com_id,com_name','com_name','com_id');
                    $page_data['customerauto']= $this->db->get('setup_company')->result_array();
                    $page_data['pterms']      = $this->db->get('payment_terms')->result_array();
                    $this->load->view('index', $page_data);
	}
        /***orders**/
	function manage_orders($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') { 
                        $orderNo = $this->Operation_Model->getNextId('sales_orders','MAX(order_no)','O');
                        
			$data['order_no']    = $orderNo;
                        $data['supplier_id'] = $this->input->post('supplierId');
                        $data['customer_id'] = $this->input->post('customerId');
                        $data['ord_date']    = date('Y-m-d',strtotime($this->input->post('order_date')));
                        $data['payment_terms']= $this->input->post('payment_terms');
                        $data['order_status'] = 1;
                        $data['commission_status']= 1;
                        
			$this->db->insert('sales_orders', $data);
                        
                        foreach($this->input->post("prodcut") as $key=>$value){
                            
                            $sd['order_no']         = $orderNo;
                            $sd['item_code']        = $this->input->post('item_code')[$key];
                            $sd['description']      = $this->input->post('prodcut')[$key];
                            $sd['unit_price']       = $this->input->post('prodcut_price')[$key];
                            $sd['quantity']         = $this->input->post('sale_qty')[$key];
                            $sd['comission_type']   = $this->input->post('comission_type')[$key];
                            $sd['commission_amount']= $this->input->post('commission')[$key];
                            $sd['item_total']       = $this->input->post('total_price')[$key];
                            
                            $total += $this->input->post('total_price')[$key]; 
                            $comtotal += $this->input->post('commission')[$key]; 
                            
                            $this->db->insert('sales_order_details', $sd);
                        } 
                            $tamt['total']=$total;
                            $tamt['commission_total']=$comtotal;
                            
                        $this->db->where('order_no', $orderNo);
			$this->db->update('sales_orders', $tamt);
                        
                        $this->session->set_flashdata('insert_message', get_phrase('order_has_been_placed'));
			redirect(base_url() . 'index.php?admin/manage_orders', 'refresh');
		}
                
		if ($param1 == 'edit' && $param2 == 'do_update') {
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
			$this->db->where('id', $param2);
			$this->db->delete('sales_orders');
			$this->session->set_flashdata('delete_message', get_phrase('Order deleted successfully'));
			redirect(base_url() . 'index.php?admin/manage_orders/list', 'refresh');
		}
                //for to status update
                if ($param1 == 'action') {
                        $ac['order_status'] = $this->input->post('order_status');
                    if($this->input->post('order_status')==2){
                        $ac['lc_number'] = $this->input->post('lc_number');
                        $ac['lc_issue_date'] = date('Y-m-d',  strtotime($this->input->post('lc_issue_date')));
                        $ac['lc_bank'] = $this->input->post('lc_bank');
                        $ac['ldate_shipment'] = date('Y-m-d',  strtotime($this->input->post('ldate_shipment')));
                        $ac['lc_exp_date'] = date('Y-m-d',  strtotime($this->input->post('lc_exp_date')));
                    }if($this->input->post('order_status')==6){
                        $ac['vessel_info'] = $this->input->post('vessel_info');
                    }
                        $ac['updateBy'] = $this->session->userdata('user_id');
                        $ac['updateDate'] = time();
                        $id =  $this->input->post('oid');
                        
			$this->db->where('id', $id);
			$this->db->update('sales_orders', $ac);
			$this->session->set_flashdata('app_message', get_phrase('status_updated_successfully'));
			redirect(base_url() . 'index.php?admin/manage_orders/list', 'refresh');
		}
               if ($param1 == 'list') {
                    $page_data['page_name']   = 'order_list';
                    $page_data['page_title']  = get_phrase('order_list');
                    $page_data['haspermission']= $this->Operation_Model->hasPermission(21);
                    if($param2 != ''):
                        $page_data['order']      = $this->Operation_Model->rawQuery('select s.*,c.com_name,p.terms from sales_orders s,setup_company c, payment_terms p where s.supplier_id = c.com_id and s.payment_terms = p.terms_id and s.id='.$param2);
                    else:
                        $page_data['order']      = $this->Operation_Model->rawQuery('select s.*,c.com_name,p.terms from sales_orders s,setup_company c, payment_terms p where s.supplier_id = c.com_id and s.payment_terms = p.terms_id');
                    endif;
                    $this->load->view('index', $page_data);
                }else if ($param1 == 'commission') {
                    $page_data['page_name']   = 'commission_list';
                    $page_data['page_title']  = get_phrase('commission_list');
                    $page_data['haspermission']= $this->Operation_Model->hasPermission(15);
                    $page_data['commission']      = $this->Operation_Model->rawQuery('select s.*,c.com_name,p.terms from sales_orders s,setup_company c, payment_terms p where s.supplier_id = c.com_id and s.payment_terms = p.terms_id order by s.id desc');     
                    $this->load->view('index', $page_data);
                }else {
                    $page_data['page_name']   = 'manage_order';
                    $page_data['page_title']  = get_phrase('manage_order');
                    $page_data['haspermission']= $this->Operation_Model->hasPermission(13);
                    $page_data['products']    = $this->db->get('products')->result_array();
                    $page_data['pterms']      = $this->db->get('payment_terms')->result_array();
                    $page_data['org']         = $this->Search_Model->autoSuggest('setup_company','com_id,com_name','com_name','com_id');
                    $this->load->view('index', $page_data);
                }
	}
        /***category_management********/
	function category_management($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
                    
                        $data['cat_name']= $this->input->post('cat_name');
			$data['status']  = $this->input->post('status');
                        
			$this->db->insert('item_categories', $data);
			$this->session->set_flashdata('flash_message', get_phrase('category_created'));
			redirect(base_url() . 'index.php?admin/category_management', 'refresh');
		}
            
		if ($param1 == 'edit' && $param2 == 'do_update') {
//                        $data['business_name']= $this->input->post('business_name');
//			$data['first_name']   = $this->input->post('first_name');
//                        $data['last_name']    = $this->input->post('last_name');
//                        $data['dob']          = $this->input->post('birth_date');
//                      
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

                $page_data['page_name']   = 'manage_categories';
                $page_data['page_title']  = get_phrase('manage_categories');
                $page_data['cat'] = $this->db->get('item_categories')->result_array();
                $this->load->view('index', $page_data);
		
	}
        /***PRODUCT MANAGEMENT********/
	function product_management($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
			$data['item_code']  = strtoupper($this->input->post('item_code'));
			$data['item_name']  = $this->input->post('item_name');
                        $data['description']= $this->input->post('description');
			$data['category']   = $this->input->post('category');
                        $data['origin']     = $this->input->post('origin');
			$data['tariff_code']= $this->input->post('tariff_code');
                        $data['price']      = $this->input->post('price');
                        $data['original_price'] = $this->input->post('original_price');
			$data['status']     = 1;
                        
			$this->db->insert('products', $data);
                        $this->session->set_flashdata('insert_message', get_phrase('product_inserted_successfully'));
			redirect(base_url() . 'index.php?admin/product_management', 'refresh');
                   
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
                    
			$data['item_code']  = strtoupper($this->input->post('item_code'));
			$data['item_name']  = $this->input->post('item_name');
                        $data['description']= $this->input->post('description');
			$data['category']   = $this->input->post('category');
                        $data['origin']     = $this->input->post('origin');
			$data['tariff_code']= $this->input->post('tariff_code');
                        $data['price']      = $this->input->post('price');
                        $data['original_price'] = $this->input->post('original_price');
			
			$this->db->where('pid', $param3);
			$this->db->update('products', $data);
			$this->session->set_flashdata('update_message', get_phrase('product_updated_successfully'));
			redirect(base_url() . 'index.php?admin/product_management', 'refresh');
			
		} else if ($param1 == 'edit') {
			$page_data['edit_product'] = $this->db->get_where('products', array(
				'pid' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('pid', $param2);
			$this->db->delete('products');
			$this->session->set_flashdata('delete_message', get_phrase('product_deleted_successfully'));
			redirect(base_url() . 'index.php?admin/product_management', 'refresh');
		}
                
                $page_data['page_name']   = 'manage_products';
                $page_data['page_title']  = get_phrase('products');
                $page_data['haspermission']= $this->Operation_Model->hasPermission(22);
                if($param1 != ''):
                    $page_data['products']    = $this->Search_Model->getProducts(TRUE,array('pid'=>$param1));
                else:
                    $page_data['products']    = $this->Search_Model->getProducts(FALSE);
                endif;
                $page_data['cat']         = $this->db->get('item_categories')->result_array();
                $page_data['country']     = $this->db->get('country')->result_array();
                $page_data['sku']         = $this->db->get('product_sku')->result_array();
                $page_data['incoterm']    = $this->db->get('incoterm')->result_array();
                $page_data['ports']       = $this->Search_Model->autoSuggest('ports','id,port_name','port_name','id');
                $page_data['pid']         = $this->Search_Model->autoSuggest('products','item_code,item_code','item_code','item_code');
                $page_data['pro_dup']     = $this->Operation_Model->rawQuery('SELECT p.pid, p.item_code, p.item_name, p.description, p.category, p.origin, p.tariff_code, p.price, p.original_price, p.quantity, p.status,c.cat_name, cn.cname FROM products p LEFT JOIN item_categories c ON c.cat_id = p.category LEFT JOIN country cn ON cn.cid = p.origin WHERE p.item_name IN ( SELECT item_name FROM products GROUP BY item_name HAVING COUNT( pid ) >1)ORDER BY p.item_name');
                $this->load->view('index', $page_data); 
                
	}
	/***EXPENSE MANAGEMENT********/
	function expense_management($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
                            $bilNo = $this->Operation_Model->getNextId('expense_bill_master','MAX(bill_no)','B');
                    
                            $msdata['bill_no']        = $bilNo;
                            $msdata['user_id']        = $this->session->userdata('user_id');
                            $msdata['mgr_id']         = $this->Search_Model->getMgrId($this->session->userdata('user_id'));
                            
                            $this->db->insert('expense_bill_master', $msdata);
                            
                    foreach($this->input->post("exp_type") as $key=>$value){
                            
                            $data['bill_no']        = $bilNo;
                            $data['exp_type']       = $this->input->post('exp_type')[$key];
                            $data['from_date']      = date('Y-m-d',strtotime($this->input->post('from_date')[$key]));
                            $data['dst_from']       = $this->input->post('dst_from')[$key];
                            $data['dst_to']         = $this->input->post('dst_to')[$key];
                            $data['trans_mode']     = $this->input->post('trans_mode')[$key];
                            $data['exp_details']    = $this->input->post('details')[$key];
                            $data['purpose']        = $this->input->post('purpose')[$key];
                            $data['currency']       = $this->input->post('currency')[$key];
                            $data['amount']         = $this->input->post('amount')[$key];
                            $data['receipt_available']= $this->input->post('ravailable')[$key];
                            
                            $totalAmnt += $this->input->post('amount')[$key];;
                            
                            $this->db->insert('expense_bill_details', $data);
                      } 
                            
                            $uma['total_amount']= $totalAmnt;
                             
                            $this->db->where('bill_no', $bilNo);
                            $this->db->update('expense_bill_master', $uma);
                        
                        $this->session->set_flashdata('flash_message', get_phrase('expense_bill_created_successfully'));
                        redirect(base_url() . 'index.php?admin/expense_management', 'refresh');
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
//			$data['property_type']        = $this->input->post('property_type');
                      
                        
//			$this->db->where('property_id', $param3);
//			$this->db->update('property', $data);
//			$this->session->set_flashdata('flash_message', get_phrase('property_updated'));
//			redirect(base_url() . 'index.php?admin/manage_property', 'refresh');
			
		} else if ($param1 == 'edit') {
			$page_data['edit_property'] = $this->db->get_where('property', array(
				'property_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
//			$this->db->where('property_id', $param2);
//			$this->db->delete('property');
//			$this->session->set_flashdata('flash_message', get_phrase('expense_deleted'));
//			redirect(base_url() . 'index.php?admin/expense_management', 'refresh');
		}   
                //for expense approve
                if ($param1 == 'action') {
                    if($this->input->post('payment')==2):
                        $ac['status'] = $this->input->post('payment');
                    elseif($this->input->post('action')==1 || $this->input->post('action')==3):
                        $ac['status'] = $this->input->post('action');
                        $ac['reason'] = $this->input->post('action')==3?$this->input->post('reason'):NULL;
                    endif;
                        $ac['action_by'] = $this->session->userdata('user_id');
                        $ac['action_date'] = time();
                        
                        $id =  $this->input->post('expid');
                        
			$this->db->where('exp_id', $id);
			$this->db->update('expense_bill_master', $ac);
			$this->session->set_flashdata('app_message', get_phrase('expense_approved_successfully'));
			redirect(base_url() . 'index.php?admin/expense_management/list', 'refresh');
		} 
                if ($param1 == 'list') {
                    $page_data['page_name']   = 'expense_list';
                    $page_data['page_title']  = get_phrase('expense_list');
                    $page_data['cur']         = $this->db->get('currencies')->result_array();
                    $page_data['mode']        = $this->db->get('transport_mode')->result_array();
                    if($this->session->userdata('access_level')==1 || $this->session->userdata('access_level')==2):
                        $page_data['expense']     = $this->db->get('expense_bill_master')->result_array();
                    elseif($this->session->userdata('access_level')==3):
                        $page_data['expense']     = $this->db->where('mgr_id',$this->session->userdata('user_id'))->or_where('user_id',$this->session->userdata('user_id'))->get('expense_bill_master')->result_array();
                    elseif($this->session->userdata('access_level')==4):
                        $page_data['expense']     = $this->Search_Model->getAllDataFromTableBycondition('expense_bill_master','user_id',$this->session->userdata('user_id'));
                    endif;
                    
                    $this->load->view('index', $page_data);
                }  else {
                    $page_data['page_name']   = 'manage_expense';
                    $page_data['page_title']  = get_phrase('create_expense');
                    $page_data['cur']         = $this->db->get('currencies')->result_array();
                    $page_data['mode']        = $this->db->get('transport_mode')->result_array();
                    $this->load->view('index', $page_data); 
                }
                
	}
	/***MANAGE NOTICEBOARD, WILL BE SEEN BY ALL ACCOUNTS DASHBOARD**/
	function todo_management($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		
		if ($param1 == 'create') {
			$jobNo = $this->Operation_Model->getNextId('todo_list','MAX(job_no)','J');
                    
                        $data['job_no']         = $jobNo;
                        $data['title']          = $this->input->post('title');
                        $data['description']    = $this->input->post('description');
                        $data['orgid']          = $this->input->post('orgid');
                        $data['start_date']     = date('Y-m-d',strtotime($this->input->post('start_date')));
                        $data['due_date']       = date('Y-m-d',strtotime($this->input->post('due_date')));
                        $data['assignedto']     = $this->input->post('assignedto');
                        $data['assignedby']     = $this->session->userdata('user_id');
                        $data['priority']       = $this->input->post('priority');
                        $data['status']         = $this->input->post('status');
                        $data['entry_date']     = time();
                        $data['entry_by']       = $this->session->userdata('user_id');
                        
                        $this->db->insert('todo_list', $data);
                        
			$this->session->set_flashdata('insert_message', get_phrase('todo_created'));
			redirect(base_url() . 'index.php?admin/todo_management', 'refresh');
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
                    
			$data['title']          = $this->input->post('title');
                        $data['description']    = $this->input->post('description');
                        $data['orgid']          = $this->input->post('orgid');
                        $data['start_date']     = date('Y-m-d',strtotime($this->input->post('start_date')));
                        $data['due_date']       = date('Y-m-d',strtotime($this->input->post('due_date')));
                        $data['assignedto']     = $this->input->post('assignedto');
                        $data['assignedby']     = $this->session->userdata('user_id');
                        $data['priority']       = $this->input->post('priority');
                        $data['status']         = $this->input->post('status');
                        
			$this->db->where('id', $param3);
			$this->db->update('todo_list', $data);
			$this->session->set_flashdata('update_message', get_phrase('todo_updated'));
			redirect(base_url() . 'index.php?admin/todo_management', 'refresh');
		} else if ($param1 == 'edit') {
			$page_data['edit_todo'] = $this->db->get_where('todo_list', array(
				'id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('id', $param2);
			$this->db->delete('todo_list');
			$this->session->set_flashdata('delete_message', get_phrase('todo_deleted'));
			redirect(base_url() . 'index.php?admin/todo_management', 'refresh');
		}
                //for to status update
                if ($param1 == 'action') {
                        $ac['status'] = $this->input->post('statusUpdate');
                        $ac['update_by'] = $this->session->userdata('user_id');
                        $ac['update_date'] = time();
                        
                        $id =  $this->input->post('tid');
                        
			$this->db->where('id', $id);
			$this->db->update('todo_list', $ac);
			$this->session->set_flashdata('app_message', get_phrase('status_updated_successfully'));
			redirect(base_url() . 'index.php?admin/todo_management', 'refresh');
		}
                
		$page_data['page_name']  = 'todo_manager';
		$page_data['page_title'] = get_phrase('todo_manager');
                $page_data['haspermission']= $this->Operation_Model->hasPermission(18);
                if($this->session->userdata('access_level')==1 || $this->session->userdata('access_level')==2):
                    $page_data['user']         = $this->db->get('users')->result_array();
                    $page_data['todo']         = $this->db->get('todo_list')->result_array();
                else:
                    $page_data['user']         = $this->Search_Model->getAllDataFromTableBycondition('users','reporting_manager',$this->session->userdata('user_id'));
                    $page_data['todo']         = $this->Search_Model->getAllDataFromTableBycondition('todo_list','entry_by',$this->session->userdata('user_id'));
                endif;
                $page_data['org']       = $this->Search_Model->autoSuggest('setup_company','com_id,com_name','com_name','com_id');
		$this->load->view('index', $page_data);
	}
        
	
	/*****SITE/SYSTEM SETTINGS*********/
	function system_settings($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		
		if ($param2 == 'do_update') {
			$this->db->where('type', $param1);
			$this->db->update('settings', array(
				'description' => $this->input->post('description')
			));
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');
		}
		if ($param1 == 'upload_logo') {
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');
		}
		$page_data['page_name']  = 'system_settings';
		$page_data['page_title'] = get_phrase('system_settings');
		$page_data['settings']   = $this->db->get('settings')->result_array();
		$this->load->view('index', $page_data);
	}
	
	/******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
	function manage_profile($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'update_profile_info') {
			$data['name']    = $this->input->post('name');
			$data['email']   = $this->input->post('email');
			$data['address'] = $this->input->post('address');
			$data['phone']   = $this->input->post('phone');
			
			$this->db->where('admin_id', $this->session->userdata('user_id'));
			$this->db->update('admin', $data);
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));
			
			redirect(base_url() . 'index.php?admin/manage_profile/', 'refresh');
		}
		if ($param1 == 'change_password') {
			$data['password']             = $this->input->post('password');
			$data['new_password']         = $this->input->post('new_password');
			$data['confirm_new_password'] = $this->input->post('confirm_new_password');
			
			$current_password = $this->db->get_where('admin', array(
				'admin_id' => $this->session->userdata('user_id')
			))->row()->password;
			if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
				$this->db->where('admin_id', $this->session->userdata('user_id'));
				$this->db->update('admin', array(
					'password' => $data['new_password']
				));
				$this->session->set_flashdata('flash_message', get_phrase('password_updated'));
			} else {
				$this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));
			}
			
			redirect(base_url() . 'index.php?admin/manage_profile/', 'refresh');
		}
		$page_data['page_name']    = 'manage_profile';
		$page_data['page_title']   = get_phrase('manage_profile');
		$page_data['edit_profile'] = $this->db->get_where('admin', array(
			'admin_id' => $this->session->userdata('user_id')
		))->result_array();
                
		$this->load->view('index', $page_data);
	}
        
        //helping funtion
        public function expensebillDetails($param1) {
            $billno = substr(sprintf('%08d', $param1),0,8);
            $whereData = array('expense_bill_details.bill_no' => $billno);     
            $expense_dtl = $this->Search_Model->getdoubleJoinData('expense_bill_details', 'currencies','transport_mode','expense_bill_details.*,currencies.code,transport_mode.transport_mode','expense_bill_details.currency=currencies.id','expense_bill_details.trans_mode=transport_mode.id',TRUE,$whereData);
            echo json_encode($expense_dtl);
        }
        //get quotation prodcut
        public function getqProdcuts($param) {
            $pro = $this->Search_Model->getProducts(TRUE,array('item_code'=>$param));
            echo json_encode($pro);
        }
        //get quotation customer
        public function getqCustomers($param) {
            $cus = $this->Search_Model->joinTableData('setup_company', 'country', 'setup_company.*,country.cname', 'setup_company.com_country=country.cid', 'setup_company.com_id', 'DESC',TRUE,array('com_id'=>$param));
            echo json_encode($cus);
        }
        //get quotation people
        public function getqPeople($param) {
            $people= $this->Search_Model->getmultiConditionData('id,FullName', 'people', array('organization'=>$param));
            echo json_encode($people);
        }
        //get quotation multiple people
        public function getmPeople($param) {
            $people= $this->Search_Model->getmultiConditionData('id,FullName', 'people', array('organization'=>$param,'email !='=>''));
            echo json_encode($people);
        }
        //get email
        public function getEmailaddress($param) {
            $email= $this->Search_Model->getmultiConditionData('email', 'people', array('id'=>$param));
            echo json_encode($email);
        }
        
        //get email
        public function gSearch() {
                        $page['page_title']   = get_phrase('quotation_pdf');
                        $page['qcontent']   = $this->Search_Model->generatePdfcontent('00000008');
            //		
            //		$this->load->view('index', $page_data);
                       // $this->load->view('admin/templatedoc', $page_data);
            
                        echo $html = $this->load->view('admin/templatedoc', $page, true);
                        
//                        $this->load->library('mpdf/mpdf');
//
//                        $mpdf=new mPDF('c','A4','','',10,10,10,10,0,0); 
//
//                        $mpdf->SetDisplayMode('fullpage');
//
//                        //$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
//                        // LOAD a stylesheet
//                        $stylesheet = file_get_contents('mpdfstyleA4.css');
//                        $mpdf->WriteHTML($stylesheet);	// The parameter 1 tells that this is css/style only and no body/html/text
//                        //$mpdf=new mPDF();
//                        $mpdf->WriteHTML($html);
//
//                        $mpdf->Output();
//                        exit;
            
//            $page_data['page_name']    = 'admin/quotation_pdf';
	    
//            echo $this->input->post('query');
//            $data  = $this->Operation_Model->rawQuery("SELECT id,city_name,country_name FROM city WHERE country_name like'".$param."'"); 
//                      print_r($data);
//            echo $this->Search_Model->raihan();
//            echo json_encode($data);
        }
        
        public function globalSearch($search) {
            $out = "";
            $total = 0;
            $query = $this->db->query("SHOW TABLES");
            if($query->num_rows() > 0){
                foreach ($query->result_array() as $value) {
                    $table = $value['Tables_in_tmi_db'];
                    $sql_search = "select * from ".$table." where ";
                    $sql_search_fields = Array();
                    $sql2 = "SHOW COLUMNS FROM ".$table;
                    $rs2 =$this->db->query($sql2);
                    if($rs2->num_rows() > 0){
                        foreach ($rs2->result_array() as $val) {
                            $colum = $val['Field'];
                            $sql_search_fields[] = $colum." like '$search'";
                            if(strpos($colum,$search))
                            {
                                echo "FIELD NAME: ".$colum."\n";
                            }
                        }  
                    }
                    $sql_search .= implode(" OR ", $sql_search_fields);
                    $rs3 = $this->db->query($sql_search);
                    if($rs3->num_rows() > 0)
                    {
                        $out .= $table.": ".$rs3->num_rows()."\n";
                        if($rs3->num_rows() > 0){
                            $total += $rs3->num_rows();
                            $out.= print_r($rs3->result_array(),1);
                        }
                    }
                }
            }

//    echo '<pre>';
//print_r($rs3->result_array());
//echo '</pre>';
    echo json_encode($out);
        }
        /***ADMIN DASHBOARD***/
	function ajaxpratice($param)
	{
	
                $gssear = $this->Search_Model->allautoSuggest($param);
		echo $gssear;
	}
        
        public function hasan($sstring) {
            $sql_search = array(
            "select com_id, com_name n1,com_phone1 n2,com_phone2 n3,'setup_company' as tbl from setup_company where com_name like '%$sstring%' OR com_phone1 like '%$sstring%' OR com_phone2 like '%$sstring%'"
//            "select *,search_key,'city' as tbl,city_name as n1 from city where search_key like 'India'",
//            "select *,search_key,'country' as tbl,cname as n1 from country where search_key like 'India'"
            );
            
            //typehead json
            $org_data = '[';
            foreach($sql_search as $val):
                $rs3 = $this->db->query($val);
                $row = $rs3->row();

                foreach( $rs3->result_array() as $row):
                    $data[] = $row['n1'];
//                    echo "<li>$row[n1]</br>$row[n2]</br>$row[n3]</li>";
//                   <a href=$row[com_id]>$row[n1]</a></li>";
                
                endforeach;
            endforeach;
            echo json_encode($data);
        }
        
        public function search(){
                 $data['result'] = $this->Search_Model->perform_search($this->input->post('q'));
                 $this->load->view('admin/search', $data);
        }
}

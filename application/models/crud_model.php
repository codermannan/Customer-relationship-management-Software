<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }
	function get_type_name_by_id($type,$type_id='',$field='name')
	{
		return	$this->db->get_where($type,array($type.'_id'=>$type_id))->row()->$field;	
	}
	
	
	function create_log()
	{
                date_default_timezone_set("Asia/Dhaka");
                $data['user_id']      = $this->session->userdata('user_id');
		$data['login_date']   = time();
                $data['login_session']= $this->session->userdata('session_id');
		$data['login_ip']     =	$_SERVER["REMOTE_ADDR"];
//		$location 	   =	new SimpleXMLElement(file_get_contents('http://freegeoip.net/xml/'.$_SERVER["REMOTE_ADDR"]));
//		$data['login_location']  =	$location->City.' , '.$location->CountryName;
		$this->db->insert('login_history' , $data);
                return $this->db->insert_id();
	}
	function get_system_settings()
	{
		$query	=	$this->db->get('settings' );
		return $query->result_array();
	}
	
		
	
	////////BACKUP RESTORE/////////
	function create_backup($type)
	{
		$this->load->dbutil();
		
		
		$options = array(
                'format'      => 'txt',             // gzip, zip, txt
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );
		
		 
		if($type == 'all')
		{
			$tables = array('');
			$file_name	=	'system_backup';
		}
		else 
		{
			$tables = array('tables'	=>	array($type));
			$file_name	=	'backup_'.$type;
		}

		$backup =& $this->dbutil->backup(array_merge($options , $tables)); 


		$this->load->helper('download');
		force_download($file_name.'.sql', $backup);
	}
	
	
	/////////RESTORE TOTAL DB/ DB TABLE FROM UPLOADED BACKUP SQL FILE//////////
	function restore_backup()
	{
		move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/backup.sql');
		$this->load->dbutil();
		
		
		$prefs = array(
            'filepath'						=> 'uploads/backup.sql',
			'delete_after_upload'			=> TRUE,
			'delimiter'						=> ';'
        );
		$restore =& $this->dbutil->restore($prefs); 
		unlink($prefs['filepath']);
	}
	
	/////////DELETE DATA FROM TABLES///////////////
	function truncate($type)
	{
		if($type == 'all')
		{
			$this->db->truncate('student');
			$this->db->truncate('mark');
			$this->db->truncate('teacher');
			$this->db->truncate('subject');
			$this->db->truncate('class');
			$this->db->truncate('exam');
			$this->db->truncate('grade');
		}
		else
		{	
			$this->db->truncate($type);
		}
	}
	
	
	////////IMAGE URL//////////
	function get_image_url($type = '' , $id = '')
	{
		if(file_exists('uploads/'.$type.'_image/'.$id.'.jpg'))
			$image_url	=	base_url().'uploads/'.$type.'_image/'.$id.'.jpg';
		else
			$image_url	=	base_url().'uploads/user.jpg';
			
		return $image_url;
	}
        
        /////getMenu////////
        function getMenu() {
            $this->db->select('menu.menu_id,menu.menu_name,menu.sub_menu,menu.menu_file,menu.css_class');
            $this->db->from('menu_access');
            $this->db->join('menu','menu_access.menu_id=menu.menu_id','left');
            $this->db->where('menu_access.role_id',$this->session->userdata('access_level'));
            $this->db->order_by('menu.morder','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }
        /////SubMenu////////
        function getSubmenu($id) {
            $this->db->select('menu.menu_id,menu.menu_name,menu.sub_menu,menu.menu_file');
            $this->db->from('menu_access');
            $this->db->join('menu','menu_access.menu_id=menu.menu_id','left');
            $this->db->where(array('menu.sub_menu'=>$id,'menu_access.role_id'=>$this->session->userdata('access_level')));
            $this->db->order_by('menu.morder','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }
	
	
}


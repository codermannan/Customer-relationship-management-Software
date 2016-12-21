<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_Model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }
        function quotation_email($email = '',$qno)
	{
		$system_name	=	$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;
		
		$email_msg		=	"Welcome to ".$system_name."<br />";
		$email_msg		.=	"This is test email"."<br />";
		
		$email_sub		=	"Quotation # ".$qno;
		$email_to		=	$email;

		$this->do_email($qno, $email_msg , $email_sub , $email_to);
	}
        
	function account_opening_email($account_type = '' , $email = '')
	{
		$system_name	=	$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;
		
		$email_msg		=	"Welcome to ".$system_name."<br />";
		$email_msg		.=	"Your account type : ".$account_type."<br />";
		$email_msg		.=	"Your login password : ".$this->db->get_where($account_type , array('email' => $email))->row()->password."<br />";
		$email_msg		.=	"Login Here : ".base_url()."<br />";
		
		$email_sub		=	"Account opening email";
		$email_to		=	$email;
		
		$this->do_email($email_msg , $email_sub , $email_to);
	}
	
	function password_reset_email($account_type = '' , $email = '')
	{
		$query			=	$this->db->get_where($account_type , array('email' => $email));
		if($query->num_rows() > 0)
		{
			$password	=	$query->row()->password;
			$email_msg	=	"Your account type is : ".$account_type."<br />";
			$email_msg	.=	"Your password is : ".$password."<br />";
			
			$email_sub	=	"Password reset request";
			$email_to	=	$email;
			$this->do_email($email_msg , $email_sub , $email_to);
			return true;
		}
		else
		{	
			return false;
		}
	}
	
	/***custom email sender****/
	function do_email($qtono, $msg=NULL, $sub=NULL, $to=NULL, $from=NULL)
	{
		
                $config = array();
                $config['useragent']            = "CodeIgniter";
                $config['mailpath']		= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
                $config['protocol']		= "ssmtp";
                $config['smtp_host']            = 'ssl://ssmtp.gmail.com';
                $config['smtp_timeout']         = '7';
                $config['smtp_user']            = 'mannandiu@gmail.com';
                $config['smtp_pass']            = 'Weblogic@5514';
                $config['smtp_port']            = "587";
                $config['mailtype']		= 'html';
                $config['charset']		= 'utf-8';
                $config['newline']		= "\r\n";
                $config['validation']           = TRUE;
                $config['wordwrap']		= TRUE;

                $this->load->library('email');

                $this->email->initialize($config);

		$system_name	=	$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;
		if($from == NULL)
			$from		=	$this->db->get_where('settings' , array('type' => 'system_email'))->row()->description;
		
		$this->email->from($from, $system_name);
		$this->email->from($from, $system_name);
		$this->email->to($to);
		$this->email->subject($sub);
		
		$msg	=	$msg."<br /><br /><br /><br /><br /><br /><br /><hr /><center><a href=\"http://datastatebd.com\">&copy; 2016 Time International</a></center>";
		$this->email->message($msg);
                
		$this->email->attach("C:\Users\mannan\Downloads/".$qtono.".pdf");
//                $this->email->attach(FILE_PATH.$qtono.".pdf");
                
		$this->email->send();
		
//		echo $this->email->print_debugger();
	}
}


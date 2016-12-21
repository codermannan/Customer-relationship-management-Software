<?php
class Report_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    // get total hour signin //his_id,user_id,login_date,logout_date,login_session,login_ip
     public function totalSigninHour($tuserid, $date1, $date2){
        
        $this->db->select('login_date,logout_date');
        $this->db->from('login_history');
        $this->db->where('user_id ', $tuserid);
        $this->db->where('logout_date !=','');
        $this->db->where('login_date >=', $date1);
        $this->db->where('login_date <=', $date2);
        $this->db->order_by('his_id', 'asc');
        $query = $this->db->get();
        foreach ($query->result_array() as $lval):
            $to_time   = $lval['logout_date'];
            $from_time = $lval['login_date'];
            $signinhour += round(abs($to_time - $from_time) / 60/60,2);
        endforeach;
        return $signinhour;

     }
     // get total hour signin //his_id,user_id,login_date,logout_date,login_session,login_ip
     public function firstSigninTime($tuserid, $date1, $date2){
        
        $this->db->select('MIN(login_date),MAX(logout_date)');
        $this->db->from('login_history');
        $this->db->where('user_id ', $tuserid);
        $this->db->where('logout_date !=','');
        $this->db->where('login_date >=', $date1);
        $this->db->where('login_date <=', $date2);
        $this->db->order_by('his_id', 'asc');
        $query = $this->db->get();
        return $query->row_array();
     }
     // get total quotation sent
     public function totalQuotationSent($tuserid, $date1, $date2){
        
        $this->db->select('count(id)');
        $this->db->from('quotation');
        $this->db->where('userId', $tuserid);
        $this->db->where('date(entryDate) >=', $date1);
        $this->db->where('date(entryDate) <=', $date2);
        $this->db->order_by('id', 'asc');
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['count(id)'];

     }
    // to people creation
     public function totalCustomerEntry($tuserid, $date1, $date2){
        
        $this->db->select('count(com_id)');
        $this->db->from('setup_company');
        $this->db->where('entryBy', $tuserid);
        $this->db->where('date(entryDate) >=', $date1);
        $this->db->where('date(entryDate) <=', $date2);
        $this->db->order_by('com_id', 'asc');
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['count(com_id)'];

     }
     // to expense bill
     public function totalExpensebill($tuserid, $date1, $date2){
        
        $this->db->select('SUM(total_amount)');
        $this->db->from('expense_bill_master');
        $this->db->where('user_id', $tuserid);
        $this->db->where('date(created_date) >=', $date1);
        $this->db->where('date(created_date) <=', $date2);
        $this->db->order_by('exp_id', 'asc');
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['SUM(total_amount)'];

     }
   
}
<?php
class Search_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    
    public function getAllDataFromTable($tableName) 
    {
        $this->db->select('*');
        $this->db->from($tableName);
        //$this->db->order_by($ascData, 'asc');
        $query = $this->db->get();
        return $query->result_array(); 
    }
    
    public function joinTableData($maintbl, $jointbl, $data, $relation, $order, $by,$wh, $whereData)
    {
        $this->db->select($data);
        $this->db->from($maintbl);
        $this->db->join($jointbl, $relation, 'left');
        if($wh == TRUE){
        $this->db->where($whereData);    
        }
        $this->db->order_by($order, $by);
        $query = $this->db->get();
        return $query->result_array();
                         
    }
    public function getmultiConditionData($data, $table, $whereData)
    {
        $this->db->select($data);
        $this->db->from($table);
        $this->db->where($whereData);  
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getSinglefield($maintbl, $data, $fieldName, $matchdata)
    {
        $this->db->select($data);
        $this->db->from($maintbl);
        $this->db->where($fieldName,$matchdata);
        $query = $this->db->get();
        return $query->result_array();
                         
    }
     public function getdoubleJoinData($fristTbl,$fristjTbl,$secondjTbl,$fields,$fristjRelation,$secondjRelation,$whStatus,$whereData)
    {
        $this->db->select($fields);
        $this->db->from($fristTbl);
        $this->db->join($fristjTbl,$fristjRelation,'left');
        $this->db->join($secondjTbl,$secondjRelation,'left');
        if($whStatus==TRUE):
            $this->db->where($whereData);
        endif;
        $query = $this->db->get();
//        echo $this->db->last_query();
        return $query->result_array(); 
    }
    
     public function getProducts($whStatus,$whereData)
    {
        $this->db->select('products.*,item_categories.cat_name,country.cname');
        $this->db->from('products');
        $this->db->join('item_categories','item_categories.cat_id = products.category','left');
        $this->db->join('country','country.cid = products.origin','left');
        if($whStatus==TRUE):
            $this->db->where($whereData);
        endif;
        $query = $this->db->get();
//        echo $this->db->last_query();
        return $query->result_array(); 
    }
 
    public function getAllDataFromTableBycondition($tableName,$fieldName,$matchdata) 
    {
        
        $sql=$this->db->get_where($tableName,array($fieldName=>$matchdata));
        return $sql->result_array();
        
    }
    // for tmi mgr
    public function getMgrId($userId)
    {  
       $this->db->select('reporting_manager');
       $this->db->from('users');
       $this->db->where('user_id',$userId);
       $query = $this->db->get();
       $row = $query->row_array();
       return $row['reporting_manager'];
    }
    public function autoSuggest($table,$data,$rname,$rid) {       
        $this->db->select($data);
        $this->db->from($table);
        $query = $this->db->get()->result_array();
        $org_data = '[';
        foreach($query as $val):
            $org_data .= '{name:"'.$val[$rname].'",id:"'.$val[$rid].'"},';
        endforeach;
        $org_data = substr($org_data, 0,-1);
        $org_data .= ']';
        return $org_data;
        
    }
    //test
    public function allautoSuggest() {
        $sql_search = array(
            "select com_id id, com_name n1,com_phone1 n2,com_phone2 n3,'setup_company' as tbl,'COMPANIES' as menu from setup_company",
            "SELECT id id, FullName n1,designation n2,mobile n3, email n4,'people' as tbl,'PEOPLE' as menu FROM `people` ORDER BY `id` DESC ",
            "select id id, quotation_no n1,productId n2,'quotation' as tbl,'QUOTATION' as menu from quotation",
            "select id id, order_no n1,ord_date n2,total n3,'sales_orders' as tbl,'ORDERS' as menu from sales_orders",
            "select pid id, item_code n1,item_name n2, original_price n3,tariff_code n4, 'products' as tbl,'PRODUCTS' as menu from products",
            "select exp_id id, bill_no n1,total_amount n2,user_id n3, 'expense_bill_master' as tbl,'EXPENSE BILL' as menu from expense_bill_master",
            "select id id, real_name n1,designation n2,mobile n3,email n4,'users' as tbl,'USERS' as menu from users"
        );
        $org_data = '[';
        foreach($sql_search as $val):
            $rs3 = $this->db->query($val);
            $row = $rs3->row();
             
            foreach( $rs3->result_array() as $res):
            $org_data .= '{"name":"'.$res['menu'].'<br/>'.$res['n1'].'<br/>'.$res['n2'].'<br/>'.$res['n3'].'<br/>'.$res['n4'].'","id":"'.$res['id'].'@'.$res['tbl'].'"},';
            endforeach;
        endforeach;
        $org_data = substr($org_data, 0,-1);
        $org_data .= ']';
        return $org_data;
        
    }
    /**
     * Perform search on top header
     * @since  Version 1.0.1
     * @param  string $q search
     * @return array    search results
     */
    public function perform_search($q){

        $result = array();
        $comq = $this->db->query("SELECT * FROM setup_company WHERE com_name like '%".$q."%' or com_address like '%".$q."%' or com_phone1 like '%".$q."%'");  
        $result['company'] = $comq->result_array();
        
        $peoq = $this->db->query("SELECT * FROM people WHERE `FullName` like '%".$q."%' or `designation` like '%".$q."%' or`mobile` like '%".$q."%' or`email` like '%".$q."%'");  
        $result['people'] = $peoq->result_array();
        
        $qtoq = $this->db->query("SELECT q.id,q.quotation_no,c.com_name FROM quotation q LEFT JOIN setup_company c ON q.customerId=c.com_id WHERE `quotation_no` like '".$q."'");  
        $result['quotation'] = $qtoq->result_array();
        
        $ordq = $this->db->query("SELECT s.id,s.order_no,c.com_name FROM sales_orders s LEFT JOIN setup_company c ON s.customer_id=c.com_id WHERE `order_no` like '".$q."'");  
        $result['FPI'] = $ordq->result_array();
        
        $prodq = $this->db->query("SELECT * FROM products WHERE `item_code` like '%".$q."%' or `item_name` like '%".$q."%' or `original_price` like '%".$q."%'");  
        $result['product'] = $prodq->result_array();
        
        $expq = $this->db->query("SELECT * FROM expense_bill_master WHERE `bill_no` like '%".$q."%' or `user_id` like '%".$q."%'");  
        $result['expense'] = $expq->result_array();
        
        return $result;
    }
    //pdf content
    public function generatePdfcontent($quotationno) {
        
        $this->db->select('quotation.*,setup_company.*,products.*,people.*,payment_terms.terms,country.cname');
        $this->db->from('quotation');
        $this->db->join('products','products.item_code = quotation.productId','left');
        $this->db->join('setup_company','setup_company.com_id = quotation.customerId','left');
        $this->db->join('people','people.id = quotation.attention','left');
        $this->db->join('payment_terms','payment_terms.terms_id = quotation.payment_terms','left');
        $this->db->join('country','country.cid = products.origin','left');
        $this->db->where(array('quotation.quotation_no'=>$quotationno));
        $query = $this->db->get();
//        echo $this->db->last_query();
        return $query->result_array();
    }
    
    //quotation list
    public function quotationList($quotationno) {
        
        $this->db->select('quotation.*,setup_company.com_name,products.item_name,people.FullName,payment_terms.terms,country.cname');
        $this->db->from('quotation');
        $this->db->join('products','products.item_code = quotation.productId','left');
        $this->db->join('setup_company','setup_company.com_id = quotation.customerId','left');
        $this->db->join('people','people.id = quotation.attention','left');
        $this->db->join('payment_terms','payment_terms.terms_id = quotation.payment_terms','left');
        $this->db->join('country','country.cid = products.origin','left');
        $this->db->order_by("quotation.id",'DESC');
        $query = $this->db->get();
//        echo $this->db->last_query();
        return $query->result_array();
    }
   
}
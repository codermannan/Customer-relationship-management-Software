<?php
class Operation_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function getNextId($tableName,$fieldName,$prefix)
    {
        $this->db->select($fieldName);
        $this->db->from($tableName);
        $query = $this->db->get();
        $row = $query->row_array();
        $lid = preg_replace('/\D/', '', $row[$fieldName])+1;
        
        if($row[$fieldName] == NULL):
            $p=1;
            $nid = $prefix.substr(sprintf('%07d', $p),0,7);
        else:
            $nid = $prefix.substr(sprintf('%07d', $lid),0,7);
        endif;
            
        return $nid;
    }

    public function checkDublicate($tableName, $whereCondition)
    {
        $this -> db -> select($checkField);
        $this -> db -> from($tableName);
        $this -> db -> where($whereCondition);
        $this -> db -> limit(1);
        $query = $this -> db -> get();
//        echo $this->db->last_query();
        $queryResult = $query->result();
        return $query -> num_rows();
        
    }
    public function updateTable($fieldId, $matchId, $tableName, $data)
    {
        $this->db->where($fieldId, $matchId);
        $this->db->update($tableName, $data);
        $databaseError = $this->db->_error_message(); 
        return $databaseError;
    }
   
    public function deleteTableData($fieldId, $matchId, $tableName)
    {
        $this->db->delete($tableName, array($fieldId => $matchId)); 
        $databaseError = $this->db->_error_message(); 
        return $databaseError;
    }
    
    public function getSingleDataOfTable($tableField, $selectField, $matchField, $tableName, $selectField2, $matchField2)
    {
        $this->db->select($tableField);
        $this->db->from($tableName);
        $this->db->where($selectField, $matchField);
        if(isset($selectField2)):
        $this->db->where($selectField2, $matchField2);
        endif;
        $query = $this->db->get();
        $row = $query->row_array();
        $your_variable = $row[$tableField];
        return $your_variable;
    }
  
  public function imageUpload($image, $tmpupimage) 
    {
        $target_dir = "./uploads/company/";
        $target_file = $target_dir . basename($image);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
       // Check if $uploadOk is set to 0 by an error
        if (empty($image)) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($tmpupimage, $target_file)) {
                return $image;
            } else {
                return "Sorry, there was an error uploading your file.";
            }
        }

    }
    
     
    public function rawQuery($sql) 
    {
        
        $query = $this->db->query($sql);
        return $query->result_array();
        
    }
    
    public function isdataExist($table,$where) 
    {
        $this->db->where($where);
        $count = $this->db->count_all_results($table);

        return $count;
        
    }
    //ACL functions
   function hasPermission($mid) {
        $this->db->select('permission');
        $this->db->from('menu_access');
        $this->db->where(array('role_id'=>$this->session->userdata('access_level'),'menu_id'=>$mid));
        $query = $this->db->get();
        $row = $query->row_array();
        return json_decode($row['permission']);
   }
}
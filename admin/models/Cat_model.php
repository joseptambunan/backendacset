<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class Cat_model extends CI_Model
{
	function getall($table)
	{
		$this->load->database();

		$this->db->select('*');
		$this->db->from($table);
        $query = $this->db->get();
        return $query->result();
	}

	function get_alldistinct($data)
	{
		$this->load->database();

		$this->db->distinct();
		$this->db->select($data['field']);
		$this->db->from($data['table']);
        $query = $this->db->get();
        return $query->result();
	}	

	function get_allcountdistinct($table,$data)
	{
		$this->load->database();

		$this->db->select($data);
		$this->db->from($table);
		$this->db->group_by($data['field']);
        $query = $this->db->get();
        return $query->result();
	}		

	function get_mostcommon($data)
	{
		$this->load->database();

		$this->db->select('agent,count('.$data['field'].') AS count');
		$this->db->from($data['table']);
		$this->db->group_by($data['field']);
        $this->db->order_by("count", "desc");
        $this->db->limit($data['top']);  	
        $query = $this->db->get();
        return $query->result();		
	}

	function get_mostcommonwhere($data)
	{
		$this->load->database();

		$condition = $data['condition'];
		
		$this->db->select('agent,count('.$data['field'].') AS count');
		$this->db->from($data['table']);
		$this->db->where($condition);
		$this->db->group_by($data['field']);
        $this->db->order_by("count", "desc");
        $this->db->limit($data['top']);  	
        $query = $this->db->get();
        return $query->result();		
	}

	function get_mostcommonwhere1($data)
	{
		$this->load->database();

		$condition = $data['condition'];
		
		$this->db->select('refer,count('.$data['field'].') AS count');
		$this->db->from($data['table']);
		$this->db->where($condition);
		$this->db->group_by($data['field']);
        $this->db->order_by("count", "desc");
        $this->db->limit($data['top']);  	
        $query = $this->db->get();
        return $query->result();		
	}	

	function get_sum($data)
	{
		$this->load->database();

		$this->db->select_sum($data['field']);
		$this->db->from($data['table']);
        $query = $this->db->get();
        return $query->result();		
	}

	function get_allorder($data)
	{
		$this->load->database();

		$this->db->select('*');
		$this->db->order_by($data['field'],$data['val']);
		$this->db->from($data['table']);
        $query = $this->db->get();
        return $query->result();
	}

	function get_allorderlimit($data)
	{
		$this->load->database();

		$this->db->select('*');
		$this->db->order_by($data['field'],$data['val']);
		$this->db->limit($data['top']);  		
		$this->db->from($data['table']);
        $query = $this->db->get();
        return $query->result();
	}	

	function get_allwhereorder($attr, $data)
	{
		$query = $this->db->get_where($attr['table'], $data, $attr['limit'], $attr['offset']);
        return $query->result();	
	}

	function get_allwhere($data)
	{
		$this->db->select('*');
		$this->db->where($data['field'],$data['val']);
		$this->db->from($data['table']);
        $query = $this->db->get();
        return $query->result();
	}

	function get_allwhere1($data)
	{
		$this->db->select('*');
		$this->db->where($data['field'],$data['val']);
		$this->db->where($data['field1'],$data['val1']);		
		$this->db->from($data['table']);
        $query = $this->db->get();
        return $query->result();
	}	

	function get_allwhere2($data)
	{
		$this->db->select('*');
		$this->db->where($data['field'],$data['val']);
		$this->db->where($data['field1'],$data['val1']);		
		$this->db->where($data['field2'],$data['val2']);				
		$this->db->from($data['table']);
        $query = $this->db->get();
        return $query->result();
	}		

	function get_allwhere_order($data)
	{
		$this->load->database();

		$this->db->select('*');
		$this->db->where($data['field'],$data['val']);
		$this->db->order_by($data['field1'],$data['val1']);	
		$this->db->from($data['table']);
        $query = $this->db->get();
        return $query->result();        
	}	

	function get_allcondition($data)
	{
		$this->load->database();

		$condition = $data['condition'];
		$this->db->select('*');
		$this->db->where($condition);
		$this->db->from($data['table']);
        $query = $this->db->get();
        return $query->result();		
	}

	function get_allcondition1($data)
	{
		$this->load->database();

		$condition = $data['condition'];
		$this->db->select('*');
		$this->db->where($condition);
		$this->db->where($data['field'],$data['val']);		
		$this->db->from($data['table']);
        $query = $this->db->get();
        return $query->result();		
	}

	function get_allcondition2($data)
	{
		$this->load->database();

		$condition = $data['condition'];
		$this->db->select('*');
		$this->db->where($condition);
		$this->db->where($data['field1'],$data['val1']);
		$this->db->where($data['field2'],$data['val2']);		
		$this->db->from($data['table']);
        $query = $this->db->get();
        return $query->result();		
	}

	function get_alljoin($data)
	{
		$this->load->database();

		$condition = $data['condition'];
		$this->db->select('*');
		$this->db->from($data['table']);
		$this->db->join($data['join'], $condition);
        $query = $this->db->get();
        return $query->result();		
	}

	function get_alljoin1($data)
	{
		$this->load->database();

		$condition = $data['condition'];
		$condition1 = $data['condition1'];		
		$this->db->select('*');
		$this->db->from($data['table']);
		$this->db->join($data['join'], $condition);
		$this->db->join($data['join1'], $condition1);		
        $query = $this->db->get();
        return $query->result();		
	}	

	function countall($table)
	{
		$this->load->database();

		$this->db->select('*');
		$this->db->from($table);
		return $this->db->count_all_results();
	}

	function count_allcondition($var)
	{
		$this->load->database();

		$this->db->select('*');
		$this->db->from($var['table']);
		$this->db->where($var['condition']);		
		return $this->db->count_all_results();
	}	

	function count_alldistinct($data)
	{
		$this->load->database();

		$this->db->distinct();
		$this->db->select($data['field']);
		$this->db->from($data['table']);
        return $this->db->count_all_results();
	}	

	function getall_distinctcondition($data)
	{
		$this->load->database();

		$condition = $data['condition'];
		$this->db->distinct();
		$this->db->select($data['field']);
		$this->db->from($data['table']);
		$this->db->where($condition);
		$query = $this->db->get();
        return $query->result();
	}	

	function countall_distinctcondition($data)
	{
		$this->load->database();

		$condition = $data['condition'];
		$this->db->distinct();
		$this->db->select($data['field']);
		$this->db->from($data['table']);
		$this->db->where($condition);
        return $this->db->count_all_results();
	}	

	function countall_condition($data)
	{
		$this->load->database();

		$condition = $data['condition'];
		$this->db->from($data['table']);
		$this->db->where($condition);
        return $this->db->count_all_results();
	}		

	function count_allwhere($data)
	{
		$this->load->database();

		$this->db->select('*');
        $this->db->where($data['field'],$data['val']);
		$this->db->from($data['table']);
		return $this->db->count_all_results();
	}

	function count_allwhere1($data)
	{
		$this->load->database();

		$this->db->select('*');
        $this->db->where($data['field'],$data['val']);
        $this->db->where($data['field1'],$data['val1']);        
		$this->db->from($data['table']);
		return $this->db->count_all_results();
	}

	function count_allwhere2($data)
	{
		$this->load->database();

		$this->db->select('*');
        $this->db->where($data['field1'],$data['val1']);
        $this->db->where($data['field2'],$data['val2']);
        $this->db->where($data['field3'],$data['val3']);        
		$this->db->from($data['table']);
		return $this->db->count_all_results();
	}

	function insert($table,$data)
	{
		$this->load->database();

		$this->db->insert($table, $data);

		$length = sizeof($data);
		$field = "";
		$values = "";
		foreach ( $data as $key => $value ) {
			$field .= $key .",";
			$values .= $value. ",";
		}
		$clause = $field. " VALUES ".$values;

		$logs = "INSERT INTO ".$table." ".$clause;
		$now_date = date("Y-m-d H:i:s");
		$this->db->query("insert into setting_log(description,created_at)values('$logs','$now_date')");
		
	}

	function update($data,$detail)
	{
		$this->load->database();

		$condition = $data['condition'];
		$this->db->where($condition);
		$this->db->update($data['table'], $detail);

		//print_r($detail);
		$length = sizeof($detail);
		$clause = "";
		foreach ( $detail as $key => $value ) {
			$clause .= $key . " set = ".$detail[$key]. ", " ;
		}

		$logs = "UPDATE ".$data['table']." ".$clause." ".$condition;
		$now_date = date("Y-m-d H:i:s");
		$this->db->query("insert into setting_log(description,created_at)values('$logs','$now_date')");
		//echo $data['table']." ".($detail['descriptor'])." ".$condition;die;
		
	}

	function update_nothick($data)
	{
		$this->load->database();

		$this->db->where($data['field'],$data['val']);
		$this->db->set($data['field1'], $data['val1'], FALSE);
		$this->db->update($data['table']); 				
	}	

	function count_robot($table,$date)
	{
		$this->load->database();

		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('(`refer` LIKE "%google%" ESCAPE "!" OR `refer` LIKE "%msn%" ESCAPE "!" OR `refer` LIKE "%baidu%" ESCAPE "!" OR `refer` LIKE "%bing%" ESCAPE "!" OR `refer` LIKE "%fastcrawler%" ESCAPE "!") AND (`'.$date.'` BETWEEN "'.date('Y').'-'.date('m').'-01" AND "'.date('Y').'-'.date('m').'-31")');
        return $this->db->count_all_results();
	}	

	function count_referal($table,$date)
	{
		$this->load->database();

		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('(`refer` LIKE "%faceboook%" ESCAPE "!" OR `refer` LIKE "%twitter%" ESCAPE "!" OR `refer` LIKE "%instagram%" ESCAPE "!" OR `refer` LIKE "%path%" ESCAPE "!" OR `refer` LIKE "%linkedin%" ESCAPE "!") AND (`'.$date.'` BETWEEN "'.date('Y').'-'.date('m').'-01" AND "'.date('Y').'-'.date('m').'-31")');
        return $this->db->count_all_results();
	}		


	function autocomplete($var,$return=false)
	{
		$this->load->database();
		
		$this->db->distinct();
	    $this->db->select($var['selected']);
	    $this->db->like($var['selected'], $var['term']);
	    $query = $this->db->get($var['table']);
	    if($query->num_rows() > 0)
	    {
	    	if($return === false)
	    	{
		      	foreach ($query->result_array() as $row)
		      	{
		        	$row_set[] = htmlentities(stripslashes($row[$var['selected']])); //build an array
		      	}
		      	echo json_encode($row_set); //format the array into json data
	    	}
	    	else
	    	{
	    		return $query->result_array();
	    	}
	    }
	}

	function pagination($limit, $id, $detail) 
	{
		$this->load->database();

		$this->db->limit($limit,$id);

		if(isset($detail['condition'])):
			$this->db->where($detail['condition']);
		endif;
		
		$this->db->order_by($detail['field'], "desc");	
		$query = $this->db->get($detail['table']);
		
		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $row) 
			{
				$data[] = $row;
			}

			return $data;
		}
	}	

}
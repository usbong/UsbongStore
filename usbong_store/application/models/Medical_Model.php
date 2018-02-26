<?php 
class Medical_Model extends CI_Model
{
	public function getMedicalOnly($merchant_id)
	{
		//		$this->db->join('account', 'stories.userid = account.id');
		$this->db->select('product_id, product_type_id, name, author, price, previous_price, quantity_in_stock, product_view_num, quantity_sold');
		$this->db->where('product_type_id','13'); //13 is for type: medical
		$this->db->where('show','1');

		if ($merchant_id!=null) {
			$this->db->where('merchant_id',$merchant_id);
		}
		
		$this->db->order_by('name', 'ASEC');
		$query = $this->db->get('product');
		
		return $query->result_array();
	}
	
	public function getMedical($merchant_id)
	{
//		$this->db->join('account', 'stories.userid = account.id');
		$this->db->select('product_id, product_type_id, name, author, price, previous_price, quantity_in_stock, product_view_num, quantity_sold');
		$this->db->where('product_type_id','13'); //13 is for type: medical
		$this->db->where('show','1');
		
		if ($merchant_id!=null) {
			$this->db->where('merchant_id',$merchant_id);
		}
				
		$this->db->order_by('name', 'ASEC');
		$query = $this->db->get('product');
		
		//edited by Mike, 201802222
		if ($query->num_rows()>0) {
			$this->incrementViewNum($query->row()->product_type_id);		
		}
		
		return $query->result_array();
	}
	
	public function incrementViewNum($productTypeId) {
		$this->db->select('product_type_view_num');
		$this->db->from('product_type');
		$this->db->where('product_type_id', $productTypeId);
		$query = $this->db->get();
		
		$viewNum = $query->row()->product_type_view_num;
		$viewNum++;
		
		$updateData = array(
				'product_type_view_num' => $viewNum
		);
		$this->db->where('product_type_id', $productTypeId);
		$this->db->update('product_type', $updateData);
	}
}
?>
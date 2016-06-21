<?php  

require_once '../core/Api.php';

/**
* Homepage class for toko 
*/
class Hmpg extends Api
{
	
	public function seeNewProduct(){
		$stmt = $this->select('all','judul,spoiler,picture','barang_data ORDER BY last_added DESC LIMIT = 5');
		$data = $this->fetchAll($stmt);
		if ($data) return $this->response(1,$data);
		else return $this->response(0,"somethings wrong");
	}
	
	public function seeTopProduct(){
		$stmt = $this->select('where','A.total_sell , B.judul,B.spoiler,B.picture','barang_datail AS A , barang_data AS B','A.id_barang = B.id_barang ORDER BY total_sell DESC LIMIT = 5');
		$data = $this->fetchAll($stmt);
		if ($data) return $this->response(1,$data);
		else return $this->response(0,"somethings wrong");
	}

	public function seeLastviewProduct(){
		$stmt = $this->select('where','A.last_view , B.judul,B.spoiler,B.picture','barang_detail AS A , barang_data AS B','A.id_barang = B.id_barang ORDER BY last_view DESC LIMIT = 5');
		$data = $this->fetchAll($stmt);
		if ($data) return $this->response(1,$data);
		else return $this->response(0,"somethings wrong");	
	}

	public function search($key){
		$stmt = $this->select('where','judul,spoiler,picture','barang_data','keyword LIKE % ? %',array($key));
		$data = $this->fetchAll($stmt);
		if ($data) return $this->response(1,$data);
		else return $this->response(0,"somethings wrong");
	}

	private function setLooking($id){
		$stmt = $this->update('where','barang_detail',array('last_view'),array('SUBTIME(NOW())'),'id_barang = $id');
		if($stmt) return true;
		else return false;
	}

	public function seeDetail($id){
		$stmt = $this->select('where','*','barang_data','id_barang = ?',array($id));
		$data = $this->fetchAll($stmt);
		if ($this->setLooking($id)) {
			if ($data) return $this->response(1,$data);
			else return $this->response(0,'somethings wrong');			
		}else{
			else return $this->response(0,'somethings wrong while set looking function');			
		}
	}

}

?>
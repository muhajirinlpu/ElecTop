<?php  

require_once '../php/core/Api.php';

/**
* Homepage class for toko 
*/
class Hmpg extends Api
{
	
	public function seeNewProduct(){
		$stmt = $this->select('all','merk,type,spoiler,picture','barang_data ORDER BY date_added DESC LIMIT 5');
		$data = $this->fetchAll($stmt);
		if ($data) return $this->response(1,$data);
		else return $this->response(0,"Empty Result");
	}
	
	public function seeTopProduct(){
		$stmt = $this->select('where','A.total_sell , B.merk,B.type,B.spoiler,B.picture','barang_detail AS A , barang_data AS B','A.id_barang = B.id_barang ORDER BY total_sell DESC LIMIT 5');
		$data = $this->fetchAll($stmt);
		if ($data) return $this->response(1,$data);
		else return $this->response(0,"Empty Result");
	}

	public function seeLastviewProduct(){
		$stmt = $this->select('where','A.last_view , B.merk,B.type,B.spoiler,B.picture','barang_detail AS A , barang_data AS B','A.id_barang = B.id_barang ORDER BY last_view DESC LIMIT 5');
		$data = $this->fetchAll($stmt);
		if ($data) return $this->response(1,$data);
		else return $this->response(0,"Empty Result");	
	}

	public function search($key){
		$stmt = $this->select('where','merk,type,spoiler,picture','barang_data',"keyword LIKE '%$key%'",array($key));
		$data = $this->fetchAll($stmt);
		if ($data) return $this->response(1,$data);
		else return $this->response(0,"Empty Result");
	}

	private function setLooking($id){
		$stmt = $this->runQuery('UPDATE `barang_detail` SET `last_view`= NOW() WHERE id_barang = 1');
		if($stmt) return true;
	}

	public function seeDetail($id){
		$stmt = $this->select('where','*','barang_data','id_barang = ?',array($id));
		$data = $this->fetchAll($stmt);
		if ($this->setLooking($id)) {
			if ($data) return $this->response(1,$data);
			else return $this->response(0,'Empty Result');			
		}else{
			return $this->response(0,'Somethings wrong while set looking function');			
		}
	}

}

?>
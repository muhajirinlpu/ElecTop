<?php  

require_once '../../php/core/Api.php';

/**
* Homepage class for toko 
*/
class Hmpg extends Api
{
	
	public function seeNewProduct(){
		$stmt = $this->select('all','id_barang,merk,type,spoiler,picture','barang_data ORDER BY date_added DESC LIMIT 5');
		$data = $this->fetchAll($stmt);
		if ($data) return $this->response(1,$data);
		else return $this->response(0,"Empty Result");
	}
	
	public function seeTopProduct(){
		$stmt = $this->select('all','id_barang,total_sell,merk,type,spoiler,picture','barang_data ORDER BY total_sell DESC LIMIT 5');
		$data = $this->fetchAll($stmt);
		if ($data) return $this->response(1,$data);
		else return $this->response(0,"Empty Result");
	}

	public function seeLastviewProduct(){
		$stmt = $this->select('where','id_barang,last_view,merk,type,spoiler,picture','barang_data','ORDER BY last_view DESC LIMIT 5');
		$data = $this->fetchAll($stmt);
		if ($data) return $this->response(1,$data);
		else return $this->response(0,"Empty Result");	
	}

	public function seeAllProduct($p){
		$stmt = $this->select('where','id_barang,total_sell,merk,type,spoiler,picture','barang_data','id_barang >= ? ORDER BY total_sell DESC LIMIT 10',array($p));
		$cmd  = $this->select('all','id_barang','barang_data');
		$data = $this->fetchAll($stmt);
		$count = $cmd->rowCount();
		$count = ceil($count/10);
		return $this->response($count,$data);
	}

	public function search($key){
		$stmt = $this->select('where','id_barang,merk,type,spoiler,picture','barang_data',"keyword LIKE '%$key%'",array(':key'=>$key));
		$data = $this->fetchAll($stmt);
		if ($data) return $this->response(1,$data);
		else return $this->response(0,"Empty Result");
	}

	private function setLooking($id){
		$stmt = $this->runQuery('UPDATE `barang_data` SET `last_view`= NOW() WHERE id_barang = ?',array($id));
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
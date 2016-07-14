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
		$stmt = $this->select('all','id_barang,last_view,merk,type,spoiler,picture','barang_data','ORDER BY last_view DESC LIMIT 5');
		$data = $this->fetchAll($stmt);
		if ($data) return $this->response(1,$data);
		else return $this->response(0,"Empty Result");	
	}

	public function seeAllProduct($p){
		if (isset($_SESSION['page'])) {
			$this->pagingProduct($p);
		}else{
			if ($this->initAddress("date_added","DESC","8")) {
				$this->pagingProduct($p);
			}else{
				$this->response(0,"error in pagination product");
			}
		}
	}

	private function pagingProduct($p){
		$p--;
		$stmt = "SELECT id_barang,merk,type,spoiler,picture FROM barang_data WHERE";
		$res = $_SESSION['page'][$p];
		for ($i=0; $i < sizeof($res) ; $i++) { 
			if ($i == 0) {
				$stmt .= " id_barang = ?";
			}else{
				$stmt .= " OR id_barang = ?";
			}
		}

		$data = $this->fetchAll($this->runQuery($stmt,$res));
		return $this->response(1,array("currentPage"=>$p+1,"totalPage"=>sizeof($_SESSION['page']),"data"=>$data));
	}

	private function initAddress($sort_item,$sort_by,$item_per_page){
		$stmt = $this->runQuery("SELECT id_barang FROM barang_data ORDER BY :sort_item :sort_by",array("sort_item" => $sort_item , "sort_by" => $sort_by));
		if ($stmt) {
			$data = $this->fetchAll($stmt);
			// $data = array(["id_barang"=>2],["id_barang"=>3],["id_barang"=>4],["id_barang"=>5],["id_barang"=>6],["id_barang"=>7],["id_barang"=>8],["id_barang"=>9],["id_barang"=>10]);
			$page = [];
			$key = 0 ;
			foreach ($data as $a => $b) {
				if ($a % $item_per_page == 0 && $a != 0) {
					$key++;
				}
				$page[$key][] = $b['id_barang'];
			}
			$_SESSION['page'] = $page;
			return true;
		}
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
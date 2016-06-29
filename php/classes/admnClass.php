<?php  

require_once '../../php/core/Api.php';
/**
* admin class
*/
class Admn extends Api
{
	
	public function login($username,$password,$passver){
		if ($password == $passver) {
			$stmt = $this->select('where','id_admin,username,nama,picture','admindata'.'username = ? OR email = ? AND password = ?',array($username,md5($password)));
			$data = $this->fetch($stmt);
			if ($stmt->rowCount()==1) {
				$_SESSION = array('id_admin'=>$data['id_admin'],'username'=>$data['admin'],'nama'=>$data['nama'],'picture'=>$data['picture']);
				return $this->response(1,'Success');
			}else{
				return $this->response(0,'Incorrect email , username or password');
			}
		}else{
			return $this->response(0,'Retype your password . We things something wrong with your input');
		}
	}

	private function CompleteAdd($id_barang){
		$stmt = $this->insert('barang_detail',array('id_barang'),array($id_barang));
		if ($stmt) return true;
	}

	private function getLastId(){
		$stmt = $this->select('all','id_barang','barang_data SORT BY id_barang DESC LIMIT 1');
		return $this->fetch($stmt);
	}

	public function addBarang($author,$merk,$type,$spoiler,$harga,$stok){
		$keyword = $merk . " " . $type . " " . $spoiler;
		$stmt = $this->insert('barang_data',array('author','merk','type','spoiler','harga','stok','keyword'),array($author,$merk,$type,$spoiler,$harga,$stok,$keyword));
		if ($stmt) {
			$complete = $this->CompleteAdd($this->getLastId());
			if ($complete) {
				return $this->response(1,'All data was insert successfull');
			}else{
				return $this->response(0,'Somethings error while completing insert data');
			}
		}else{
			return $this->response(0,"Somethings error while insert data");
		}
	}

	public function NotifyMe(){
		/*code status :
		1 = pending
		2 = accepted
		3 = diterima */
		$stmt = $this->select('where','id_order','order_product','status = ? OR status = ?',array(1,3));
		if ($stmt->rowCount()>0) {
			$text = "ada ".$stmt->rowCount()." aktifitas baru";
			return $this->response(1,$text);
		}else{
			return $this->response(0,'Nothing new');
		}

	}

	public function seeAllOrder(){
		$stmt = $this->runQuery("SELECT B.merk,B.type,C.id_order,C.status,D.nama,D.alamat,D.telepon,A.email FROM userdata AS A , barang_data AS B , order_product AS C , userprofil AS D WHERE A.id_user = C.id_user AND A.id_user = D.id_user AND B.id_barang = C.id_barang ORDER BY C.status ASC");
		$data = $this->fetchALl($stmt);
		if ($data)  return $this->response(1,$data);
		else 		return $this->response(0,"Something wrong");
 	}

	public function responseOrder($id){
		$check = $this->select('where','status','order_product','id_order=?',array($id));
		$status = $this->fetch($check);
		if ($status < 3) {
			$status+=1;
			$stmt = $this->update('where','order_product',array('status'),array($status),'id_order = ?',array($id));
			if ($stmt) {
				return $this->response(1,'Success');
			}else{
				return $this->response(0,'Something wrong while insert data');
			}
			
		}else{
			return $this->response(0,'Finished step');
		}
	}

}

?>
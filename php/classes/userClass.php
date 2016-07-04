<?php

require_once '../../php/core/Api.php';

/**
* User class
*/
class User extends Api
{

	public function register($uname,$pass,$email){
		$password = $this->generate($pass);
		$stmt = $this->insert("userdata",array('username','password','email'),array($uname,$password,$email));
		if ($stmt) return $this->response('1','Create account success');
	}

	private function checkProfile($id_user){
		$stmt = $this->select('where','*','userprofil','id_user = ?',array($id_user));
		if ($stmt->rowCount()==1) {
			$data = $this->fetch($stmt);
			$_SESSION = array('nama' => $data['nama'] , 'alamat' => $data['alamat'] , 'telepon' => $data['telepon']);
			return true;
		}
	}

	public function login($uname,$pass){
		$password = $this->generate($pass);
		$stmt = $this->select('where','id_user,username,email','userdata','username = :uname AND password = :pass',array('uname'=>$uname,'pass' => $password));
		if ($stmt->rowCount()==1) {
			$data = $this->fetch($stmt);
			$_SESSION = array('id_user' => $data['id_user'] , 'username' => $data['username'] , 'email' => $data['email']);
			if ($this->checkProfile($data['id_user'])) {
				return $this->response(1,"Logged in");
			}else{
				return $this->response(0,"doCompleteProfile");
			}
		}else{
			return $this->response(0,"Wrong username or password ");
		}
	}

	public function completeProfile($id_user,$nama,$alamat,$telepon){
		if (isset($id_user,$nama,$alamat,$telepon)) {
			$stmt = $this->insert("userprofil",array('id_user,nama,alamat,telepon'),array($id_user,$nama,$alamat,$telepon));
			if ($stmt) return $this->response(1,"Success complete profile");
			else return $this->response(0,"Something error please try again !");
		}else{
			return $this->response(0,"All insert must not empty");
		}
	}

}

?>

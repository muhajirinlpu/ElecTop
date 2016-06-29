<?php  

require_once 'ConnectDB.php';

/**
* Api controller
*/
class Api extends ConnectDB 
{
	public  $errText = 'Something error with your command or syntax or many more ! . Please check your spelling code again again again and then drink ice tea or ice degan :v' ;

	private $conn;
	private $config = array(	
		"server" => "localhost" ,
		"dbname" => "electop"   ,
		"user"   => "root"      ,
		"pass"   => ""           
	);

	public function __construct(){
		$this->conn = $this->connectDB($this->config); 
	} 

	protected function runQuery($query,$arr=array()){
		try {
			$stmt = $this->conn->prepare($query);
			$stmt->execute($arr);
			return $stmt ;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}

	protected function fetch($data){
		return $data->fetch(PDO::FETCH_ASSOC);
	}

	protected function fetchAll($data){
		return $data->fetchAll(PDO::FETCH_ASSOC);
	}

	protected function response($code,$data){
		$arr = array("response"=>$code,'message'=>$data);
		echo json_encode($arr);
	}

	//Begin of CRUD manipulated :)
	protected function insert ($table, $row = [], $val = []){
      	$a = "" ; $b = "";
      	if (sizeof($row)==sizeof($val)&&isset($table, $row, $val)) {
			for ($i=0; $i < sizeof($row) ; $i++) { 
				if ($i != 0) {
					$a .= " ,$row[$i]";
					$b .= " ,?";
				}else{
					$a .= $row[$i];
					$b .= "?";
				}
			}
			return $this->runQuery("INSERT INTO $table ($a) VALUES ($b);",$val);
      	}else{
      		echo $this->errText;
      	}

    }

	protected function select($command,$selection,$table,$req="",$val=[]){
		switch ($command) {
			case 'all':
				$stmt = "SELECT $selection FROM $table ;";
				break;
			case 'where':
				$stmt = "SELECT $selection FROM $table WHERE $req ;";
				break;
			default:
				echo $this->errText;
				break;
		}
		return $this->runQuery($stmt,$val);
	}

	protected function update($command,$table,$row=[],$val=[],$req="",$reqval = array()){
		switch ($command) {
			case 'all':
				if (sizeof($row)==sizeof($val)) {
					$stmt = "UPDATE $table SET ";
					for ($i=0; $i < sizeof($row) ; $i++) { 
						if ($i != 0) {
							$stmt .= " ,$row[$i] = ?";
						}else{
							$stmt .= "$row[$i] = ?";
						}
					}
					$stmt .= " ;";
					return $this->runQuery($stmt,$val);
				}else{
					echo $this->errText;
				}
				break;
			case 'where':
				if (sizeof($row)==sizeof($val)) {
					$stmt = "UPDATE $table SET ";
					for ($i=0; $i < sizeof($row) ; $i++) { 
						if ($i != 0) {
							$stmt .= " ,$row[$i] = ?";
						}else{
							$stmt .= "$row[$i] = ?";
						}
					}
					$stmt .= " WHERE $req ;";
					echo $stmt;
					return $this->runQuery($stmt,$val);
				}else{
					echo $this->errText;
				}
				break;
			
			default:
				echo $this->errText;
				break;
		}
	}

	protected function delete($table,$req,$val=[]){
		$stmt = "DELETE FROM $table WHERE $req";
		return $this->runQuery($stmt,$val);
	}

}

?>
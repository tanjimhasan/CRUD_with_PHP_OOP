<?php

/**
* 
*/
class Database{
	
	public $th_host = TH_DB_HOST;
	public $th_user = TH_DB_USER;
	public $th_pass = TH_DB_PASS;
	public $th_dbname = TH_DB_NAME;

	public $th_link;
	public $th_error;


	public function __construct(){
		$this->th_connectDB();
	}


	private function th_connectDB(){
		$this->th_link = new mysqli($this->th_host,$this->th_user,$this->th_pass,$this->th_dbname);

		if(!$this->th_link){
			$this->th_error = "Connection fail".$this->th_link->connect_error;
			return false;
		}
	}
/**
select or Read Data
*/
	public function th_select($th_query){
		$th_result = $this->th_link->query($th_query) or die ($this->th_link->error.__LINE__);
		if ($th_result->num_rows>0) {
			return $th_result;
		}else{
			return false;
		}
	}
/**
Insert Data
*/
	public function th_insert($th_query){
		$th_insert_row = $this->th_link->query($th_query) or die ($this->th_link->error.__LINE__);
		if ($th_insert_row) {
			header("Location: index.php?msg=".urlencode('Data inserted Successfully.'));
			exit();
		}else{
			die("Error :(".$this->th_link->errno.")".$this->th_link->error);
		}
	}

/**
Update Data
*/
	public function th_update($th_query){
		$th_update_row = $this->th_link->query($th_query) or die ($this->th_link->error.__LINE__);
		if ($th_update_row) {
			header("Location: index.php?msg=".urlencode('Data Updated Successfully.'));
			exit();
		}else{
			die("Error :(".$this->th_link->errno.")".$this->th_link->error);
		}
	}
/**
Delete Data
*/
	public function th_delete($th_query){
		$th_delete_row = $this->th_link->query($th_query) or die ($this->th_link->error.__LINE__);
		if ($th_delete_row) {
			header("Location: index.php?msg=".urlencode('Data Deleted Successfully.'));
			exit();
		}else{
			die("Error :(".$this->th_link->errno.")".$this->th_link->error);
		}
	}
}

?>
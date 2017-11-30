<?php 
include_once 'Model.php';  
	/**
	* Service class
	*/
	class Service extends Model{
		protected $service_id;
		public $name;
		public $price;
		public $image;
		public $description;


		public static $table_name = 'services';
		public static $primary_key = 'service_id';
		public static $class_name = 'Service';
		public static $table_fields = array ('image','service_id','name','price','description');


		public function __construct(){
			parent::__construct();
		}

		public  function getServiceId(){
			return $this->service_id;
		}

		public static function getDropDown(){
			$services = static::all();
			$dropdown = "<select class ='form-control' name ='service_id'>
							<option  value = ''>select service</option>";
			foreach ($services as $service) {
				$dropdown .= "<option value='{$service->getServiceId()}'>{$service->name}</option>";
				}	
				$dropdown .= "</select>";
				return $dropdown;
		}

		protected $upload_errors = array(
		 UPLOAD_ERR_OK => "No errors" ,
		 UPLOAD_ERR_INI_SIZE => "Larger than upload_max_filesize" ,
		 UPLOAD_ERR_FORM_SIZE => "Larger than form max filesize" ,
		 UPLOAD_ERR_PARTIAL => "Partial upload" ,
		 UPLOAD_ERR_NO_FILE => "No file" ,
		 UPLOAD_ERR_NO_TMP_DIR => "No temporary directory" ,
		 UPLOAD_ERR_CANT_WRITE => "Cant write to disk" , 
		 UPLOAD_ERR_EXTENSION => "File upload stopped by extension" , 
	);
		public  function attach_file($file){
			if (!$file || empty($file) || !is_array($file)) {
				$this->errors[] = "No file was uploaded";
				return false;
			}elseif ($file['error'] != 0) {
				$this->errors[] = $this->upload_errors[$file['error']];
				return false;
			}else{
				if (!isset($this->service_id)) {
					$this->service_id = self::nextId();
					$this->temp_path = $file['tmp_name'];
					$this->image = str_replace("/", "_", $this->service_id).".".basename($file["type"]);
					$this->type = $file["type"];
					$this->size = $file["size"];
					return true;
					
				}
			}
		}
	public  function save_with_file(){
		//house cleaning
		//what if we want to save it in another folder?
		if (!empty($this->errors)) {return false; }
		if (empty($this->image) || empty($this->temp_path)) {
			$this->errors[] = "The file location was not available";
			return false;
		}
		$target_path = "../images/services/".$this->image;
		//attempt to move the file
		if (move_uploaded_file($this->temp_path, $target_path)) {
		 	//save to db
		 	$this->create();
		 	unset($this->temp_path);
		 	return true;	
		 }else{
		 	$this->errors[] = "The file upload failed, possible due to incorrect permissions on the upload folder";
		 		return false;
		 }
	}
	public function nextId(){
		if ($lastService = static::last()) {
		$lastId = $lastService->service_id;
		}else{
			$lastId = 0;
		}
		return ++$lastId;
		}
	}

	
 ?>



	
	
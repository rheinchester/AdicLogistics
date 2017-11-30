<?php
include_once 'Model.php';
include_once 'services.php';
/**
* customer class
*/
class Customer extends Model{
	protected $customer_id;
	public $firstname;
	public $lastname;
	public $service_id;
	public $service;
	public $phone;
	public $email;
	public $address;
	public $password;
	public $datetime;
	public $status;

	public static $table_name = 'customers';
	public static $primary_key = 'email';
	public static $class_name = 'Customer';
	public static $table_fields = array ('firstname','lastname','service_id','phone','email','address','password');

	function __construct(){
		parent::__construct();
	}
	

	public function getCustomerId(){
		return $this->customer_id;
	}
	// public function getServiceId(){
	// 	$service = new Service();
	// 	return $service::getServiceId();
	// }

	public static function getDropDown(){
		$customers = static::all();
		$dropdown = "<select class ='form-control' name ='customer_id'>
							<option  value = ''>select customer</option>";
		if (is_array($customers)) {
			
			foreach ($customers as $customer) {
				$dropdown .= "<option value='{$customer->customer_id}'>{$customer->name}</option>";
			}
			$dropdown .= "</select>";
			return $dropdown;
			}
	}

	public function nextId(){
		if ($lastCustomer = static::last()) {
		$lastId = $lastCustomer->customer_id;
		}else{
			$lastId = 0;
		}
		return ++$lastId;
		}

	  public function delete(){
	      $sql = " DELETE FROM ".self::$table_name;
	      $sql.= " WHERE email = '{$this->email}'";
	      // echo $sql;
	      return static::findBySql($sql);
	      
    }
}
  ?>
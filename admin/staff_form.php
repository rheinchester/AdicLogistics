<?php

	include_once ('models.php');
	class Staff extends Model{
		protected $staff_id;
		public $first_name;
		public $middle_name;
		public $last_name;
		public $sex;
		public $dob;
		public $phone;
		public $email;
		public $address;
		public $doe;
		public $status;
		public $password;
		public $created_at;
		public $modified_at;

		protected static $class_name = 'Staff';
		protected static $primary_key = 'staff_id';
		protected static $table_name = 'staff';
		protected static $table_fields = array( 'staff_id','first_name','middle_name','last_name','sex','dob','phone','email','address','doe','status','password','created_at','modified_at');


		public function __construct(){
			parent::__construct();
		}

		public function getStaffId(){
			return $this->staff_id;
		}

		public static function authenticate($password, $staff_id){
			//the script will see if this password belongs to this particular user and then return the name of the user
			$password = md5($password);//this encodes the password
			$sql = "SELECT * FROM ".static::$table_name." WHERE staff_id = '$staff_id' AND password = '$password' LIMIT 1";//staff id is the first item on the array hence it will be popped
			$staff = static::findBySql($sql);//Use the above sql query to find staff
			return ($staff) ? array_shift($staff) : false;//array_shift = pop in python
		}

		public function setNewStaffId(){
			if($lastStaff = static::last()){
				$lastId = explode ('/',$lastStaff->staff_id);
				if (strlen(++$lastId[1])<3) {
					$this->staff_id = 'staff/'.str_repeat('0',3-strlen($lastId[1])).$lastId[1];
				}else{
					$this->staff_id = 'staff/'.$lastId[1];
				}	
			}else{
				$this->staff_id = 'staff/001';
			}
			
		}

		public function insertStaff(){
			$this->setNewStaffId();
			$this->password = md5($this->password);
			return ($this->create()) ? true : false;
		}

		
	}

 ?>
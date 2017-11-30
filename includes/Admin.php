<?php

  include_once ('Model.php');
  class Admin extends Model{
    public $admin_id;//
    public $username;//
    public $phone;//
    public $email;//
    public $address;
    public $status;
    public $password;//
    

    public static $class_name = 'Admin';
    public static $primary_key = 'admin_id';
    public static $table_name = 'admin';
    public static $table_fields = array('admin_id','username','phone','email','address','status','password');


    public function __construct(){
      parent::__construct();
    }

    public function getAdminId(){
      return $this->admin_id;
    }

    public function setAdminId($admin_id){
      return $this->admin_id = $admin_id;
    }

    public static function authenticate($password, $admin_id){
      //the script will see if this password belongs to this particular user and then return the name of the user
      $password = md5($password);//this encodes the password
      $sql = "SELECT * FROM ".static::$table_name." WHERE admin_id = '$admin_id' AND password = '$password' LIMIT 1";//admin id is the first item on the array hence it will be popped
      $admin = static::findBySql($sql);//Use the above sql query to find admin
      echo $sql;
      return ($admin) ? array_shift($admin) : false;//array_shift = pop in python
    }

    public function setNewAdminId(){
      if($lastAdmin = static::last()){
        $lastId = explode ('/',$lastAdmin->admin_id);
        if (strlen(++$lastId[1])<3) {
          $this->admin_id = 'admin/'.str_repeat('0',3-strlen($lastId[1])).$lastId[1];
        }else{
          $this->admin_id = 'admin/'.$lastId[1];
        } 
      }else{
        $this->admin_id = 'admin/001';
      }      
    }

    public function insertAdmin(){
      $this->setNewAdminId();
      $this->password = md5($this->password);
      // echo $sql;
      return ($this->create()) ? true : false;
    }

    public function nextId(){
      if ($lastAdmin = static::last()) {
        $lastId = $lastAdmin->admin_id;
        }else{
          $lastId = 0;
          }
        return ++$lastId;
    }
    
    public   function delete(){
      $sql = "DELETE FROM ".self::$table_name;
      $sql.= " WHERE admin_id = {$this->admin_id}";
      echo $sql;
      return static::findBySql($sql);

    }
  }

 ?>
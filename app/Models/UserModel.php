<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table='user';
	protected $primaryKey ='id';
	protected $returnType = 'object';
	protected $DBGroup='default';
	protected $allowedFields = ['oauth_id', 'name', 'email', 'NIF','id_360','profile_img', 'level','status','updated_at', 'created_at'];

	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;   




	function isAlreadyRegister($authid){
		return $this->db->table('user')->getWhere(['oauth_id'=>$authid])->getRowArray()>0?true:false;
	}
		function isAlreadyRegisteremail($email){
			return $this->db->table('user')->getWhere(['email'=>$email])->getRowArray()>0?true:false;
		}


	function updateUserData($userdata, $authid){
		$this->db->table("user")->where(['oauth_id'=>$authid])->update($userdata);
	}
	function updateUserDataEmail($userdata, $id){
		$this->db->table("user")->where(['email'=>$userdata['email']])->update($userdata);
	}
	function insertUserData($userdata){
		$this->db->table("user")->insert($userdata);
	}

	function getAllNome(){
		return $this->db->table('user')->select('id,name,id_360')->orderBy('name', 'ASC')->get()->getResultArray();
	}
	
}
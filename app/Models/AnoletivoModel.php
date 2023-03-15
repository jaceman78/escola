<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class AnoletivoModel extends Model {
    
	protected $table = 'ano_letivo';
	protected $primaryKey = 'id_anoletivo';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['anoletivo', 'status'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    


	public function getAllAL()
    {
        return $this->select('id_anoletivo, anoletivo,status')->orderBy('anoletivo', 'ASC')->findAll();//get();

    }

	// public function getAllALporDisciplina($id_disciplina)  ENGANO
    // {
    //     $db = \Config\Database::connect();

    //     $query = $db->table('modulo')
    //         ->where('disciplina_id',$id_disciplina )
			
    //         ->get();

    //     return $query->getResult();
    // }

	
}
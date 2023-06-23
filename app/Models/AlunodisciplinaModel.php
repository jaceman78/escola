<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class AlunodisciplinaModel extends Model {
    
	protected $table = 'alunodisciplina';
	protected $primaryKey = 'id_alunodisciplina';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['disciplina_id', 'aluno_id', 'dificuldades'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}
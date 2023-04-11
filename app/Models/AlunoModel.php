<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class AlunoModel extends Model {
    
	protected $table = 'aluno';
	protected $primaryKey = 'id_aluno';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['n_aluno', 'num_interno', 'nome_aluno', 'genero', 'telemovel', 'email', 'foto_aluno', 'data_nasci', 'NIF', 'ee_id', 'NEE', 'delegado', 'status'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}
<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class Medidasdl54Model extends Model {
    
	protected $table = 'medidas_dl54';
	protected $primaryKey = 'id_medida';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['tipo', 'alinea', 'descricao'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}
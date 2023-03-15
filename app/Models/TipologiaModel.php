<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class TipologiaModel extends Model {
    
	protected $table = 'tipologia';
	protected $primaryKey = 'id_tipologia';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['nome_tipologia', 'status'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    

    public function getAllTipologias()
    {
        $query = $this->select('id_tipologia, nome_tipologia')->orderBy('id_tipologia', 'ASC')->get();

        if ($query->getResult()) {
            $data = [];
            foreach ($query->getResult() as $row) {
                $data[] = $row->id_tipologia;
                $data[] = $row->nome_tipologia;
            }
            return $data;
        } else {
            return false;
        }
    }
	
}
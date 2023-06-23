<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class ModuloModel extends Model {
    
	protected $table = 'modulo';
	protected $primaryKey = 'id_modulo';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['nome_modulo', 'disciplina_id', 'ano', 'horas_modulo'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    


	public function findAllporDisciplina($id_disciplina)
    {
        $db = \Config\Database::connect();

        $query = $db->table('modulo')
			->select('modulo.*')
            ->where('disciplina_id',$id_disciplina )
			->get();

        return $query->getResult();
    }


	public function getModuloscomDisciplinas()
    {
        $db = \Config\Database::connect();

        $query = $db->table('modulo')
            ->select('modulo.*,disciplina.nome  ')
			->join('disciplina','disciplina.id_disciplina=modulo.disciplina_id' )    
			
            ->get();

        return $query->getResult();
    }

	public function getNomeDisciplina($id_disciplina)
    {
        $db = \Config\Database::connect();

        $query = $db->table('modulo')
            ->select('modulo.id_modulo,disciplina.nome  ')
				->where('disciplina_id',$id_disciplina )
			->join('disciplina','disciplina.id_disciplina=modulo.disciplina_id' )    
		
            ->get();

        return $query->getResult();
    }
	
}
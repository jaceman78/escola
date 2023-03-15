<?php


namespace App\Models;
use CodeIgniter\Model;

class TurmadisciplinaModel extends Model {
    
	protected $table = 'turmadisciplina';
	protected $primaryKey = 'id_turmadisciplina';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['turma_id', 'disciplina_id', 'carga_horaria'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    


    public function findAllporTurma($id_turma)
    {
        $db = \Config\Database::connect();

        $query = $db->table('turmadisciplina')
			->select('turmadisciplina.*,turma.ano')
			->join('turma','turmadisciplina.turma_id=turma.id_turma')
            ->where('disciplina_id',$id_turma )

			->get(); 

        return $query->getResult();
    }
}
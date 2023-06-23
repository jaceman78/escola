<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class TurmalunoModel extends Model {
    
	protected $table = 'turmaluno';
	protected $primaryKey = 'id_turmaaluno';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['anoletivo_id', 'turma_id', 'num_interno'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	




	public function findAlunosTurma($id_turma)
	{
    $db = \Config\Database::connect();

    $query = $db->table('turmaluno')
        ->select('turmaluno.*, aluno.*')
        ->join('aluno', 'turmaluno.num_interno = aluno.id_aluno')
        //->join('user', 'turmadisciplina.user_id = user.id_360', 'left') //left tambem faz aparecer os NULLs
		//->join('disciplina', 'turmadisciplina.disciplina_id = disciplina.id_disciplina')
        ->where('turma_id', $id_turma) 
		->orderby('aluno.nome_aluno','ASC')
        ->get(); 

    return $query->getResult();
	}


}
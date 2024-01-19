<?php


namespace App\Models;
use CodeIgniter\Model;

class TurmadisciplinaModel extends Model {
    
	protected $table = 'turmadisciplina';
	protected $primaryKey = 'id_turmadisciplina';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['turma_id', 'disciplina_id', 'carga_horaria','user_id','anoletivo_id'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    


    // public function findAllporTurma($id_turma)
    // {
    //     $db = \Config\Database::connect();

    //     $query = $db->table('turmadisciplina,user')
	// 		->select('turmadisciplina.*,turma.ano,turma.nome,user.name')
	// 		->join('turma','turmadisciplina.turma_id=turma.id_turma')
	// 		->join('user','turmadisciplina.user_id=user.id')
    //         ->where('turma_id',$id_turma)
	// 		->get(); 

    //     return $query->getResult();
    // }
	public function findAllporTurma($id_turma)
	{
    $db = \Config\Database::connect();

    $query = $db->table('turmadisciplina')
        ->select('turmadisciplina.*, turma.nome AS nometurma, user.name AS nomeprof, disciplina.nome AS nomedisc, disciplina.id_disciplina AS id_disciplina')
        ->join('turma', 'turmadisciplina.turma_id = turma.id_turma')
        ->join('user', 'turmadisciplina.user_id = user.id_360', 'left') //left tambem faz aparecer os NULLs
		->join('disciplina', 'turmadisciplina.disciplina_id = disciplina.id_disciplina')

        ->where('turma_id', $id_turma) 
        ->get(); 

    return $query->getResult();
}

}
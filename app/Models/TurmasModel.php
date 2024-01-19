<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class TurmasModel extends Model {
    
	protected $table = 'turma';
	protected $primaryKey = 'id_turma';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['ano', 'nome', 'anoletivo_id', 'tipologia_id'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;     

	public function getTurmasComAnosLetivos()
    {
        $db = \Config\Database::connect();

        $query = $db->table('turma')
            ->select('turma.*, ano_letivo.anoletivo,tipologia.nome_tipologia ')
			->join('tipologia','tipologia.id_tipologia=turma.tipologia_id' )
            ->join('ano_letivo', 'ano_letivo.id_anoletivo = turma.anoletivo_id')
			
            ->get();

        return $query->getResult();
    }


	public function getTurmasporAnoletivo($id_anoletivo,$tipo)
    {
        $db = \Config\Database::connect();

        $query = $db->table('turma')
            ->select('turma.*, ano_letivo.anoletivo,tipologia.nome_tipologia ')
			->join('tipologia','tipologia.id_tipologia=turma.tipologia_id' )
            ->join('ano_letivo', 'ano_letivo.id_anoletivo = turma.anoletivo_id')
			->where('anoletivo_id',$id_anoletivo)
			->where('tipologia_id',$tipo)
            ->get();

        return $query->getResult();
    }


	public function getTurmasregular()
    {
        $db = \Config\Database::connect();

        $query = $db->table('turma')
		->select('turma.*, ano_letivo.anoletivo,tipologia.nome_tipologia,ano_letivo.status ')
		->join('tipologia','tipologia.id_tipologia=turma.tipologia_id' )
		->join('ano_letivo', 'ano_letivo.id_anoletivo = turma.anoletivo_id')
		->where('ano_letivo.status',1)
		->where('tipologia_id',1)
			->orderby('nome','ASC')
            ->get();

        return $query->getResult();
    }
	public function getTurmasprofissional()
    {
        $db = \Config\Database::connect();

        $query = $db->table('turma')
		->select('turma.*, ano_letivo.anoletivo,tipologia.nome_tipologia,ano_letivo.status ')
		->join('tipologia','tipologia.id_tipologia=turma.tipologia_id' )
		->join('ano_letivo', 'ano_letivo.id_anoletivo = turma.anoletivo_id')
		->where('ano_letivo.status',1)
		->where('tipologia_id',2)
			->orderby('nome','ASC') 
            ->get();

        return $query->getResult();
    }


	public function findDetalhesTurma($id_turma)
	{
		$db = \Config\Database::connect();
	
		$query = $db->table('turma')
			->select('turma.*,tipologia.nome_tipologia,user.name as nomedt,user.profile_img,user.email,
			 (SELECT COUNT(*) FROM turmadisciplina WHERE turma_id = ' . $id_turma . ') as num_disciplinas')
			->join('tipologia','tipologia.id_tipologia=turma.tipologia_id' )
			->join('user','user.id=turma.dt_id', 'left' )
			->where('id_turma', $id_turma)
			->get();
	
		return $query->getResult();
	}
	
}
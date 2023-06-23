<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class DisciplinasModel extends Model {
    
	protected $table = 'disciplina';
	protected $primaryKey = 'id_disciplina';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['nome','id_disciplina_e360', 'horas', 'tipologia_id'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    


	public function getDisciplinascomtipologias()
    {
        $db = \Config\Database::connect();

        $query = $db->table('disciplina')
            ->select('disciplina.*,tipologia.nome_tipologia ')
			->join('tipologia','tipologia.id_tipologia=disciplina.tipologia_id' )			
            ->get();

        return $query->getResult();
    }



	public function getAllDisciplinas($tipo)
	{
        $db = \Config\Database::connect();

        $query = $db->table('disciplina')
            ->select('disciplina.* ')
			->where('tipologia_id',$tipo)
			->orderby('nome','ASC') 
            ->get();

        return $query->getResult();
    }




    public function getAllDisciplinasporano($tipo,$ano)
	{
        $db = \Config\Database::connect();

        $query = $db->table('disciplina')
            ->select('disciplina.* ')
			->where('tipologia_id',$tipo)
            ->like('id_disciplina_e360', 'D'.$ano.'%', 'after')        
			->orderby('nome','ASC') 
            ->get(); 

        return $query->getResult();
    }
    public function getAllDisciplinasprofissional($tipo)
	{
        $db = \Config\Database::connect();

        $query = $db->table('disciplina')
            ->select('disciplina.* ')
			->where('tipologia_id',$tipo)       
			->orderby('nome','ASC') 
            ->get(); 

        return $query->getResult();
    }




	public function getDisciplinasregular()
    {
        $db = \Config\Database::connect();

        $query = $db->table('disciplina')
            ->select('disciplina.*,tipologia.nome_tipologia ')
			->join('tipologia','tipologia.id_tipologia=disciplina.tipologia_id' )
			->where('disciplina.tipologia_id','1')
			->orderby('nome','ASC')
            ->get();

        return $query->getResult();
    }

	public function getDisciplinasprofissional()
    {
        $db = \Config\Database::connect();

        $query = $db->table('disciplina')
            ->select('disciplina.*,tipologia.nome_tipologia ')
			->join('tipologia','tipologia.id_tipologia=disciplina.tipologia_id' )
			->where('disciplina.tipologia_id','2')
			->orderby('nome','ASC') 
            ->get();

        return $query->getResult();
    }


    public function getNomeDisciplina($id_disciplina)
    {
        $db = \Config\Database::connect();

        $query = $db->table('disciplina')
            ->select('disciplina.nome  ')
				->where('id_disciplina',$id_disciplina )   
		
            ->get();

        return $query->getResult();
    }
		
} 
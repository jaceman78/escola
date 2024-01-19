<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class AlunoModel extends Model {
    
	protected $table = 'aluno';
	protected $primaryKey = 'id_aluno';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['id_aluno','num_E360',  'nome_aluno', 'genero', 'telemovel', 'email', 'foto_aluno', 'data_nasci', 'NIF', 'ee_id', 'NEE', 'delegado', 'status'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    



	public function add($data)
    {
        $this->insert($data);

        // Verifica se a inserção foi bem sucedida
        if ($this->affectedRows() > 0) {
            return 'true';
        } else {
            return 'false';
        }
    }
	
	public function obter_nome_por_num_interno($num_interno) {
    // Faz uma consulta  àBD para obter todos os alunos que tenham os primeiros números inseridos
    $query = $this->db->table('aluno')->where('id_aluno', $num_interno)->get();

    // Retorna os resultados como um array
    return $query->getResultArray();
	}



	
}
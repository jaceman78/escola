<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\TurmadisciplinaModel;
use App\Models\TurmasModel;

class Turmadisciplina extends BaseController
{
	
    protected $turmadisciplinaModel;
	protected $turmaModel;

    protected $validation;
	
	public function __construct()
	{
	    $this->turmadisciplinaModel = new TurmadisciplinaModel();
		$this->turmasModel = new TurmasModel();		
       	$this->validation =  \Config\Services::validation();	
	}
	
	public function index()
	{
	    $data = [
                'controller'    	=> 'turmadisciplina',
                'title'     		=> 'turmadisciplina'				
			];		
		return view('turmadisciplina', $data);			
	}


	public function indexporturma($id_turma)
	{
		$result = $this->turmadisciplinaModel->findAllporTurma($id_turma);
		$resultturma = $this->turmasModel->where('id_turma' ,$id_turma)->first();		

	    $data = [
			'controller'    	=> 'turmadisciplina',
			'title'     		=> 'Disciplinas por Turma'	,
			'pageTitle'			=> 'Disciplinas da turma '	,		
			'idturma'			=> $id_turma,
			'ano'				=> $resultturma->ano,
			'nomedaturma'       => $resultturma->nome,
			'tipo'				=> $resultturma->tipologia_id

			];

		return view('dashboard/turmadisciplina', $data,);			
	}



	public function turmadetalhes($id_turma)	{
		//$result = $this->turmadisciplinaModel->findAllporTurma($id_turma);
		$resultturma = $this->turmasModel->where('id_turma' ,$id_turma)->first();
	    $data = [
			'controller'    	=> 'turmadisciplina',
			'title'     		=> 'Detalhes da turma '.$resultturma->nome	,
			'pageTitle'			=> 'Detalhes da turma '	.$resultturma->nome,		
			'idturma'			=> $id_turma,
			'ano'				=> $resultturma->ano,
			'nomedaturma'       => $resultturma->nome,
			'tipo'				=> $resultturma->tipologia_id
			];
		
		return view('dashboard/turmadetalhesreg', $data);			
	}


	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->turmadisciplinaModel->select()->findAll();		
		foreach ($result as $key => $value) {							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id_turmadisciplina .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id_turmadisciplina .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';
			$data['data'][$key] = array(
			$value->turma_id,
            $value->disciplina_id,
            $value->carga_horaria,
				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}


	public function getDisciplinaDetalhes($id_turma) //cards lista todos os detalhes das disciplinas
	{
	$data = $this->turmadisciplinaModel->findAllporTurma($id_turma);	
	//echo "<pre>"; print_r($data);
	return $this->response->setJSON($data);
	}



    public function getAllTurmadisciplina($turma_id)
	{
 		$response = $data['data'] = array();
		$result = $this->turmadisciplinaModel->findAllporTurma($turma_id);		
		foreach ($result as $key => $value) {							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id_turmadisciplina .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id_turmadisciplina .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';
			$data['data'][$key] = array(
			$value->turma_id,
            $value->disciplina_id,
            $value->carga_horaria,
			$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();		
		$id = $this->request->getPost('id_turmadisciplina');		
		if ($this->validation->check($id, 'required|numeric')) {			
			$data = $this->turmadisciplinaModel->where('id_turmadisciplina' ,$id)->first();			
			return $this->response->setJSON($data);					
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}			
	}	

	public function add()
	{		
		// Obtenha os dados do formulário
		$turma_id = $this->request->getPost('turma_id');
		$disciplina_ids = $this->request->getPost('duallistbox');
		$carga_horaria = $this->request->getPost('carga_horaria');
		$response['disciplinas vindas da view'] = $this->request->getPost('duallistbox'); //tirar
		$response['disciplina_id'] = $this->request->getPost('duallistbox');; //tirar	
		// Obtenha as disciplinas existentes na tabela turmadisciplina para a turma em questão
		$turmaDisciplinas = $this->turmadisciplinaModel->where('turma_id', $turma_id)->findAll();

		// Crie um array com os IDs das disciplinas existentes na tabela turmadisciplina
		$existingDisciplinaIds = [];
		foreach ($turmaDisciplinas as $turmaDisciplina) {
			$existingDisciplinaIds[] = $turmaDisciplina->disciplina_id;			
		}

		$response['array de existentes'] = $turmaDisciplinas; //tirar	
		// Crie um array com os IDs das disciplinas selecionadas
		$selectedDisciplinaIds = [];
		if (!empty($disciplina_ids)) {
			foreach ($disciplina_ids as $disciplina_id) {
				$selectedDisciplinaIds[] = $disciplina_id;
			}
		}
		else{
		foreach ($existingDisciplinaIds as $disciplina_id) {
			$response['apagou este'] = $disciplina_id; //tirar	
			$this->turmadisciplinaModel->where('turma_id', $turma_id)
				->where('disciplina_id', $disciplina_id)
				->delete();			
		}
		$response['success'] = true;
		$response['messages'] = lang("vazio") ;
		return $this->response->setJSON($response);
		}

		// Remova as disciplinas que estão presentes na tabela turmadisciplina mas não estão selecionadas
		$disciplinasToRemove = array_diff($existingDisciplinaIds, $selectedDisciplinaIds);
		foreach ($disciplinasToRemove as $disciplinaToRemove) {
			$response['apagou este'] = $disciplina_id; //tirar	
			$this->turmadisciplinaModel->where('turma_id', $turma_id)
				->where('disciplina_id', $disciplinaToRemove)
				->delete();
				
		}

		// Se houver disciplinas selecionadas
		if (!empty($disciplina_ids)) {

			// Para cada disciplina selecionada, insira ou atualize a linha na tabela turmadisciplina
			foreach ($disciplina_ids as $disciplina_id) {
				// Verifique se a linha já existe na tabela turmadisciplina
					$turmaDisciplina = $this->turmadisciplinaModel->where('turma_id', $turma_id)
					->where('disciplina_id', $disciplina_id)
					->first();
					
				if ($turmaDisciplina) {
					// Se a linha existir, atualize a carga horária		
					$response['já existe  este update'] = $disciplina_id; //tirar	
					$this->turmadisciplinaModel->update($turmaDisciplina->turma_id, ['carga_horaria' => $carga_horaria]);
				} else {
					// Caso contrário, insira uma nova linha na tabela turmadisciplina
					$response['insere este'] = $disciplina_id; //tirar	
					$this->turmadisciplinaModel->insert(['turma_id' => $turma_id, 'disciplina_id' => $disciplina_id, 'carga_horaria' => $carga_horaria]);
				}
			}
			$response['success'] = true;
			$response['messages'] = lang("App.insert-success") ;
			$response['diferença'] =$disciplinasToRemove;
		}
		else{
			$response['success'] = false;
			$response['messages'] = lang("vazio") ;
		}

		
        return $this->response->setJSON($response);
	}

	public function edit()
	{
        $response = array();
		
		$fields['id_turmadisciplina'] = $this->request->getPost('id_turmadisciplina');
		$fields['turma_id'] = $this->request->getPost('turma_id');
		$fields['disciplina_id'] = $this->request->getPost('disciplina_id');
		$fields['carga_horaria'] = $this->request->getPost('carga_horaria');


        $this->validation->setRules([
			            'turma_id' => ['label' => 'Turma id', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
            'disciplina_id' => ['label' => 'Disciplina id', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
            'carga_horaria' => ['label' => 'Carga horaria', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->turmadisciplinaModel->update($fields['id_turmadisciplina'], $fields)) {
				
                $response['success'] = true;
                $response['messages'] = lang("App.update-success");	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("App.update-error");
				
            }
        }
		
        return $this->response->setJSON($response);	
	}
	
	public function remove()
	{
		$response = array();
		
		$id = $this->request->getPost('id_turmadisciplina');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->turmadisciplinaModel->where('id_turmadisciplina', $id)->delete()) {
								
				$response['success'] = true;
				$response['messages'] = lang("App.delete-success");	
				
			} else {
				
				$response['success'] = false;
				$response['messages'] = lang("App.delete-error");
				
			}
		}	
	
        return $this->response->setJSON($response);		
	}	
		
}	

<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DisciplinasModel;
use App\Models\TurmadisciplinaModel;

class Disciplinas extends BaseController
{
	
    protected $disciplinasModel;
	protected $turmadisciplinaModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->disciplinasModel = new DisciplinasModel();
		$this->turmadisciplinaModel=new TurmadisciplinaModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{
	    $data = [
                'controller'    	=> 'disciplinas',
                'title'     		=> 'Disciplinas',
				'pageTitle'			=> 'Disciplinas'					
			];
		
		return view('dashboard/disciplinas', $data);			
	}
	public function indexregular()
	{
	    $data = [
                 'controller'    	=> 'disciplinas',
                 'title'     		=> 'Disciplinas Regular',
				 'pageTitle'		=> 'Disciplinas dos Cursos Regulares '					
			];
		
		return view('dashboard/disciplinas_regular', $data);			
	}

	public function indexprofissional()
	{
	    $data = [
                 'controller'    	=> 'disciplinas',
                 'title'     		=> 'Disciplinas Profissional',
				 'pageTitle'		=> 'Disciplinas dos Curso Profissionais'					
			];
		
		return view('dashboard/disciplinas_profissional', $data);			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		//$result = $this->disciplinasModel->select()->findAll();
		$result= $this->disciplinasModel->getDisciplinascomtipologias(); //<-novo
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id_disciplina .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id_disciplina .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
			$value->nome,
			$value->horas,
			//$value->tipologia_id,
			$value->nome_tipologia,

				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}



	public function getAllregular()	{
		
 		$response = $data['data'] = array();	

		//$result = $this->disciplinasModel->select()->findAll();
		$result= $this->disciplinasModel->getDisciplinasregular(); //<-novo
		foreach ($result as $key => $value) {							
			
			$ops = '<a type="button" class=" btn btn-sm  btn-info" onClick="save('. $value->id_disciplina .')"><i class="fa-solid fa-eye"></i>' .  lang("App.detalhes")  . '</a>';
			
			$data['data'][$key] = array(
			$value->nome,
			$value->horas,
			//$value->tipologia_id,
			$value->nome_tipologia,

				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}


	public function getAllprofissional()
	{
		
 		$response = $data['data'] = array();	

		//$result = $this->disciplinasModel->select()->findAll();
		$result= $this->disciplinasModel->getDisciplinasprofissional(); //<-novo
		foreach ($result as $key => $value) {
							
			$ops = '<a type="button" class=" btn btn-sm  btn-info" href="modulo/indexpordisciplina/'. $value->id_disciplina .'"><i class="fa-solid fa-eye"></i>' .  lang("App.detalhes")  . '</a>';
			
			$data['data'][$key] = array(
			$value->nome,
			$value->horas,
			//$value->tipologia_id,
			$value->nome_tipologia,
			$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getAllDisciplinas($tipo,$turma_id)
	{
 		$response = $data['data'] = array();
		$result = $this->disciplinasModel->getAllDisciplinas($tipo);	
		$ops='';
		foreach ($result as $key => $value) 
		{
			$existing_registo = $this->turmadisciplinaModel
			->where('disciplina_id', $value->id_disciplina)
			->where('turma_id', $turma_id)->first();
			if($existing_registo)
			{
				$ops= $value->id_disciplina . '" selected="selected">' . $value->nome . '</option>';			
				$data['data'][$key] = array(
					$ops
				);
			}
			else
			{
				$ops=$value->id_disciplina.'"">'. $value->nome . '</option>';			
				$data['data'][$key] = array(
					$ops);
			}
        
		} 

		return $this->response->setJSON($data);		
	}




	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id_disciplina');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->disciplinasModel->where('id_disciplina' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id_disciplina'] = $this->request->getPost('id_disciplina');
		$fields['nome'] = $this->request->getPost('nome');
		$fields['horas'] = $this->request->getPost('horas');
		$fields['tipologia_id'] = $this->request->getPost('tipologia_id');


        $this->validation->setRules([
			'nome' => ['label' => 'Nome da disciplina', 'rules' => 'required|min_length[0]|max_length[255]'],
            //'horas' => ['label' => 'Carga horária' ],
            'tipologia_id' => ['label' => 'Tipologia', 'rules' => 'required|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->disciplinasModel->insert($fields)) {
												
                $response['success'] = true;
                $response['messages'] = lang("App.insert-success") ;	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("App.insert-error") ;
				
            }
        }
		
        return $this->response->setJSON($response);
	}

	public function edit()
	{
        $response = array();
		
		$fields['id_disciplina'] = $this->request->getPost('id_disciplina');
		$fields['nome'] = $this->request->getPost('nome');
		$fields['horas'] = $this->request->getPost('horas');
		$fields['tipologia_id'] = $this->request->getPost('tipologia_id');


        $this->validation->setRules([
			            'nome' => ['label' => 'Nome da disciplina', 'rules' => 'required|min_length[0]|max_length[255]'],
            'horas' => ['label' => 'Carga horária', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
            'tipologia_id' => ['label' => 'Tipologia', 'rules' => 'required|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->disciplinasModel->update($fields['id_disciplina'], $fields)) {
				
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
		
		$id = $this->request->getPost('id_disciplina');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->disciplinasModel->where('id_disciplina', $id)->delete()) {
								
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

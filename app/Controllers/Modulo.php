<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ModuloModel;
use App\Models\DisciplinasModel;
class Modulo extends BaseController
{
	
    protected $moduloModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->moduloModel = new ModuloModel();
		$this->disciplinaModel=new DisciplinasModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'modulo',
                'title'     		=> 'modulo'	,	
				'pageTitle'			=> 'Disciplinas dos Cursos Regulares '			
			];
		
		return view('dashboard/modulo', $data);
			
	}

	public function indexpordisciplina($id_disciplina)
	{
		$result = $this->moduloModel->getNomeDisciplina($id_disciplina);
		$result2 = $this->disciplinaModel->getNomeDisciplina($id_disciplina);
	    $data = [
                'controller'    	=> 'modulo',
                'title'     		=> 'Módulos',
				'pageTitle'			=> 'Módulos dos Cursos '	,		
				'iddisciplina'		=> $id_disciplina,
				'nomedadisciplina'  => $result2[0]->nome,
			];
		
		return view('dashboard/modulospordisciplina', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->moduloModel->select()->getModuloscomDisciplinas();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id_modulo .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id_modulo .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
				$value->nome_modulo,
				//$value->disciplina_id,
				$value->nome, //da disciplina
				$value->ano, //da disciplina
				$value->horas_modulo,

				$ops				
			);
		} 
		return $this->response->setJSON($data);		
	}



	public function getAllpordisciplina($id_disciplina)
	{
 		$response = $data['data'] = array();	

		$result = $this->moduloModel->select()->findAllporDisciplina($id_disciplina);
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id_modulo .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id_modulo .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
				$value->nome_modulo,
				//$value->disciplina_id,
				$value->ano, //da disciplina
				$value->horas_modulo,

				$ops				
			);
		} 
	
		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id_modulo');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->moduloModel->where('id_modulo' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id_modulo'] = $this->request->getPost('id_modulo');
		$fields['nome_modulo'] = $this->request->getPost('nome_modulo');
		$fields['ano'] = $this->request->getPost('ano');
		$fields['disciplina_id'] = $this->request->getPost('disciplina_id');
		$fields['horas_modulo'] = $this->request->getPost('horas_modulo');


        $this->validation->setRules([
			'nome_modulo' => ['label' => 'Nome', 'rules' => 'required|min_length[0]|max_length[255]'],
            'disciplina_id' => ['label' => 'Disciplina id', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
            'horas_modulo' => ['label' => 'Horas modulo', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'ano' => ['label' => 'Ano', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->moduloModel->insert($fields)) {
												
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
		
		$fields['id_modulo'] = $this->request->getPost('id_modulo');
		$fields['nome_modulo'] = $this->request->getPost('nome_modulo');
		$fields['disciplina_id'] = $this->request->getPost('disciplina_id');
		$fields['horas_modulo'] = $this->request->getPost('horas_modulo');
		$fields['ano'] = $this->request->getPost('ano');


        $this->validation->setRules([
			            'nome_modulo' => ['label' => 'Nome', 'rules' => 'required|min_length[0]|max_length[255]'],
            'disciplina_id' => ['label' => 'Disciplina id', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
            'horas_modulo' => ['label' => 'Horas modulo', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'ano' => ['label' => 'Ano', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->moduloModel->update($fields['id_modulo'], $fields)) {
				
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
		
		$id = $this->request->getPost('id_modulo');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->moduloModel->where('id_modulo', $id)->delete()) {
								
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

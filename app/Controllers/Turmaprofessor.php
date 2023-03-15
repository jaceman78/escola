<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\TurmaprofessorModel;

class Turmaprofessor extends BaseController
{
	
    protected $turmaprofessorModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->turmaprofessorModel = new TurmaprofessorModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'turmaprofessor',
                'title'     		=> 'turmaprofessor'				
			];
		
		return view('turmaprofessor', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->turmaprofessorModel->select()->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id_turmaprofessor .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id_turmaprofessor .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
				$value->id_turmaprofessor,
$value->turma_id,
$value->user_id,
$value->status,

				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id_turmaprofessor');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->turmaprofessorModel->where('id_turmaprofessor' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id_turmaprofessor'] = $this->request->getPost('id_turmaprofessor');
$fields['turma_id'] = $this->request->getPost('turma_id');
$fields['user_id'] = $this->request->getPost('user_id');
$fields['status'] = $this->request->getPost('status');


        $this->validation->setRules([
			            'turma_id' => ['label' => 'Turma id', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
            'user_id' => ['label' => 'User id', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
            'status' => ['label' => 'Status', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->turmaprofessorModel->insert($fields)) {
												
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
		
		$fields['id_turmaprofessor'] = $this->request->getPost('id_turmaprofessor');
$fields['turma_id'] = $this->request->getPost('turma_id');
$fields['user_id'] = $this->request->getPost('user_id');
$fields['status'] = $this->request->getPost('status');


        $this->validation->setRules([
			            'turma_id' => ['label' => 'Turma id', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
            'user_id' => ['label' => 'User id', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
            'status' => ['label' => 'Status', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->turmaprofessorModel->update($fields['id_turmaprofessor'], $fields)) {
				
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
		
		$id = $this->request->getPost('id_turmaprofessor');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->turmaprofessorModel->where('id_turmaprofessor', $id)->delete()) {
								
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

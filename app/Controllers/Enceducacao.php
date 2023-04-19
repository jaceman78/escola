<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\EnceducacaoModel;

class Enceducacao extends BaseController
{
	
    protected $enceducacaoModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->enceducacaoModel = new EnceducacaoModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'enceducacao',
                'title'     		=> 'Encarregado de Educação',
				'pageTitle'			=> 'Encarregados de Educação'	
			];
		
		return view('dashboard/enceducacao', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->enceducacaoModel->select()->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id_ee .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id_ee .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
			$value->id_ee,
			$value->nome_ee,
			$value->telemovel_ee,
			$value->email_ee,
			$value->NIF_ee,
			$value->representante,
			$value->status,

				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id_ee');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->enceducacaoModel->where('id_ee' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id_ee'] = $this->request->getPost('id_ee');
		$fields['nome_ee'] = $this->request->getPost('nome_ee');
		$fields['telemovel_ee'] = $this->request->getPost('telemovel_ee');
		$fields['email_ee'] = $this->request->getPost('email_ee');
		$fields['NIF_ee'] = $this->request->getPost('NIF_ee');
		$fields['representante'] = $this->request->getPost('representante');
		$fields['status'] = $this->request->getPost('status');


        $this->validation->setRules([
			            'nome_ee' => ['label' => 'Nome', 'rules' => 'permit_empty|min_length[0]|max_length[255]'],
            'telemovel_ee' => ['label' => 'Telemovel', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'email_ee' => ['label' => 'Email', 'rules' => 'permit_empty|valid_email|min_length[0]|max_length[255]'],
            'NIF_ee' => ['label' => 'NIF', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'representante' => ['label' => 'Representante', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'status' => ['label' => 'Status', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->enceducacaoModel->insert($fields)) {
												
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
		
		$fields['id_ee'] = $this->request->getPost('id_ee');
		$fields['nome_ee'] = $this->request->getPost('nome_ee');
		$fields['telemovel_ee'] = $this->request->getPost('telemovel_ee');
		$fields['email_ee'] = $this->request->getPost('email_ee');
		$fields['NIF_ee'] = $this->request->getPost('NIF_ee');
		$fields['representante'] = $this->request->getPost('representante');
		$fields['status'] = $this->request->getPost('status');


        $this->validation->setRules([
			            'nome_ee' => ['label' => 'Nome', 'rules' => 'permit_empty|min_length[0]|max_length[255]'],
            'telemovel_ee' => ['label' => 'Telemovel', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'email_ee' => ['label' => 'Email', 'rules' => 'permit_empty|valid_email|min_length[0]|max_length[255]'],
            'NIF_ee' => ['label' => 'NIF', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'representante' => ['label' => 'Representante', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'status' => ['label' => 'Status', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->enceducacaoModel->update($fields['id_ee'], $fields)) {
				
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
		
		$id = $this->request->getPost('id_ee');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->enceducacaoModel->where('id_ee', $id)->delete()) {
								
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

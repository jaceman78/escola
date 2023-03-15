<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\TipologiaModel;

class Tipologia extends BaseController
{
	
    protected $tipologiaModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->tipologiaModel = new TipologiaModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'tipologia',
                'title'     		=> 'tipologia'				
			];
		
		return view('tipologia', $data);
			
	}


    public function getAlltipologia()
	{	
		$result = $this->tipologiaModel->select()->findAll();
		foreach ($result as $key => $value) {				
				
			$data['data'][$key] = array(					
					
				$ops = '<option value="' . $value->id_tipologia . '">' . $value->nome_tipologia . '</option>'
					
			);	
		}	
		
		return $this->response->setJSON($data);		
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->tipologiaModel->select()->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id_tipologia .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id_tipologia .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
				$value->nome_tipologia,
				$value->status,

				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id_tipologia');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->tipologiaModel->where('id_tipologia' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id_tipologia'] = $this->request->getPost('id_tipologia');
		$fields['nome_tipologia'] = $this->request->getPost('nome_tipologia');
		$fields['status'] = $this->request->getPost('status');


        $this->validation->setRules([
			            'nome_tipologia' => ['label' => 'Nome tipologia', 'rules' => 'permit_empty|min_length[0]|max_length[255]'],
            'status' => ['label' => 'Status', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[1]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->tipologiaModel->insert($fields)) {
												
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
		
		$fields['id_tipologia'] = $this->request->getPost('id_tipologia');
		$fields['nome_tipologia'] = $this->request->getPost('nome_tipologia');
		$fields['status'] = $this->request->getPost('status');


        $this->validation->setRules([
			            'nome_tipologia' => ['label' => 'Nome tipologia', 'rules' => 'permit_empty|min_length[0]|max_length[255]'],
            'status' => ['label' => 'Status', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[1]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->tipologiaModel->update($fields['id_tipologia'], $fields)) {
				
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
		
		$id = $this->request->getPost('id_tipologia');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->tipologiaModel->where('id_tipologia', $id)->delete()) {
								
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

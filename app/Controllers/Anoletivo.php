<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AnoletivoModel;

class Anoletivo extends BaseController
{
	
    protected $anoletivoModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->anoletivoModel = new AnoletivoModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'anoletivo',
                'title'     		=> 'Anos letivos',	
			 	'pageTitle'			=> 'Ano Letivo'		
			];
		return view('dashboard/anoletivo', $data);
			
	}

	public function getAllAL()
	{		
		//$model = new AnoLetivoModel();
		//	$result = $this->anoletivoModel->select()->findAll();
		$result = $this->anoletivoModel->select()->getAllAL();
			//$ops="";

			foreach ($result as $key => $value) 
			{					
				if ($value->status==1) {
				$data['data'][$key] = array(
						
					$ops = '<option value="' . $value->id_anoletivo . '"selected>' . $value->anoletivo . '</option>'	
				);			
			}else{
				$data['data'][$key] = array(
				$ops = '<option value="' . $value->id_anoletivo . '">' . $value->anoletivo . '</option>'	
			);	

			}
			}
		
		
		return $this->response->setJSON($data);		
	}


	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->anoletivoModel->select()->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id_anoletivo .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			//$ops .= '<a class="dropdown-item text-orange"  onClick="importar('. $value->id_anoletivo .')"><i class="fa-solid fa-cogs"></i>   ' .  "importar"  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id_anoletivo .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
				$value->anoletivo,
				$value->status,

				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	





	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id_anoletivo');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->anoletivoModel->where('id_anoletivo' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id_anoletivo'] = $this->request->getPost('id_anoletivo');
		$fields['anoletivo'] = $this->request->getPost('anoletivo');
		$fields['status'] = $this->request->getPost('status');


        $this->validation->setRules([
			            'anoletivo' => ['label' => 'Anoletivo', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'status' => ['label' => 'Status', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[1]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->anoletivoModel->insert($fields)) {
												
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
		
		$fields['id_anoletivo'] = $this->request->getPost('id_anoletivo');
		$fields['anoletivo'] = $this->request->getPost('anoletivo');
		$fields['status'] = $this->request->getPost('status');


        $this->validation->setRules([
			            'anoletivo' => ['label' => 'Anoletivo', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'status' => ['label' => 'Status', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[1]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->anoletivoModel->update($fields['id_anoletivo'], $fields)) {
				
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
		
		$id = $this->request->getPost('id_anoletivo');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->anoletivoModel->where('id_anoletivo', $id)->delete()) {
								
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

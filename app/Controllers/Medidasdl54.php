<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Medidasdl54Model;

class Medidasdl54 extends BaseController
{
	
    protected $medidasdl54Model;
    protected $validation;
	
	public function __construct()
	{
	    $this->medidasdl54Model = new Medidasdl54Model();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'medidasdl54',
                'title'     		=> 'medidas_dl54'				
			];
		
		return view('dashboard\medidasdl54', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->medidasdl54Model->select()->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id_medida .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id_medida .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
				$value->id_medida,
$value->tipo,
$value->alinea,
$value->descricao,

				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id_medida');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->medidasdl54Model->where('id_medida' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id_medida'] = $this->request->getPost('id_medida');
$fields['tipo'] = $this->request->getPost('tipo');
$fields['alinea'] = $this->request->getPost('alinea');
$fields['descricao'] = $this->request->getPost('descricao');


        $this->validation->setRules([
			            'tipo' => ['label' => 'Tipo', 'rules' => 'permit_empty|min_length[0]|max_length[10]'],
            'alinea' => ['label' => 'Alinea', 'rules' => 'permit_empty|min_length[0]|max_length[10]'],
            'descricao' => ['label' => 'Descricao', 'rules' => 'permit_empty|min_length[0]|max_length[500]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->medidasdl54Model->insert($fields)) {
												
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
		
		$fields['id_medida'] = $this->request->getPost('id_medida');
$fields['tipo'] = $this->request->getPost('tipo');
$fields['alinea'] = $this->request->getPost('alinea');
$fields['descricao'] = $this->request->getPost('descricao');


        $this->validation->setRules([
			            'tipo' => ['label' => 'Tipo', 'rules' => 'permit_empty|min_length[0]|max_length[10]'],
            'alinea' => ['label' => 'Alinea', 'rules' => 'permit_empty|min_length[0]|max_length[10]'],
            'descricao' => ['label' => 'Descricao', 'rules' => 'permit_empty|min_length[0]|max_length[500]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->medidasdl54Model->update($fields['id_medida'], $fields)) {
				
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
		
		$id = $this->request->getPost('id_medida');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->medidasdl54Model->where('id_medida', $id)->delete()) {
								
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

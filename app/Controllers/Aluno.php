<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AlunoModel;

class Aluno extends BaseController
{
	
    protected $alunoModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->alunoModel = new AlunoModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'aluno',
                'title'     		=> 'aluno',		
				'pageTitle'			=> 'Listagem de alunos'			
			];
		
		return view('dashboard/listar_alunos', $data);
			
	}
	public function listagem()
	{

	    $data = [
                'controller'    	=> 'aluno',
                'title'     		=> 'aluno',		
				'pageTitle'			=> 'Listagem de alunos'			
			];
		
		return view('dashboard/listar_alunos', $data);
			
	}


	public function profilealuno($id_aluno)
	{
		$result = $this->alunoModel->where('id_aluno' ,$id_aluno)->first();
	    $data = [
                'controller'    	=> 'aluno',
                'title'     		=> 'aluno',		
				'pageTitle'			=> 'Perfil do aluno',
				'n_aluno'			=> $result->n_aluno,
				'num_interno'		=> $result->num_interno,
				'nome_aluno'		=> $result->nome_aluno,
				'genero'			=> $result->genero,
				'telemovel'			=> $result->telemovel,
				'email_aluno'		=> $result->email,
				'foto_aluno'		=> $result->foto_aluno,
				'data_nasci'		=> $result->data_nasci,
				'NIF'				=> $result->NIF,
				'ee_id'				=> $result->ee_id,
				'NEE'				=> $result->NEE,
				'delegado'			=> $result->delegado,
				'status'			=> $result->status
			];
			//echo "<pre>"; print_r($data);
		return view('dashboard/profile_aluno', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->alunoModel->select()->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id_aluno .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<a type="button" class=" dropdown-item btn-info" href="aluno/profilealuno/'. $value->id_aluno  .'"><i class="fa-solid fa-eye"></i>' .  lang("App.detalhes")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id_aluno .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';



			$data['data'][$key] = array(
				$value->n_aluno,
				$value->num_interno,
				$value->nome_aluno,
				$value->genero,
				$value->telemovel,
				$value->email,
				$value->foto_aluno,
				$value->data_nasci,
				$value->NIF,
				$value->NEE,
				$value->delegado,

				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id_aluno');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->alunoModel->where('id_aluno' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id_aluno'] = $this->request->getPost('id_aluno');
		$fields['n_aluno'] = $this->request->getPost('n_aluno');
		$fields['num_interno'] = $this->request->getPost('num_interno');
		$fields['nome_aluno'] = $this->request->getPost('nome_aluno');
		$fields['genero'] = $this->request->getPost('genero');
		$fields['telemovel'] = $this->request->getPost('telemovel');
		$fields['email'] = $this->request->getPost('email');
		$fields['foto_aluno'] = $this->request->getPost('foto_aluno');
		$fields['data_nasci'] = $this->request->getPost('data_nasci');
		$fields['NIF'] = $this->request->getPost('NIF');
		$fields['ee_id'] = $this->request->getPost('ee_id');
		$fields['NEE'] = $this->request->getPost('NEE');
		$fields['delegado'] = $this->request->getPost('delegado');
		$fields['status'] = $this->request->getPost('status');


        $this->validation->setRules([
			            'n_aluno' => ['label' => 'N aluno', 'rules' => 'permit_empty|min_length[0]'],
            'num_interno' => ['label' => 'Num interno', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'nome_aluno' => ['label' => 'Nome aluno', 'rules' => 'permit_empty|min_length[0]'],
            'genero' => ['label' => 'Genero', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],
            'telemovel' => ['label' => 'Telemovel', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'email' => ['label' => 'Email', 'rules' => 'permit_empty|valid_email|min_length[0]'],
            'foto_aluno' => ['label' => 'Foto aluno', 'rules' => 'permit_empty|min_length[0]'],
            'data_nasci' => ['label' => 'Data nasci', 'rules' => 'permit_empty|valid_date|min_length[0]'],
            'NIF' => ['label' => 'NIF', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'ee_id' => ['label' => 'Ee id', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'NEE' => ['label' => 'NEE', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[1]'],
            'delegado' => ['label' => 'Delegado', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[1]'],
            'status' => ['label' => 'Status', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->alunoModel->insert($fields)) {
												
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
		
		$fields['id_aluno'] = $this->request->getPost('id_aluno');
		$fields['n_aluno'] = $this->request->getPost('n_aluno');
		$fields['num_interno'] = $this->request->getPost('num_interno');
		$fields['nome_aluno'] = $this->request->getPost('nome_aluno');
		$fields['genero'] = $this->request->getPost('genero');
		$fields['telemovel'] = $this->request->getPost('telemovel');
		$fields['email'] = $this->request->getPost('email');
		$fields['foto_aluno'] = $this->request->getPost('foto_aluno');
		$fields['data_nasci'] = $this->request->getPost('data_nasci');
		$fields['NIF'] = $this->request->getPost('NIF');
		$fields['ee_id'] = $this->request->getPost('ee_id');
		$fields['NEE'] = $this->request->getPost('NEE');
		$fields['delegado'] = $this->request->getPost('delegado');
		$fields['status'] = $this->request->getPost('status');


        $this->validation->setRules([
			            'n_aluno' => ['label' => 'N aluno', 'rules' => 'permit_empty|min_length[0]'],
            'num_interno' => ['label' => 'Num interno', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'nome_aluno' => ['label' => 'Nome aluno', 'rules' => 'permit_empty|min_length[0]'],
            'genero' => ['label' => 'Genero', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],
            'telemovel' => ['label' => 'Telemovel', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'email' => ['label' => 'Email', 'rules' => 'permit_empty|valid_email|min_length[0]'],
            'foto_aluno' => ['label' => 'Foto aluno', 'rules' => 'permit_empty|min_length[0]'],
            'data_nasci' => ['label' => 'Data nasci', 'rules' => 'permit_empty|valid_date|min_length[0]'],
            'NIF' => ['label' => 'NIF', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'ee_id' => ['label' => 'Ee id', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'NEE' => ['label' => 'NEE', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[1]'],
            'delegado' => ['label' => 'Delegado', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[1]'],
            'status' => ['label' => 'Status', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->alunoModel->update($fields['id_aluno'], $fields)) {
				
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
		
		$id = $this->request->getPost('id_aluno');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->alunoModel->where('id_aluno', $id)->delete()) {
								
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

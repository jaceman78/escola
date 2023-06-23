<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\TurmalunoModel;

class Turmaluno extends BaseController
{
	
    protected $turmalunoModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->turmalunoModel = new TurmalunoModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'turmaluno',
                'title'     		=> 'turmaluno'				
			];
		
		return view('turmaluno', $data);
			
	}



	public function getTurmaDetalhes($id_turma) //cards lista todos os os alunos da turma 
	{
	$data = $this->turmalunoModel->findAlunosTurma($id_turma);	//<-novo
	//echo "<pre>"; print_r($data);
	return $this->response->setJSON($data);
	// [id_turma] => 48
	// [ano] => 10 
	// [nome] => 10G
	// [dt_id] => 385
	// [anoletivo_id] => 1
	// [tipologia_id] => 1
	// [nome_tipologia] => Regular
	// [nomedt] => Maria de Fátima Bexinina Matado
	// [profile_img] => ../imagens/default.png
	// [email] => mariamatado@aejoaodebarros.pt
	// [num_disciplinas] => 7
	}






	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->turmalunoModel->select()->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id_turmaaluno .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id_turmaaluno .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
			$value->id_turmaaluno,
			$value->anoletivo_id,
			$value->turma_id,
			$value->num_interno,

				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id_turmaaluno');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->turmalunoModel->where('id_turmaaluno' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id_turmaaluno'] = $this->request->getPost('id_turmaaluno');
		$fields['anoletivo_id'] = $this->request->getPost('anoletivo_id');
		$fields['turma_id'] = $this->request->getPost('turma_id');
		$fields['num_interno'] = $this->request->getPost('num_interno');


        $this->validation->setRules([
			'anoletivo_id' => ['label' => 'Anoletivo id', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'turma_id' => ['label' => 'Turma id', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'num_interno' => ['label' => 'Num interno', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->turmalunoModel->insert($fields)) {
												
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
		
		$fields['id_turmaaluno'] = $this->request->getPost('id_turmaaluno');
		$fields['anoletivo_id'] = $this->request->getPost('anoletivo_id');
		$fields['turma_id'] = $this->request->getPost('turma_id');
		$fields['num_interno'] = $this->request->getPost('num_interno');


        $this->validation->setRules([
			            'anoletivo_id' => ['label' => 'Anoletivo id', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'turma_id' => ['label' => 'Turma id', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'num_interno' => ['label' => 'Num interno', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->turmalunoModel->update($fields['id_turmaaluno'], $fields)) {
				
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
		
		$id = $this->request->getPost('id_turmaaluno');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->turmalunoModel->where('id_turmaaluno', $id)->delete()) {
								
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

<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnoletivoModel; //20-02-2023
use App\Models\TurmasModel;
use App\Models\TurmalunoModel; //27/09/2023
use CodeIgniter\CLI\Console;
use Symfony\Component\Console\Output\ConsoleOutput;

$db = \Config\Database::connect();
class Turmas extends BaseController
{
	
    protected $turmasModel;
    protected $validation;
	
	public function __construct()
	{
		helper('session');
		if (!session()->get("LoggedUserData")) {
		 session()->setFlashData("Error", "Your session has expired. Please login again.");
		 return redirect()->to(base_url());
	 }
	    $this->turmasModel = new TurmasModel();
		$this->AnoletivoModel = new AnoletivoModel();
		$this->turmalunoModel = new TurmalunoModel(); //27/09/2023
       	$this->validation =  \Config\Services::validation();

		
	}
	
	public function index()
	{
		$result= $this->AnoletivoModel->getAllAL; //<-novo

	    $data = [
                'controller'    	=> 'turmas',
                'title'     		=> 'Turmas'	,	
				'pageTitle'			=> 'Turmas'	

			];		
		return view('dashboard/turmas', $data);			
	}


//eu
	
	public function indexregular()
	{
		
		if (!session()->get("LoggedUserData")) {
			session()->setFlashData("Error", "Your session has expired. Please login again.");
			return redirect()->to(base_url());
		}

	    $data = [
                 'controller'    	=> 'turmas',
                 'title'     		=> 'Turmas Regular',
				 'pageTitle'		=> 'Turmas dos Cursos Regulares ',	
				 'tipologia'		=> '1'					
			];

		return view('dashboard/turmas_regular', $data);			
	}

	public function indexprofissional()
	{
	    $data = [
                 'controller'    	=> 'turmas',
                 'title'     		=> 'Turmas Profissional',
				 'pageTitle'		=> 'Turmas dos Cursos Profissionais',
				 'tipologia'		=> '2'			
				];
		
		return view('dashboard/turmas_profissional', $data);			
	}



	public function getAll()
	{
 		$response = $data['data'] = array();				
		//$result = $this->turmasModel->select()->findAll();

		$result= $this->turmasModel->getTurmasComAnosLetivos(); //<-novo
		foreach ($result as $key => $value) {					
					
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id_turma .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a type="button" class=" dropdown-item btn-info" href="turmadisciplina/turmadetalhes/'. $value->id_turma  .'"><i class="fa-solid fa-eye"></i>' .  lang("App.detalhes")  . '</a>';
			$ops .= '<a type="button" class=" dropdown-item btn-info" href="turmadisciplina/indexporturma/'. $value->id_turma  .'"><i class="fa-solid fa-square-plus"></i>' .  lang("App.adddisciplina")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id_turma .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
			$value->id_turma,
			$value->ano,
			$value->nome,
			$value->anoletivo,
			$value->nome_tipologia,
			//$value->anoletivo_id,
			//$value->tipologia_id,
			$ops				
			);
		} 		
		return $this->response->setJSON($data);		
	}

	public function getAllregular()	{
		
		$response = $data['data'] = array();	

	   //$result = $this->turmasModel->select()->findAll();
	   $result= $this->turmasModel->getTurmasregular(); //<-novo
	   foreach ($result as $key => $value) {					
					
		$ops = '<div class="btn-group">';
		$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
		$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
		$ops .= '<div class="dropdown-menu">';
		$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id_turma .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
		$ops .= '<a type="button" class=" dropdown-item btn-info" href="turmadisciplina/turmadetalhes/'. $value->id_turma  .'"><i class="fa-solid fa-eye"></i>' .  lang("App.detalhes")  . '</a>';
		$ops .= '<a type="button" class=" dropdown-item btn-info" href="turmadisciplina/indexporturma/'. $value->id_turma  .'"><i class="fa-solid fa-square-plus"></i>' .  lang("App.adddisciplina")  . '</a>';
		$ops .= '<div class="dropdown-divider"></div>';
		$ops .= '<a class="dropdown-item text-success" onClick="exportar('. $value->id_turma .')"><i class="fa-solid fa-cogs"></i>   ' .  "Exportar"  . '</a>';
		$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id_turma .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
		$ops .= '</div></div>';

		$data['data'][$key] = array(
		$value->id_turma,
		$value->ano,
		$value->nome,
		$value->anoletivo,
		$value->nome_tipologia,
		//$value->anoletivo_id,
		//$value->tipologia_id,
		$ops				
		);
	} 		
	return $this->response->setJSON($data);		
   }


   public function getAllprofissional()
   {	   
		$response = $data['data'] = array();	
	   //$result = $this->disciplinasModel->select()->findAll();
	   $result= $this->turmasModel->getTurmasprofissional(); //<-novo
	   foreach ($result as $key => $value) {					
					
		$ops = '<div class="btn-group">';
		$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
		$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
		$ops .= '<div class="dropdown-menu">';
		$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id_turma .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
		$ops .= '<a type="button" class=" dropdown-item btn-info" href="turmadisciplina/turmadetalhes/'. $value->id_turma  .'"><i class="fa-solid fa-eye"></i>' .  lang("App.detalhes")  . '</a>';
		$ops .= '<a type="button" class=" dropdown-item btn-info" href="turmadisciplina/indexporturma/'. $value->id_turma  .'"><i class="fa-solid fa-square-plus"></i>' .  lang("App.adddisciplina")  . '</a>';
		$ops .= '<div class="dropdown-divider"></div>';
		$ops .= '<a class="dropdown-item text-success" onClick="exportar('. $value->id_turma .')"><i class="fa-solid fa-cogs"></i>   ' .  "Exportar"  . '</a>';
		$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id_turma .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
		$ops .= '</div></div>';

		$data['data'][$key] = array(
		$value->id_turma,
		$value->ano,
		$value->nome,
		$value->anoletivo,
		$value->nome_tipologia,
		//$value->anoletivo_id,
		//$value->tipologia_id,
		$ops				
		);
	} 		
	return $this->response->setJSON($data);		
   }


	public function getAllporAnoletivo($id_anoletivo,$tipo)
	{
 		$response = $data['data'] = array();				
		//$result = $this->turmasModel->select()->findAll();

		$result= $this->turmasModel->getTurmasporAnoletivo($id_anoletivo,$tipo); //<-novo
		foreach ($result as $key => $value) {
					
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id_turma .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a type="button" class=" dropdown-item btn-info" href="turmadisciplina/turmadetalhes/'. $value->id_turma  .'"><i class="fa-solid fa-eye"></i>' .  lang("App.detalhes")  . '</a>';
			$ops .= '<a type="button" class=" dropdown-item btn-info" href="turmadisciplina/indexporturma/'. $value->id_turma  .'"><i class="fa-solid fa-square-plus"></i>' .  lang("App.adddisciplina")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id_turma .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '<a class="dropdown-item text-success" onClick="exportar('. $value->id_turma .')"><i class="fa-solid fa-cogs"></i>   ' .  "Exportar"  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
			$value->id_turma,
			$value->ano,
			$value->nome,
			$value->anoletivo,
			$value->nome_tipologia,
			//$value->anoletivo_id,
			//$value->tipologia_id,
			$ops				
			);
		} 
		//var_dump($data);
		return $this->response->setJSON($data);		
	}




	public function getTurmaDetalhes($id_turma) //cards lista todos os detalhes da turma/disciplina
	{
	$data = $this->turmasModel->findDetalhesTurma($id_turma);	//<-novo
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





	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id_turma');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->turmasModel->where('id_turma' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();
		
		$fields['id_turma'] = $this->request->getPost('id_turma');
		$fields['ano'] = $this->request->getPost('ano');
		$fields['nome'] = $this->request->getPost('nome');
		$fields['anoletivo_id'] = $this->request->getPost('anoletivo_id');
		$fields['tipologia_id'] = $this->request->getPost('tipologia_id');


        $this->validation->setRules([
			'ano' => ['label' => 'Ano Escolar', 'rules' => 'required|numeric|min_length[0]|max_length[11]',
			'errors' => ['required' => 'Deve escolher um ano letivo.']],
            
			'nome' => ['label' => 'Nome', 'rules' => 'required|min_length[0]|max_length[63]'],
            'anoletivo_id' => ['label' => 'Ano Letivo', 'rules' => 'required|min_length[0]|max_length[11]'],
            'tipologia_id' => ['label' => 'Tipologia', 'rules' => 'required|min_length[0]|max_length[11]'],

        ]);
		$existing_turma = $this->turmasModel
		->where('ano', $fields['ano'])
		->where('nome', $fields['nome'])
		->where('anoletivo_id', $fields['anoletivo_id'])
		->where('tipologia_id', $fields['tipologia_id'])->first();

        if ($this->validation->run($fields) == FALSE || !empty($existing_turma)) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form&& 
			 if (!empty($existing_turma)){
				
				$response['success'] = false;
				$response['messages'] = lang("App.insert-error-existe") ;
				
			}
			
        }
		
		 else {

            if ($this->turmasModel->insert($fields) && empty($existing_turma)) {
												
                $response['success'] = true;
                $response['messages'] = lang("App.insert-success") ;	
				
            }  
			else {
				
                $response['success'] = false;
                $response['messages'] = lang("App.insert-error") ;
				
            }
        }
		
        return $this->response->setJSON($response);
	}


	public function edit()
	{
        $response = array();
		
		$fields['id_turma'] = $this->request->getPost('id_turma');
		$fields['ano'] = $this->request->getPost('ano');
		$fields['nome'] = $this->request->getPost('nome');
		$fields['anoletivo_id'] = $this->request->getPost('anoletivo_id');
		$fields['tipologia_id'] = $this->request->getPost('tipologia_id');


        $this->validation->setRules([
			'ano' => ['label' => 'Ano Escolar', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'nome' => ['label' => 'Nome', 'rules' => 'permit_empty|min_length[0]|max_length[63]'],
            'anoletivo_id' => ['label' => 'Ano Letivo', 'rules' => 'required|min_length[0]|max_length[11]'],
            'tipologia_id' => ['label' => 'Tipologia', 'rules' => 'required|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {
            if ($this->turmasModel->update($fields['id_turma'], $fields)) {				
                $response['success'] = true;
                $response['messages'] = lang("App.update-success");					
            } else {				
                $response['success'] = false;
                $response['messages'] = lang("App.update-error");				
            }
        }
		
        return $this->response->setJSON($response);	
	}
	
	public function exportar()
	{
		$response = array();
		echo '<pre>';
		
		$id = $this->request->getPost('id_turma');
		$data = $this->turmasModel->where('id_turma' ,$id)->first();
		$data->anoletivo_id=$data->anoletivo_id+1;
		$data->ano=$data->ano+1;
	

			//echo json_encode($data);
			var_dump($data);
			echo '</pre>'; 
		
	


		$existing_turma = $this->turmasModel
		->where('ano', $data->ano)
		->where('nome', $data->nome)
		->where('anoletivo_id', $data->anoletivo_id)->first();

		var_dump($existing_turma);

		if (empty($existing_turma)) {
			$this->turmasModel->insert($data); 
			$id_turma_inserida = $this->turmasModel->insertID(); //devolve o ID da turma  inserida
			$result = $this->turmalunoModel->findAlunosTurma($id);	

			 foreach ($result as $key => $value) {	
				
			 	$dados['anoletivo_id'] = $data->anoletivo_id;
			 	$dados['turma_id'] = $id_turma_inserida;
				$dados['num_interno'] = $value->num_interno;
			 	$this->turmalunoModel->insert($dados);

			 }
		 	$response['success'] = true;
			$response['messages'] = "Dados exportados com sucesso, turma " . ($data->ano)-1 . " " . $data->nome . " para o ano letivo seguinte ";	
				
		 } else if(!empty($existing_turma)) {
			$response['success'] = false;		 	
			 $response['messages'] = "Turma já exportada";
		}
		else{
			$response['success'] = false;
			$response['messages'] = "Erro ao exportar turma";
		}
		return $this->response->setJSON($response);	
	}


	public function remove()
	{
		$response = array();
		
		$id = $this->request->getPost('id_turma');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->turmasModel->where('id_turma', $id)->delete()) {
								
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

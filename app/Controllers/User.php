<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;

class User extends BaseController
{
	
    protected $userModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->userModel = new UserModel();
       	$this->validation =  \Config\Services::validation();
		
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'user',
                'title'     		=> 'Professores'				
			];
		
		return view('dashboard/user', $data);
			
	}
	public function getAllArrayNomes(){
		$response = $data['data'] = array();	

		$data = $this->userModel->select()->getAllNome();
		return $this->response->setJSON($data);	

	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->userModel->select()->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';
			$profile_img ="<img src='";
			$profile_img.= $value->profile_img;
			$profile_img.="'class='user-image  img-circle elevation-2' style='width: 45px; height: 45px;' alt='User Image'>";

			$data['data'][$key] = array(
				$value->oauth_id,
				$value->name,
				$value->email,
				$value->grupo_id,
				$value->level,
				$profile_img,

				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->userModel->where('id' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['oauth_id'] = $this->request->getPost('oauth_id');
		$fields['name'] = $this->request->getPost('name');
		$fields['email'] = $this->request->getPost('email');
		$fields['profile_img'] = $this->request->getPost('profile_img');
		$fields['level'] = $this->request->getPost('level');
		$fields['status'] = $this->request->getPost('status');
		$fields['created_at'] = $this->request->getPost('created_at');
		$fields['updated_at'] = $this->request->getPost('updated_at');


        $this->validation->setRules([
			            'oauth_id' => ['label' => 'Oauth id', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],
            'name' => ['label' => 'Nome', 'rules' => 'permit_empty|min_length[0]|max_length[100]'],
            'email' => ['label' => 'Email', 'rules' => 'permit_empty|valid_email|min_length[0]|max_length[100]'],
            'profile_img' => ['label' => 'Profile img', 'rules' => 'permit_empty|min_length[0]|max_length[500]'],
            'level' => ['label' => 'Level', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'status' => ['label' => 'Status', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'created_at' => ['label' => 'Created at', 'rules' => 'permit_empty|valid_date|min_length[0]|max_length[50]'],
            'updated_at' => ['label' => 'Updated at', 'rules' => 'permit_empty|valid_date|min_length[0]|max_length[50]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->userModel->insert($fields)) {
												
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
		
		$fields['id'] = $this->request->getPost('id');
		$fields['oauth_id'] = $this->request->getPost('oauth_id');
		$fields['name'] = $this->request->getPost('name');
		$fields['email'] = $this->request->getPost('email');
		$fields['profile_img'] = $this->request->getPost('profile_img');
		$fields['level'] = $this->request->getPost('level');
		$fields['status'] = $this->request->getPost('status');
		$fields['created_at'] = $this->request->getPost('created_at');
		$fields['updated_at'] = $this->request->getPost('updated_at');


        $this->validation->setRules([
			            'oauth_id' => ['label' => 'Oauth id', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],
            'name' => ['label' => 'Nome', 'rules' => 'permit_empty|min_length[0]|max_length[100]'],
            'email' => ['label' => 'Email', 'rules' => 'permit_empty|valid_email|min_length[0]|max_length[100]'],
            'profile_img' => ['label' => 'Profile img', 'rules' => 'permit_empty|min_length[0]|max_length[500]'],
            'level' => ['label' => 'Level', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'status' => ['label' => 'Status', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'created_at' => ['label' => 'Created at', 'rules' => 'permit_empty|valid_date|min_length[0]|max_length[50]'],
            'updated_at' => ['label' => 'Updated at', 'rules' => 'permit_empty|valid_date|min_length[0]|max_length[50]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->userModel->update($fields['id'], $fields)) {
				
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
		
		$id = $this->request->getPost('id');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->userModel->where('id', $id)->delete()) {
								
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

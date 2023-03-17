<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class LoginController extends BaseController
{
	private $userModel=NULL;
	private $googleClient=NULL;
	function __construct(){
		require_once APPPATH. "libraries/vendor/autoload.php";
		$this->userModel = new UserModel();
		$this->googleClient = new \Google_Client();
		$this->googleClient->setClientId("633805044650-h6b92rq9i119gajei6fq1ot3bkn1j357.apps.googleusercontent.com");
		$this->googleClient->setClientSecret("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");
		$this->googleClient->setRedirectUri("http://localhost:8080/login/loginWithGoogle");
		$this->googleClient->addScope("email");
		$this->googleClient->addScope("profile");

	}

	public function index()
	{
		if(session()->get("LoggedUserData")){
			session()->setFlashData("Error", "You have Already Logged In");
			return redirect()->to(base_url()."/user/profile");
		}
		$data['googleButton'] = '<a href="'.$this->googleClient->createAuthUrl().'" > 
		<div id="g_id_onload" data-ux_mode="redirect"></div>	 	
		<div class="g_id_signin"
			data-ux_mode="redirect"
			data-callback ="true"
			data-type="standard"
			data-size="large"
			data-theme="outline"
			data-text="sign_in_with"
			data-shape="rectangular"
			data-logo_alignment="left">
	 	</div></a>';
		return view('LTE_login', $data);
	}

		public function profile()
	{
		if(!session()->get("LoggedUserData"))
		{
			session()->setFlashData("Error", "You have Logged Out, Please Login Again.");
			return redirect()->to(base_url());
		}
		return view('user/profile');
	}

	public function loginWithGoogle()
	{
		$token = $this->googleClient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
		if(!isset($token['error'])){
			$this->googleClient->setAccessToken($token['access_token']);
			session()->set("AccessToken", $token['access_token']);

			$googleService = new \Google_Service_Oauth2($this->googleClient);
			$data = $googleService->userinfo->get();
			$currentDateTime = date("Y-m-d H:i:s");

			// Check if email domain is allowed
			$email = $data->getEmail();			
			$allowedDomains = array('@aejoaodebarros.pt');
			$domain = substr(strrchr($email, "@"), 1);
			if (!in_array('@' . $domain, $allowedDomains)) {
				session()->setFlashData("Error", "Conta de email não autorizada!");
				return redirect()->to(base_url());
			}else{


			//echo "<pre>"; print_r($data);die;
			$userdata=array();
			if($this->userModel->isAlreadyRegister($data['id'])){			
				$result = $this->userModel->where('oauth_id' ,$data['id'])->first();
									
				//User Already Login and want to Login Again
				$userdata = [
					'name'=>$data['givenName']. " ".$data, 
					'email'=>$data['email'] , 
					'profile_img'=>$data['picture'], 
					'updated_at'=>$currentDateTime,
					'level'=>$result->level,
					'status'=>$data['status'] 
				];
				$this->userModel->updateUserData($userdata, $data['id']);
			}else if($this->userModel->isAlreadyRegisteremail($data['email']))
			{			
				$result = $this->userModel->where('email' ,$data['email'])->first();
									
				//User ALready email introduced
				$userdata = [
					'oauth_id'=>$data['id'], //no googlee api p oauth_id é id
					'name'=>$data['givenName']. " ".$data['familyName'], 
					'email'=>$data['email'] , 
					'profile_img'=>$data['picture'], 
					'updated_at'=>$currentDateTime,
					'level'=>$result->level,
					'status'=>$data['status'] 
				];
				// echo "<pre>"; print_r($result->id);
				// echo "<pre>"; print_r($userdata);die;
			

				$this->userModel->updateUserDataEmail($userdata, $result->id);

			}
			else{
				//new User want to Login				
				$userdata = [
					'oauth_id'=>$data['id'],
					'name'=>$data['givenName']. " ".$data['familyName'], 
					'email'=>$data['email'] , 
					'profile_img'=>$data['picture'], 
					'created_at'=>$currentDateTime,
					'level'=>0,
					'status'=>1
				];
				$this->userModel->insertUserData($userdata);
			}
			
			session()->set("LoggedUserData", $userdata);
		}

		}else{
			session()->setFlashData("Error", "Something went Wrong");
			return redirect()->to(base_url());
		}
		//Successfull Login
		return redirect()->to(base_url()."/user/profile");
	}

	function logout(){
		session()->remove('LoggedUserData');
		session()->remove('AccessToken');
		if(!(session()->get('LoggedUserData') && session()->get('AccessToken') )){
			session()->setFlashData("Success", "Logout Successful");
			return redirect()->to(base_url());
		}else{
			session()->setFlashData("Error", "Failed to Logout, Please Try Again");
			return redirect()->to(base_url()."/user/profile");
		}
	}
} 
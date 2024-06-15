<?php
namespace App\Controller;
use Src\Controller\Base_Controller;

class Login_Controller extends Base_Controller
{
	public function agent_login()
	{
		// Model was created and stored at: /app/models/LoginModel.php
		// View was created and stored at: /app/template/views/login/index.html.twig
		$this->template->render( "login/agents.html.twig" );
	}

	public function index()
	{
		// Model was created and stored at: /app/models/LoginModel.php
		// View was created and stored at: /app/template/views/login/index.html.twig
		$sid   = md5( time() );
		$token = md5( time() . mt_rand( 1, 9999 ) );
		$this->template->render( "login/index.html.twig", [
			'sid'           => $sid,
			'creation_time' => time(),
			'token'         => $token,
		] );
	}

	public function logout()
	{
		$session = $this->load->middleware( 'Session' );
		$session->flush();
		$this->redirect( 'home' );
		exit;
	}

	public function verify_agent_login()
	{
		$check = $this->model( "Login" );
		if ( $check->verifyAgentLogin( $_POST['email'], $_POST['password'] ) != false )
		{
			$session = $this->load->middleware( 'Session' );
			$session->set( 'agent_id', $check->agent_id );
			$session->set( 'agent_first_name', $check->agent_first_name );
			$session->set( 'agent_last_name', $check->agent_last_name );
			$session->set( 'agent_email', $check->agent_email );
			$session->set( 'agent_access_level', $check->agent_access_level );
			$session->set( 'agent_role', $check->agent_role );
			$session->set( 'agent_avatar', $check->agent_avatar );
			$this->redirect( 'home' );
			exit;
		}
		else
		{
			echo "0";
		}
	}

	/**
	 * @return mixed
	 */
	public function verify_login()
	{
		$check = $this->model( "Login" );
		if ( $check->verifyLogin( $_POST['email'], $_POST['password'] ) != false )
		{
			$session = $this->load->middleware( 'Session' );
			$session->set( 'client_id', $check->client_id );
			$session->set( 'client_first_name', $check->client_first_name );
			$session->set( 'client_last_name', $check->client_last_name );
			$session->set( 'client_email', $check->client_email );
			$session->set( 'client_company', $check->client_company );
			$session->set( 'client_access_level', $check->client_access_level );
			$session->set( 'client_role', $check->client_role );
			if ( !empty( $check->client_avatar ) && !is_null( $check->client_avatar ) && $check->client_avatar != '' )
			{
				$session->set( 'client_avatar', $check->client_avatar );
			}
			else
			{
				$session->set( 'client_avatar', '' );
			}
			$this->redirect( 'home' );
			exit;
		}
		else
		{
			echo "0";
		}
	}
}
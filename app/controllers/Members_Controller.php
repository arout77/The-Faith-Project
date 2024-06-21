<?php
namespace App\Controller;

class Members_Controller extends Init_Controller
{
	public function index()
	{
		// Model was created and stored at: /app/models/MembersModel.php
		// View was created and stored at: /app/template/views/members/index.html.twig
		$this->template->render( "members\index.html.twig" );
	}
}
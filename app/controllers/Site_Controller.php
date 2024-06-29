<?php
namespace App\Controller;

class Site_Controller extends Init_Controller
{
	public function index()
	{
		// Model was created and stored at: /app/models/siteModel.php
		// View was created and stored at: /app/template/views/site/index.html.twig
		$this->template->render( "site\index.html.twig" );
	}

	public function subscribe()
	{
		if ( !empty( $_POST ) )
		{
			$email = $_POST['email'];

			if ( filter_var( $email, FILTER_VALIDATE_EMAIL ) != true )
			{
				echo json_encode( 'Please enter a valid email address' );
				exit;
			}

			$model           = $this->model( "Site" );
			$addSubscription = $model->addSubscription( $email );
			if ( $addSubscription == 'Already subscribed' )
			{
				echo json_encode( "exists" );
				exit;
			}
			elseif ( $addSubscription == 'error' )
			{
				echo json_encode( "We encountered an error processing your requesting. If the issue continues, please contact support using the 'Contact Us' link." );
				exit;
			}
			else
			{
				echo json_encode( "success" );
				exit;
			}

		}
	}
}
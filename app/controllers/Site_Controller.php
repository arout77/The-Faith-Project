<?php
namespace App\Controller;

class Site_Controller extends Init_Controller
{
	public function contact()
	{
		$this->template->render( "site\contact.html.twig" );
	}

	public function index()
	{
		// Model was created and stored at: /app/models/siteModel.php
		// View was created and stored at: /app/template/views/site/index.html.twig
		$intromodel = $this->model( 'Bible' );
		$bookMap    = $intromodel->getChapterCountMap();
		$map        = [];

		foreach ( $bookMap as $k => $v )
		{
			for ( $i = 1; $i <= $v; $i++ )
			{
				$map[$k][] = $i;
			}
		}
		$this->template->render( "site\index.html.twig", [
			'map' => $map,
		] );
	}

	public function privacy()
	{
		$this->template->render( "site\privacy.html.twig" );
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

	public function terms()
	{
		$this->template->render( "site\terms.html.twig" );
	}
}
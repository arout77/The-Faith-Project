<?php

namespace App\Controller;

use RedBeanPHP\R as R;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;
use \Src\Controller\Base_Controller;
use \Src\Middleware\EmailMiddleware;

class Home_Controller extends Base_Controller
{
	/**
	 * @param $name
	 * @return mixed
	 */
	public function data( $name = '' )
	{
		return $name;
	}

	public function index()
	{
		$videomodel = $this->model( 'Videos' );
		$mostpop    = $videomodel->getMostPopular( 8 );
		$intros     = $videomodel->getVideosByCat( 'Intro to The Bible' );
		$this->template->render( 'home/index.html.twig', [
			'popular' => $mostpop,
			'intros'  => $intros,
		] );
	}

	public function test()
	{
		// The $sql array to pass to pagination->config() method
		$sql['table']      = 'documentation';
		$dbQuery           = "SELECT * FROM documentation WHERE category = 'Getting Started'";
		$sql['parameters'] = 'Getting Started';
		// How many results per page to display
		$per_page = 20;
		// The url containing data to be paginated. Leave blank or omit if home page
		// otherwise just pass the controller name (and method if applicable)
		$url = '';

		$paginate = $this->middleware->get( "pagination" );
		$paginate->config( $sql, $per_page, $url );
		$results         = $paginate->runQuery();
		$paginate        = $this->middleware->get( "pagination" );
		$totalRecords    = $paginate->countResults( $dbQuery );
		$paginate->total = $totalRecords;

		$results = $paginate->runQuery( $dbQuery );
		$paginate->paginate();

		$this->template->render(
			'home/test.html.twig',
			[
				'message'    => 'Page Not Found',
				'site_name'  => self::data( 'Rhapsody' ),
				'results'    => $results,
				'pagLinks'   => $paginate->pageNumbers(),
				'pagPerPage' => $paginate->itemsPerPage(),
			]
		);
	}
}
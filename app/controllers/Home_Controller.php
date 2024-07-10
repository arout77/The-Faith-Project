<?php

namespace App\Controller;

class Home_Controller extends Init_Controller
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
}
<?php
namespace App\Controller;

class Bible_Controller extends Init_Controller
{
	public function addHighlight()
	{
		if ( !is_null( $this->username ) )
		{
			$model = $this->model( 'Bible' );
			$model->addHighlight( $this->username, $_POST['book'], $_POST['chapter'], $_POST['verse'], $_POST['txt'], $_POST['version'] );
		}
	}

	public function asv()
	{
		$model                  = $this->model( 'Bible' );
		$dataset                = $model->getASV( $this->book, $this->chapter );
		$numchapters            = $model->getChapterCount( $this->book );
		$get_highlighted_verses = null;

		if ( !is_null( $this->username ) )
		{
			$get_highlighted_verses = $model->getHighlightedVerses( $this->username, $this->book, $this->chapter );
		}

		$this->template->render( "bible\kjv.html.twig", [
			'translation' => 'American Standard Version',
			'results'     => $dataset,
			'numchapters' => $numchapters['total'], // Number of chapters for this book
			'chapter_count' => $this->num_chapters, // Array containing each book and its chapter count
			'highlighted_verses' => $get_highlighted_verses,
		] );
	}

	/**
	 * @return mixed
	 */
	public function checkIfVersesHighlighted()
	{
		$model = $this->model( 'Bible' );

		if ( !is_null( $this->username ) )
		{
			$get_highlighted_verses = $model->getHighlightedVerses( $this->username, $_POST['book'] );

			if ( is_null( $get_highlighted_verses ) )
			{
				echo '0';
				exit;
			}

			echo json_encode( $get_highlighted_verses );
		}

		echo '0';
		exit;
	}

	/**
	 * @param $book
	 * @return mixed
	 */
	public function get_chapter_count()
	{
		// Get the number of chapters for this book
		$book  = strip_tags( $_POST['book'] );
		$model = $this->model( 'Bible' );
		$count = $model->getChapterCount( $book );
		echo $count['total'];
	}

	public function index()
	{
		// Model was created and stored at: /app/models/BibleModel.php
		// View was created and stored at: /app/template/views/bible/inde.html.twig
		return self::intro();
	}

	public function intro()
	{
		if ( !empty( $this->route->parameter[1] ) )
		{
			$cat = urldecode( $this->route->parameter[1] );
			$cat = str_replace( "-", " ", $cat );
			$cat = strtoupper( $cat );
			if ( $cat == 'THE PENTATEUCH' )
			{
				$cat = "THE PENTATEUCH (Torah)";
			}
		}
		else
		{
			$cat = 'all';
		}

		$model   = $this->model( 'Bible' );
		$dataset = $model->getIntro( $cat );

		$this->template->render( "bible\intro.html.twig", [
			'results'  => $dataset,
			'category' => ucwords( strtolower( $cat ) ),
		] );
	}

	public function kjv()
	{
		$model                  = $this->model( 'Bible' );
		$dataset                = $model->getKJV( $this->book, $this->chapter );
		$numchapters            = $model->getChapterCount( $this->book );
		$get_highlighted_verses = null;

		if ( !is_null( $this->username ) )
		{
			$get_highlighted_verses = $model->getHighlightedVerses( $this->username, $this->book, $this->chapter );
		}

		$this->template->render( "bible\kjv.html.twig", [
			'translation' => 'King James Version',
			'results'     => $dataset,
			'numchapters' => $numchapters['total'], // Number of chapters for this book
			'chapter_count' => $this->num_chapters, // Array containing each book and its chapter count
			'highlighted_verses' => $get_highlighted_verses,
			'intro'       => $this->intro,
		] );
	}

	public function reina()
	{
		$model                  = $this->model( 'Bible' );
		$dataset                = $model->getReina( $this->book, $this->chapter );
		$numchapters            = $model->getChapterCount( $this->book );
		$get_highlighted_verses = null;

		if ( !is_null( $this->username ) )
		{
			$get_highlighted_verses = $model->getHighlightedVerses( $this->username, $this->book, $this->chapter );
		}

		$this->template->render( "bible\kjv.html.twig", [
			'results'     => $dataset,
			'numchapters' => $numchapters['total'], // Number of chapters for this book
			'chapter_count' => $this->num_chapters, // Array containing each book and its chapter count
			'highlighted_verses' => $get_highlighted_verses,
		] );
	}

	public function removeHighlight()
	{
		if ( !is_null( $this->username ) )
		{
			$model = $this->model( 'Bible' );
			$model->removeHighlight( $this->username, $_POST['book'], $_POST['chapter'], $_POST['verse'] );
		}
	}

	public function saved_verses()
	{
		if ( !is_null( $this->username ) )
		{
			$model   = $this->model( 'Bible' );
			$results = $model->getSavedVerses( $this->username );

			// $url      = 'bible/saved_verses/';
			// $per_page = 20;
			// $pag      = $this->load->middleware( 'pagination' );
			// $pag->config( $results, $url, $per_page );
			// $results = $pag->runQuery();
			// $links   = $pag->links();
		}

		$this->template->render( "bible\saved.html.twig", [
			'results' => $results,
			// 'links'         => $links,
			// 'total_records' => $pag->num_records,
		] );
	}

	public function summary()
	{
		$book        = $this->route->parameter[1] ?? "Genesis";
		$book        = urldecode( ucwords( $book ) );
		$book        = str_replace( "-", " ", $book );
		$model       = $this->model( 'Bible' );
		$dataset     = $model->getSummary( $book );
		$numchapters = $model->getChapterCount( $book );

		$this->template->render( "bible\summary.html.twig", [
			'results'     => $dataset,
			'book'        => $book,
			'numchapters' => $numchapters['total'],
		] );
	}

	public function web()
	{
		$model                  = $this->model( 'Bible' );
		$dataset                = $model->getWEB( $this->book, $this->chapter );
		$numchapters            = $model->getChapterCount( $this->book );
		$get_highlighted_verses = null;

		if ( !is_null( $this->username ) )
		{
			$get_highlighted_verses = $model->getHighlightedVerses( $this->username, $this->book, $this->chapter );
		}

		$this->template->render( "bible\kjv.html.twig", [
			'translation' => 'World English Bible',
			'results'     => $dataset,
			'numchapters' => $numchapters['total'], // Number of chapters for this book
			'chapter_count' => $this->num_chapters, // Array containing each book and its chapter count
			'highlighted_verses' => $get_highlighted_verses,
			'intro'       => $this->intro,
		] );
	}
}
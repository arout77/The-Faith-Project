<?php
namespace App\Controller;

class Bible_Controller extends Init_Controller
{
	public function addHighlight()
	{
		if ( !is_null( $this->username ) )
		{
			$model = $this->model( 'Bible' );
			$model->addHighlight( $this->username, $_POST['book'], $_POST['chapter'], $_POST['verse'] );
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
		$model       = $this->model( 'Bible' );
		$dataset     = $model->getIntro( $this->book );
		$numchapters = $model->getChapterCount( $this->book );

		$this->template->render( "bible\intro.html.twig", [
			'results'     => $dataset,
			'numchapters' => $numchapters['total'],
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
			'results'     => $dataset,
			'numchapters' => $numchapters['total'], // Number of chapters for this book
			'chapter_count' => $this->num_chapters, // Array containing each book and its chapter count
			'highlighted_verses' => $get_highlighted_verses,
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
}
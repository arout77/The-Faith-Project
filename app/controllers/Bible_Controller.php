<?php
namespace App\Controller;
use Src\Controller\Base_Controller;

class Bible_Controller extends Base_Controller
{
	/**
	 * @var mixed
	 */
	public $book;

	/**
	 * @var mixed
	 */
	public $bookSelectionMap;

	/**
	 * @var mixed
	 */
	public $books_of_bible;

	/**
	 * @var mixed
	 */
	public $chapter;

	/**
	 * @var mixed
	 */
	public $intro;

	/**
	 * @var mixed
	 */
	public $lang;

	/**
	 * @var mixed
	 */
	public $num_chapters;

	/**
	 * @var mixed
	 */
	public $version;

	/**
	 * @var mixed
	 */
	protected $username = null;

	/**
	 * @param $app
	 */
	public function __construct( $app )
	{
		parent::__construct( $app );

		$this->books_of_bible = [
			'Genesis', 'Exodus', 'Leviticus', 'Numbers', 'Deuteronomy', 'Joshua', 'Judges', 'Ruth', '1 Samuel', '2 Samuel',
			'1 Kings', '2 Kings', '1 Chronicles', '2 Chronicles', 'Ezra', 'Nehemiah', 'Esther', 'Job', 'Psalms', 'Proverbs',
			'Ecclesiastes', 'Song of Solomon', 'Isaiah', 'Jeremiah', 'Lamentations', 'Ezekiel', 'Daniel', 'Hosea', 'Joel',
			'Amos', 'Obadiah', 'Jonah', 'Micah', 'Nahum', 'Habakkuk', 'Zephaniah', 'Haggai', 'Zechariah', 'Malachi', 'Matthew',
			'Mark', 'Luke', 'John', 'Acts', 'Romans', '1 Corinthians', '2 Corinthians', 'Galatians', 'Ephesians', 'Philippians',
			'Colossians', '1 Thessalonians', '2 Thessalonians', '1 Timothy', '2 Timothy', 'Titus', 'Philemon', 'Hebrews',
			'James', '1 Peter', '2 Peter', '1 John', '2 John', '3 John', 'Jude', 'Revelation',
		];

		if ( isset( $_SESSION['wog-username'] ) )
		{
			$this->username = $_SESSION['wog-username'];
		}

		$this->version = $_COOKIE['bibleVersion'] ?? 'kjv';

		$book       = $this->route->parameter[1] ?? "Genesis";
		$book       = urldecode( ucwords( $book ) );
		$book       = str_replace( "-", " ", $book );
		$this->book = $book;

		$chapter       = $this->route->parameter[2] ?? 1;
		$this->chapter = $chapter;

		$intromodel  = $this->model( 'Bible' );
		$this->intro = $intromodel->getIntro( $this->book );

		$this->num_chapters = $intromodel->getChapterCountMap();

		$bookMap = $intromodel->getChapterCountMap();
		$map     = [];

		foreach ( $bookMap as $k => $v )
		{
			for ( $i = 1; $i <= $v; $i++ )
			{
				if ( $i === 1 )
				{
					$map[$k][] = "<option value='$i' selected>$i</option>";
				}
				else
				{
					$map[$k][] = "<option value='$i'>$i</option>";
				}
			}
		}

		$this->bookSelectionMap = $map;
		//var_dump( $this->bookSelectionMap );exit;

		// Add global var for all template files
		$this->template->twigEnv->addGlobal( 'book', $this->book );
		$this->template->twigEnv->addGlobal( 'bookMap', $this->bookSelectionMap );
		$this->template->twigEnv->addGlobal( 'intro', $this->intro );
		$this->template->twigEnv->addGlobal( 'chapter', $this->chapter );
		$this->template->twigEnv->addGlobal( 'version', $this->version );
		$this->template->twigEnv->addGlobal( 'books_of_bible', $this->books_of_bible );
	}

	public function addHighlight()
	{
		$model = $this->model( 'Bible' );
		$model->addHighlight( $this->username, $_POST['book'], $_POST['chapter'], $_POST['verse'] );
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
		$model = $this->model( 'Bible' );
		$model->removeHighlight( $this->username, $_POST['book'], $_POST['chapter'], $_POST['verse'] );
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
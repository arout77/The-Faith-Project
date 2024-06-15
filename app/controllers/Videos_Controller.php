<?php
namespace App\Controller;
use Src\Controller\Base_Controller;

class Videos_Controller extends Base_Controller
{
	/**
	 * @var mixed
	 */
	public $book;

	/**
	 * @var mixed
	 */
	public $books_of_bible;

	/**
	 * @var mixed
	 */
	public $categories;

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

		$this->categories = [
			'Biblical Themes',
			'Character of God',
			'Creation',
			'Intro to The Bible',
			'New Testament Overviews',
			'Old Testament Overviews',
			'Spiritual Beings',
			'Visual Commentaries',
		];

		// Add global var for all template files
		$this->template->twigEnv->addGlobal( 'book', $this->book );
		$this->template->twigEnv->addGlobal( 'intro', $this->intro );
		$this->template->twigEnv->addGlobal( 'chapter', $this->chapter );
		$this->template->twigEnv->addGlobal( 'version', $this->version );
		$this->template->twigEnv->addGlobal( 'books_of_bible', $this->books_of_bible );
	}

	public function category()
	{
		if ( isset( $this->route->parameter[1] ) )
		{
			$category = urldecode( $this->route->parameter[1] );
			$twigfile = strtolower( $category );
		}
		else
		{
			$category = 'all';
		}

		if ( $category == 'all' )
		{
			return self::index();
		}

		$cat        = str_replace( "-", " ", $category );
		$videomodel = $this->model( 'Videos' );
		$videos     = $videomodel->getVideosByCat( $cat );

		$this->template->render( "videos\\" . $twigfile . ".html.twig", [
			'videos' => $videos,
		] );

	}

	public function index()
	{
		// Model was created and stored at: /app/models/VideosModel.php
		// View was created and stored at: /app/template/views/videos/index.html.twig
		$videomodel = $this->model( 'Videos' );
		$videos     = $videomodel->getAllVideos();
		$this->template->render( "videos\categories.html.twig", [
			'video_list' => $videos,
			'categories' => $this->categories,
		] );
	}

	public function watch()
	{
		if ( empty( $this->route->parameter[1] ) )
		{
			$this->redirect( 'videos' );
		}

		$slug = strip_tags( urldecode( $this->route->parameter[1] ) );

		$videomodel = $this->model( 'Videos' );
		$thumbnail  = $videomodel->getThumbnail( $slug );
		$title      = $videomodel->getVideoRawTitle( $slug );

		if ( is_null( $title ) )
		{
			$this->redirect( 'error/not_found' );
		}

		$this->template->render( "videos\watch.html.twig", [
			'video'         => $slug,
			'videoRawTitle' => $title,
			'thumbnail'     => $thumbnail,
		] );
	}
}
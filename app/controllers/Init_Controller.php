<?php
namespace App\Controller;
use Src\Controller\Base_Controller;

class Init_Controller extends Base_Controller
{
	/**
	 * @var mixed
	 */
	public $avatar = null;

	/**
	 * @var mixed
	 */
	public $avatar_type = null;

	/**
	 * @var mixed
	 */
	public $base_url;

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
	public $email = null;

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
	public $last_visit_date;

	/**
	 * @var mixed
	 */
	public $num_chapters;

	/**
	 * @var mixed
	 */
	public $reg_date;

	/**
	 * @var mixed
	 */
	public $user_id = '0';

	/**
	 * @var mixed
	 */
	public $username = null;

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

		$this->base_url = $this->config->setting( "site_url" );

		$this->books_of_bible = [
			'Genesis', 'Exodus', 'Leviticus', 'Numbers', 'Deuteronomy', 'Joshua', 'Judges', 'Ruth', '1 Samuel', '2 Samuel',
			'1 Kings', '2 Kings', '1 Chronicles', '2 Chronicles', 'Ezra', 'Nehemiah', 'Esther', 'Job', 'Psalms', 'Proverbs',
			'Ecclesiastes', 'Song of Solomon', 'Isaiah', 'Jeremiah', 'Lamentations', 'Ezekiel', 'Daniel', 'Hosea', 'Joel',
			'Amos', 'Obadiah', 'Jonah', 'Micah', 'Nahum', 'Habakkuk', 'Zephaniah', 'Haggai', 'Zechariah', 'Malachi', 'Matthew',
			'Mark', 'Luke', 'John', 'Acts', 'Romans', '1 Corinthians', '2 Corinthians', 'Galatians', 'Ephesians', 'Philippians',
			'Colossians', '1 Thessalonians', '2 Thessalonians', '1 Timothy', '2 Timothy', 'Titus', 'Philemon', 'Hebrews',
			'James', '1 Peter', '2 Peter', '1 John', '2 John', '3 John', 'Jude', 'Revelation',
		];

		if ( empty( $_SESSION['user-first-visit-to-site'] ) )
		{
			$_SESSION['user-first-visit-to-site'] = 1;
		}
		else
		{
			$_SESSION['user-first-visit-to-site'] = $_SESSION['user-first-visit-to-site'] + 1;
		}

		if ( isset( $_SESSION['wog-username'] ) )
		{
			$model                 = $this->model( "Members" );
			$notifmodel            = $this->model( "Notifications" );
			$format                = $this->load->middleware( "Format" );
			$this->user_id         = $_SESSION['user_id'];
			$this->username        = $_SESSION['wog-username'];
			$this->email           = $_SESSION['wog-email'];
			$avatar                = $model->getAvatarUrl( $this->username, $this->email );
			$avatar_type           = $model->getAvatarType( $this->username );
			$this->avatar          = $avatar;
			$this->avatar_type     = $avatar_type;
			$this->reg_date        = $format->date( $model->getRegistrationDate() ) ?? null;
			$this->last_visit_date = $format->date( $model->getLastVisitDate() ) ?? null;

			$last_notif_time = $format->datetime( $notifmodel->unread_notif_time( $this->user_id ) );
			$last_pm_time    = $format->datetime( $notifmodel->unread_pm_time( $this->user_id ) );

			$this->template->twigEnv->addGlobal( 'user_id', $this->user_id );
			$this->template->twigEnv->addGlobal( 'last_notif_time', $last_notif_time );
			$this->template->twigEnv->addGlobal( 'last_pm_time', $last_pm_time );
			$this->template->twigEnv->addGlobal( 'reg_date', $this->reg_date );
			$this->template->twigEnv->addGlobal( 'last_visit_date', $this->last_visit_date );
		}
		else
		{
			session_destroy();
			$this->user_id  = '0';
			$this->username = null;
			$this->email    = null;
		}

		$vidmodel      = $this->model( "Videos" );
		$categories    = $vidmodel->getCategories();
		$allcategories = [];
		foreach ( $categories as $c )
		{
			$allcategories[] = $c['category'];
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

		// Generates <select> menu with corresponding chapter
		// numbers for each book
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

		// Add global var for all template files
		$this->template->twigEnv->addGlobal( 'avatar', $this->avatar );
		$this->template->twigEnv->addGlobal( 'avatar_type', $this->avatar_type );
		$this->template->twigEnv->addGlobal( 'book', $this->book );
		$this->template->twigEnv->addGlobal( 'bookMap', $this->bookSelectionMap );
		$this->template->twigEnv->addGlobal( 'intro', $this->intro );
		$this->template->twigEnv->addGlobal( 'chapter', $this->chapter );
		$this->template->twigEnv->addGlobal( 'version', $this->version );
		$this->template->twigEnv->addGlobal( 'books_of_bible', $this->books_of_bible );
		$this->template->twigEnv->addGlobal( 'video_categories', $allcategories );
	}

	public function index()
	{
	}
}
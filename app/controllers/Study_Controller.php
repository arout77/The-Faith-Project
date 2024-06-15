<?php
namespace App\Controller;
use Src\Controller\Base_Controller;

class Study_Controller extends Base_Controller
{
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

		// Add global var for all template files
		$this->template->twigEnv->addGlobal( 'book', $this->book );
		$this->template->twigEnv->addGlobal( 'intro', $this->intro );
		$this->template->twigEnv->addGlobal( 'chapter', $this->chapter );
		$this->template->twigEnv->addGlobal( 'version', $this->version );
		$this->template->twigEnv->addGlobal( 'books_of_bible', $this->books_of_bible );
	}

	public function index()
	{
		// Model was created and stored at: /app/models/StudyModel.php
		// View was created and stored at: /app/template/views/study/index.html.twig.html.twig
		$this->template->render( "study\index.html.twig" );
	}

	public function quiz()
	{
		// Quiz on Old / New Testament or both
		if ( !isset( $this->route->parameter[1] ) )
		{
			$type = "general";
		}
		else
		{
			$type = $this->route->parameter[1];
		}

		$num_questions = 20;
		$model         = $this->model( 'Study' );
		$questions     = $model->getQuiz( $type );

		$this->template->render( "study\quiz.html.twig",
			[
				'results'       => $questions,
				'total_records' => $num_questions,
			]
		);

	}

	public function quiz_results()
	{
		if ( empty( $_POST ) )
		{
			$this->redirect( 'study/quiz/' );
			exit;
		}

		$max             = $_POST['totalrecords'];
		$question        = [];
		$correct_answers = 0;

		for ( $i = 1; $i <= $max; $i++ )
		{
			// Gather questions and answers to pass to twig
			$question[$i]['text']          = $_POST["questionText-$i"];
			$question[$i]['answergiven']   = $_POST["question{$i}"];
			$question[$i]['correctanswer'] = $_POST["answer-{$i}"];

			// Grade the responses
			if ( $question[$i]['answergiven'] == $question[$i]['correctanswer'] )
			{
				$correct_answers = $correct_answers + 1;
			}

		}

		$percent = ( $correct_answers / $_POST['totalrecords'] ) * 100;

		$this->template->render( "study\quiz-results.html.twig",
			[
				'question'        => $question,
				'correct_answers' => $correct_answers,
				'total_records'   => $_POST['totalrecords'],
				'percent'         => (int) $percent,
			]
		);

	}
}
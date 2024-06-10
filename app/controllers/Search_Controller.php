<?php
namespace App\Controller;
use Src\Controller\Base_Controller;

class Search_Controller extends Base_Controller
{
	public function index()
	{
		// Model was created and stored at: /app/models/SearchModel.php
		// View was created and stored at: /app/template/views/search/results.html.twig
		$regex = "/\b(?:(I+|1st|2nd|3rd|First|Second|Third|[123]) )?(Gen|Ge|Gn|Exo|Ex|Exod|Lev|Le|Lv|Num|Nu|Nm|Nb|Deut|Dt|Josh|Jos|Jsh|Judg|Jdg|Jg|Jdgs|Rth|Ru|Sam|Samuel|Kings|Kgs|Kin|Chron|Chronicles|Ezra|Ezr|Neh|Ne|Esth|Es|Job|Job|Jb|Pslm|Ps|Psalms|Psa|Psm|Pss|Prov|Pr|Prv|Eccles|Ec|Song|So|Canticles|Song of Songs|SOS|Isa|Is|Jer|Je|Jr|Lam|La|Ezek|Eze|Ezk|Dan|Da|Dn|Hos|Ho|Joel|Joe|Jl|Amos|Am|Obad|Ob|Jnh|Jon|Micah|Mic|Nah|Na|Hab|Zeph|Zep|Zp|Haggai|Hag|Hg|Zech|Zec|Zc|Mal|Mal|Ml|Matt|Mt|Mrk|Mk|Mr|Luk|Lk|John|Jn|Jhn|Acts|Ac|Rom|Ro|Rm|Co|Cor|Corinthians|Gal|Ga|Ephes|Eph|Phil|Php|Col|Col|Th|Thes|Thess|Thessalonians|Ti|Tim|Timothy|Titus|Tit|Philem|Phm|Hebrews|Heb|James|Jas|Jm|Pe|Pet|Pt|Peter|Jn|Jo|Joh|Jhn|John|Jude|Jud|Rev|The Revelation|Genesis|Exodus|Leviticus|Numbers|Deuteronomy|Joshua|Judges|Ruth|Samuel|Kings|Chronicles|Ezra|Nehemiah|Esther|Job|Psalms|Psalm|Proverbs|Ecclesiastes|Song of Solomon|Isaiah|Jeremiah|Lamentations|Ezekiel|Daniel|Hosea|Joel|Amos|Obadiah|Jonah|Micah|Nahum|Habakkuk|Zephaniah|Haggai|Zechariah|Malachi|Matthew|Mark|Luke|John|Acts|Romans|Corinthians|Galatians|Ephesians|Philippians|Colossians|Thessalonians|Timothy|Titus|Philemon|Hebrews|James|Peter|John|Revelation)\b(?:[ .)\n|](\d+(?::\d+){0,2}\b))?/gi";
		$this->template->render( "search/index.html.twig" );
	}

	/**
	 * @return mixed
	 */
	public function results()
	{
		if ( !isset( $_GET['navSearch'] ) )
		{
			$this->redirect( 'search/' );
			exit;
		}

		$validate = $this->load->middleware( 'validation' );

		$searchTerm = urldecode( $_GET['navSearch'] );

		$validate->form( $_GET, [
			'navSearch' => [
				'Searchbox' => 'required|max_length,30|min_length,3',
			],
		] );

		$errors = $validate->errors();

		$ver = $_COOKIE['session_bible_version'] ?? 'kjv';

		switch ( $ver )
		{
		case 'asv':
			$bibleVersion = 'bible_verses_asv';
			break;
		case 'kjv':
			$bibleVersion = 'bible_verses_kjv';
			break;
		case 'web':
			$bibleVersion = 'bible_verses_web';
			break;
		case 'reina':
			$bibleVersion = 'bible_verses_rv_1909';
			break;
		case 'segond':
			$bibleVersion = 'bible_verses_segond_1910';
			break;
		case 'luther':
			$bibleVersion = 'bible_verses_luther_1912';
			break;

		default:
			$bibleVersion = 'bible_verses_kjv';
			break;
		}

		$dataset  = $this->model( 'Search' );
		$sql      = $dataset->getSearchResults( $searchTerm, $bibleVersion );
		$url      = 'search/results/';
		$per_page = 10;
		$pag      = $this->load->middleware( 'pagination' );
		$pag->config( $sql, $url, $per_page );
		$results = $pag->runQuery();
		$links   = $pag->links();

		$this->template->render( "search/results.html.twig", [
			'results'       => $results,
			'links'         => $links,
			'total_records' => $pag->num_records,
			'errors'        => $errors,
		] );
	}
}
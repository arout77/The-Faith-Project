<?php
namespace App\Controller;

class Search_Controller extends Init_Controller
{
	public function crawl()
	{
		set_time_limit( 300 );
		$base_url = $this->config->setting( 'site_url' );

		$doc = new \DOMDocument();
		$doc->loadHTMLFile( 'http://localhost/wordofgod/bible/kjv' );
		// Get body tag.
		$body = $doc->getElementsByTagName( 'body' );
		if ( $body and $body->length > 0 )
		{
			$body = $body->item( 0 );

			// Do stuff with the body tag...

			// Get altered HTML and clean up.
			$html = $doc->saveHTML();
			$html = str_replace( '<?xml encoding="UTF-8" ?>', '', $html );

			// Return modified HTML.
			echo $html;
		}
		var_dump( $tables );exit;
		foreach ( $doc->getElementsByTagName( 'a' ) as $item )
		{
			$href = $item->getAttribute( 'href' );

			if ( str_contains( $href, 'javascript:void(0)' ) )
			{
				continue;
			}

			if ( !str_contains( $href, $base_url ) )
			{
				$href = $base_url . $href;
			}

			$tags = get_meta_tags( $href );

			$model = $this->model( 'Search' );
			if ( !empty( $tags['description'] ) && !empty( $tags['keywords'] ) )
			{
				$model->index( $href, $tags['keywords'], $tags['description'] );
			}
		}
	}

	public function gAPI()
	{
		https: //www.googleapis.com/customsearch/v1?key={YOUR_API_KEY}&cx={CUSTOM_SEARCH_ENGINE_ID}&q={KEYWORD}
		$url = "https://www.googleapis.com/customsearch/v1?key=AIzaSyC86D705e2t-i5KhcxxQ-zLoW2Vdgflzgg&cx=";
	}

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
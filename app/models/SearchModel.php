<?php
namespace App\Model;
use Src\Model\System_Model;

class SearchModel extends System_Model
{
	/**
	 * @param $searchTerm
	 * @return mixed
	 */
	public function getSearchResults( $searchTerm, $bibleVersion )
	{
		$content = [];

		$searchTerm = strip_tags( $searchTerm );

		// if(preg_match("/([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?/ig"), $searchTerm)
		// {

		// 	$query = $this->getAll( "SELECT text FROM $bibleVersion WHERE chapter = ? AND verse = ?" );
		// }

		$query = $this->getAll( "SELECT * FROM $bibleVersion WHERE text LIKE '%$searchTerm%'" );

		foreach ( $query as $key => $results )
		{
			$results   = str_replace( "$searchTerm", "<mark>$searchTerm</mark>", $results );
			$content[] = $results;
		}

		return $content;
	}

	/**
	 * @param $url
	 * @param $description
	 * @param $keywords
	 * @return mixed
	 */
	public function index( $url, $description, $keywords )
	{
		$this->exec( "INSERT IGNORE INTO search (url, description, keywords) VALUES ('$url', '$description', '$keywords')" );
	}

	/**
	 * @param $searchTerm
	 */
	public function searchDocsPages( $searchTerm )
	{
		$this->getAll( 'SELECT content FROM documentation WHERE content LIKE ?',
			['%' . $searchTerm . '%']
		);
	}

	/**
	 * @return mixed
	 */
	public function testing()
	{
		$content = [];

		$query = $this->getAll( "SELECT * FROM documentation" );

		foreach ( $query as $key => $results )
		{
			$content[] = $results;
		}

		return $content;
	}
}
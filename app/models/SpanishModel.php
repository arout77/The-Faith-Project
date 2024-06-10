<?php
namespace App\Model;
use Src\Model\System_Model;

class SpanishModel extends System_Model
{
	/**
	 * @return mixed
	 */
	public function translate( $url )
	{
		return $this->getAll( 'SELECT id, html_id, text FROM spanish WHERE url = ?', [$url] );
	}

	/**
	 * @param $chapter
	 * @param $title
	 * @return mixed
	 */
	public function update( $chapter, $title )
	{
		// exit( "$chapter == $title" );
		return $this->exec( 'UPDATE bible_verses_web SET book_name = ? WHERE book = ?', [$title, $chapter] );
	}
}
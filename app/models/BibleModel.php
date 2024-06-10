<?php
namespace App\Model;
use Src\Model\System_Model;

class BibleModel extends System_Model
{
	/**
	 * @param $book
	 * @param $chapter
	 * @return mixed
	 */
	public function getASV( $book, $chapter )
	{
		return $this->getAll( 'SELECT book_name, chapter, verse, text, testament FROM bible_verses_asv WHERE book_name = ? AND chapter = ?', [$book, $chapter] );
	}

	/**
	 * @param $book
	 * @return mixed
	 */
	public function getChapterCount( $book )
	{
		// Get the number of chapters for this book
		return $this->getRow( 'SELECT MAX(chapter) AS "total" FROM bible_verses_kjv WHERE book_name = ?', [$book] );
	}

	/**
	 * @return mixed
	 */
	public function getChapterCountMap()
	{
		// Create array map of books and chapter count
		return $this->getAssoc( 'SELECT book_name, MAX(chapter) AS "total" FROM bible_verses_kjv GROUP BY book_name' );
	}

	/**
	 * @param $book
	 * @return mixed
	 */
	public function getIntro( $book )
	{
		return $this->getAll( 'SELECT text FROM intro WHERE book = ?', [$book] );
	}

	/**
	 * @return mixed
	 */
	public function getKJV( $book, $chapter )
	{
		return $this->getAll( 'SELECT book_name, chapter, verse, text, testament FROM bible_verses_kjv WHERE book_name = ? AND chapter = ?', [$book, $chapter] );
	}

	/**
	 * @param $book
	 * @return mixed
	 */
	public function getSummary( $book )
	{
		return $this->getAll( 'SELECT summary FROM summaries WHERE book = ?', [$book] );
	}

	/**
	 * @param $book
	 * @param $chapter
	 * @return mixed
	 */
	public function getWEB( $book, $chapter )
	{
		return $this->getAll( 'SELECT book_name, chapter, verse, text, testament FROM bible_verses_web WHERE book_name = ? AND chapter = ?', [$book, $chapter] );
	}
}
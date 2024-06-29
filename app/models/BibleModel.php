<?php
namespace App\Model;
use Src\Model\System_Model;

class BibleModel extends System_Model
{
	/**
	 * @param $user
	 * @param $book
	 * @param $chapter
	 * @param $verse
	 * @return mixed
	 */
	public function addHighlight( $user, $book, $chapter, $verse )
	{
		return $this->exec( 'INSERT INTO `highlighted_verses` (`username`, `book`, `chapter`, `verse`)
			VALUES (?,?,?,?)', ["$user", "$book", $chapter, $verse] );
	}

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
	 * @param $user
	 * @param $book
	 * @return mixed
	 */
	public function getHighlightedVerses( $user, $book, $chapter )
	{
		return $this->getAll( 'SELECT book, chapter, verse FROM highlighted_verses WHERE username = ? AND book = ? AND chapter = ?', [$user, $book, $chapter] );
	}

	/**
	 * @param $book
	 * @return mixed
	 */
	public function getIntro( $cat )
	{
		if ( $cat == 'all' )
		{
			return $this->getAll( 'SELECT id, book, text, category FROM intro' );
		}
		return $this->getAll( 'SELECT id, book, text, category FROM intro WHERE category = ? OR book = ?', [$cat, $cat] );
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
	 * @param $chapter
	 * @return mixed
	 */
	public function getReina( $book, $chapter )
	{
		return $this->getAll( 'SELECT book_name, chapter, verse, text, testament FROM bible_verses_rv_1909 WHERE book_name = ? AND chapter = ?', [$book, $chapter] );
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

	/**
	 * @param $user
	 * @param $book
	 * @param $chapter
	 * @param $verse
	 * @return mixed
	 */
	public function removeHighlight( $user, $book, $chapter, $verse )
	{
		return $this->exec( 'DELETE FROM highlighted_verses WHERE username = ? AND book = ? AND chapter = ? AND verse = ?', [$user, $book, $chapter, $verse] );
	}
}
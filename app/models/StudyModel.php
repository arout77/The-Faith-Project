<?php
namespace App\Model;
use Src\Model\System_Model;

class StudyModel extends System_Model
{
	/**
	 * @param $type
	 * @return mixed
	 */
	public function getQuiz( $type = 'general' )
	{
		if ( $type == 'general' )
		{
			return $this->getAll( 'SELECT id, question, opt1, opt2, opt3, opt4, answer, testament
				FROM quiz
				ORDER BY RAND()
				LIMIT 20'
			);
		}

		if ( $type == 'ot' )
		{
			return $this->getAll( 'SELECT question, opt1, opt2, opt3, opt4, answer, testament
				FROM quiz
				WHERE testament = "Old Testament"
				ORDER BY RAND()
				LIMIT 20'
			);
		}

		if ( $type == 'nt' )
		{
			return $this->getAll( 'SELECT question, opt1, opt2, opt3, opt4, answer, testament
				FROM quiz
				WHERE testament = "New Testament"
				ORDER BY RAND()
				LIMIT 20'
			);
		}

	}
}
<?php
namespace App\Model;
use Src\Model\System_Model;

class SiteModel extends System_Model
{
	/**
	 * @param $email
	 */
	public function addSubscription( $email )
	{
		$sql   = $this->getRow( "SELECT COUNT(*) as count FROM subscribers WHERE email = ?", [$email] );
		$count = $sql['count'];

		if ( $count >= 1 )
		{
			return 'Already subscribed';
		}
		else
		{
			try {
				$subscriber = $this->exec( "INSERT INTO subscribers(email) VALUES(?)", [$email] );
				if ( !is_null( $subscriber ) )
				{
					return "sucess";
				}
				else
				{
					return "error";
				}
			}
			catch ( \Exception $e )
			{
				return "error";
			}
		}
	}
}
<?php
namespace App\Model;
use Src\Model\System_Model;

class MembersModel extends System_Model
{
	/**
	 * @param $username
	 * @param $email
	 */
	public function getAvatarType( $username )
	{
		$pic = $this->getRow( 'SELECT user_avatar_type FROM phpbb_users WHERE username = ?', [$username] );
		if ( $pic['user_avatar_type'] == 'avatar.driver.gravatar' )
		{
			return "gravatar";
		}
		if ( $pic['user_avatar_type'] == 'avatar.driver.upload' )
		{
			return "upload";
		}
	}

	/**
	 * @param $username
	 * @param $email
	 */
	public function getAvatarUrl( $username, $email )
	{
		$pic = $this->getRow( 'SELECT user_avatar, user_avatar_type FROM phpbb_users WHERE username = ?', [$username] );
		if ( $pic['user_avatar_type'] == 'avatar.driver.gravatar' )
		{
			$gravatar_profile = hash( 'sha256', strtolower( trim( $email ) ) );
			return "//secure.gravatar.com/avatar/{$gravatar_profile}?s=90";
		}
		else
		{
			return "community/download/file.php?avatar=" . $pic['user_avatar'];
		}
	}

	/**
	 * @return mixed
	 */
	public function getLastVisitDate()
	{
		$date = $this->getRow( 'SELECT user_lastvisit FROM phpbb_users WHERE username = ?', [$_SESSION['wog-username']] );
		return $date["user_lastvisit"];
	}

	/**
	 * @return mixed
	 */
	public function getRegistrationDate()
	{
		$date = $this->getRow( 'SELECT user_regdate FROM phpbb_users WHERE username = ?', [$_SESSION['wog-username']] );
		return $date["user_regdate"];
	}
}
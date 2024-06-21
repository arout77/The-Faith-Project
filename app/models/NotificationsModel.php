<?php
namespace App\Model;
use Src\Model\System_Model;

class NotificationsModel extends System_Model
{
	/**
	 * @return mixed
	 */
	public function unread_notif_count()
	{
		return $this->count( 'phpbb_notifications', ' notification_read = ? AND user_id = ?', [0, $_POST['userid']] );
	}

	/**
	 * @param $userid
	 */
	public function unread_notif_time( $userid = null )
	{
		if ( is_null( $userid ) && empty( $_POST ) )
		{
			$userid = $_SESSION['session_id'];
		}
		if ( isset( $_POST ) )
		{
			if ( isset( $_POST['userid'] ) )
			{
				$userid = $_POST['userid'];
			}
		}

		$time = $this->getRow( 'SELECT MAX(notification_time) as "notification_time" FROM phpbb_notifications WHERE user_id = ?', [$userid] );
		return $time['notification_time'];
	}

	/**
	 * @return mixed
	 */
	public function unread_pm_count()
	{
		return $this->count( 'phpbb_privmsgs_to', ' pm_unread = ? AND user_id = ?', [1, $_POST['userid']] );
	}

	/**
	 * @param $userid
	 */
	public function unread_pm_time( $userid = null )
	{
		if ( is_null( $userid ) && empty( $_POST ) )
		{
			$userid = $_SESSION['session_id'];
		}
		if ( isset( $_POST ) )
		{
			if ( isset( $_POST['userid'] ) )
			{
				$userid = $_POST['userid'];
			}
		}

		$time = $this->getRow( 'SELECT MAX(message_time) as "message_time" FROM phpbb_privmsgs WHERE to_address = ?', ["u_" . $userid] );
		return $time['message_time'];
	}
}
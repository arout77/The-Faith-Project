<?php
namespace App\Controller;

class Notifications_Controller extends Init_Controller
{
	public function index()
	{
		// Model was created and stored at: /app/models/NotificationsModel.php
		$this->redirect( 'error/_404' );
	}

	public function unread_notif_count()
	{
		$model = $this->model( "Notifications" );
		$count = $model->unread_notif_count();
		if ( !is_null( $count ) )
		{
			echo (int) $count;
		}
	}

	public function unread_notif_time()
	{
		$model = $this->model( "Notifications" );
		$time  = $model->unread_notif_time();
		if ( !is_null( $time ) )
		{
			echo (int) $time;
		}
	}

	public function unread_pm_count()
	{
		$model = $this->model( "Notifications" );
		$count = $model->unread_pm_count();
		if ( !is_null( $count ) )
		{
			echo (int) $count;
		}
	}

	public function unread_pm_time()
	{
		$model = $this->model( "Notifications" );
		$time  = $model->unread_pm_time();
		if ( !is_null( $time ) )
		{
			echo (int) $time;
		}
	}
}
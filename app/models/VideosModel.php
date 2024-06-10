<?php
namespace App\Model;
use Src\Model\System_Model;

class VideosModel extends System_Model
{
	/**
	 * @return mixed
	 */
	public function getAllVideos()
	{
		return $this->getAll( "SELECT title, intro, category, thumbnail, video_url, priority FROM videos ORDER BY priority ASC" );
	}

	/**
	 * @return mixed
	 */
	public function getCategories()
	{
		$content = [];

		$query = $this->getAll( "SELECT category FROM videos" );

		foreach ( $query as $key => $category )
		{
			$content[] = $category;
		}

		return $content;
	}

	/**
	 * @param $videotitle
	 */
	public function getThumbnail( $videotitle )
	{
		$videotitle = $videotitle . ".mp4";
		$thumb      = $this->getCol( "SELECT thumbnail FROM videos WHERE video_url = ?", [$videotitle] );
		foreach ( $thumb as $nail )
		{
			return $nail;
		}
	}

	/**
	 * @param $slug
	 * @return mixed
	 */
	public function getVideoRawTitle( $slug )
	{
		$slug  = $slug . ".mp4";
		$thumb = $this->getCol( "SELECT title FROM videos WHERE video_url = ?", [$slug] );
		foreach ( $thumb as $nail )
		{
			return $nail;
		}
	}

	/**
	 * @param $cat
	 * @return mixed
	 */
	public function getVideosByCat( $cat )
	{
		return $this->getAll( "SELECT title, intro, category, thumbnail, video_url, priority FROM videos WHERE category = ? ORDER BY priority ASC", [$cat] );
	}
}
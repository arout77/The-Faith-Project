<?php
namespace App\Model;
use Src\Model\System_Model;

class VideosModel extends System_Model
{
	/**
	 * @var array
	 */
	public $video_categories = [
		'Biblical Themes',
		'Book Collections',
		'Character of God',
		'Creation',
		'Intro to The Bible',
		'New Testament Overviews',
		'Old Testament Overviews',
		'Spiritual Beings',
		'Visual Commentaries',
	];

	/**
	 * @var array
	 */
	public $video_subcategories = [
		'Acts/Luke Series',
		'Mark',
		'Torah Series',
	];

	/**
	 * @param $videotitle
	 * @return mixed
	 */
	public function getAllEpisodesFromCollection( $subcategory )
	{
		// Get all available episodes for this collection
		$content = [];

		return $this->getAll( "SELECT title, title_raw, intro, category, subcategory, episode, thumbnail FROM videos WHERE subcategory = ?", [$subcategory['subcategory']] );

		foreach ( $query as $key => $category )
		{
			$content[] = $category['subcategory'];
		}

		return $content;
	}

	/**
	 * @return mixed
	 */
	public function getAllVideos()
	{
		return $this->getAll( "SELECT title, title_raw, intro, category, subcategory, episode, thumbnail, video_url, priority, date_added, views FROM videos ORDER BY priority ASC" );
	}

	/**
	 * @return mixed
	 */
	public function getBookCollection( $series )
	{
		// Get all videos from book collections series
		return $this->getAll( "SELECT title, title_raw, intro, category, subcategory, episode, thumbnail, video_url, priority, date_added, views FROM videos WHERE subcategory = ? ORDER BY episode ASC", [$series] );
	}

	/**
	 * @return mixed
	 */
	public function getBookCollections()
	{
		// Get all videos from book collections series
		return $this->getAll( "SELECT title, title_raw, intro, category, subcategory, episode, thumbnail, video_url, priority, date_added, views FROM videos WHERE category = ? ORDER BY subcategory ASC", ["Book Collections"] );
	}

	/**
	 * @return mixed
	 */
	public function getCategories()
	{
		// Get all available categories
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
	 * @return mixed
	 */
	public function getEpisodeNum( $videotitle )
	{
		$videotitle = $videotitle . ".mp4";
		$thumb      = $this->getCol( "SELECT episode FROM videos WHERE video_url = ?", [$videotitle] );
		foreach ( $thumb as $nail )
		{
			return $nail;
		}
	}

	/**
	 * @return mixed
	 */
	public function getLatest()
	{
		return $this->getAll( "SELECT *, STR_TO_DATE(date_added, '%M %d, %Y') as d FROM videos ORDER BY date_added DESC LIMIT 8" );
	}

	/**
	 * @return mixed
	 */
	public function getMostPopular()
	{
		return $this->getAll( "SELECT title, title_raw, intro, category, subcategory, episode, thumbnail, video_url, priority, date_added, views FROM videos ORDER BY views DESC LIMIT 8" );
	}

	/**
	 * @param $category
	 * @return mixed
	 */
	public function getRelatedVideos( $category )
	{
		// var_dump( $category );exit;
		return $this->getAll( "SELECT title, title_raw, intro, category, subcategory, episode, thumbnail, video_url, priority, date_added, views FROM videos WHERE category = ? ORDER BY priority DESC", [$category['category']] );
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
	 * @param $video
	 * @return mixed
	 */
	public function getVideoCat( $slug )
	{
		// Get the category of this video
		$slug = $slug . ".mp4";
		return $this->getRow( "SELECT category FROM videos WHERE video_url = ?", [$slug] );
	}

	/**
	 * @param $slug
	 * @return mixed
	 */
	public function getVideoIntro( $slug )
	{
		// Get the subcategory of this video
		$slug = $slug . ".mp4";
		return $this->getCol( "SELECT intro FROM videos WHERE video_url = ?", [$slug] );
	}

	/**
	 * @param $slug
	 * @return mixed
	 */
	public function getVideoRawTitle( $slug )
	{
		$slug  = $slug . ".mp4";
		$thumb = $this->getRow( "SELECT title, title_raw FROM videos WHERE video_url = ?", [$slug] );

		if ( $thumb['title_raw'] != '' && !is_null( $thumb['title_raw'] ) )
		{
			return $thumb['title_raw'];
		}

		return $thumb['title'];
	}

	/**
	 * @param $video
	 * @return mixed
	 */
	public function getVideoSubcat( $slug )
	{
		// Get the subcategory of this video
		$slug = $slug . ".mp4";
		return $this->getRow( "SELECT subcategory FROM videos WHERE video_url = ?", [$slug] );
	}

	/**
	 * @param $cat
	 * @return mixed
	 */
	public function getVideosByCat()
	{
		// Get videos and sort by category
		$container = [];

		foreach ( $this->video_categories as $cat )
		{
			$q = $this->getAll( "SELECT title, title_raw, intro, category, subcategory, episode, thumbnail, video_url, priority, date_added, views FROM videos WHERE category = ? ORDER BY priority ASC", [$cat] );

			$container[$cat] = $q;
		}

		return $container;
	}

	/**
	 * @param $subcat
	 * @return mixed
	 */
	public function getVideosBySubcat( $subcat )
	{
		// Get videos in this subcategory
		return $this->getAll( "SELECT title, title_raw, intro, category, subcategory, episode, thumbnail, video_url, priority, date_added, views FROM videos WHERE category = ?", [$subcat] );
	}

	/**
	 * @param $slug
	 * @return mixed
	 */
	public function updateViewsCount( $slug )
	{
		// Get the subcategory of this video
		$slug      = $slug . ".mp4";
		$initial   = $this->getRow( "SELECT views FROM videos WHERE video_url = ?", [$slug] );
		$new_count = $initial["views"] + 1;
		return $this->exec( "UPDATE videos SET views = ? WHERE video_url = ?", [$new_count, $slug] );
	}
}
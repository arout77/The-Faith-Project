<?php
namespace App\Model;
use Src\Model\System_Model;

class VideosModel extends System_Model
{
	/**
	 * @var array
	 */
	public $video_categories = [];

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
		if ( $series == 'Luke Acts' )
		{
			$series = 'Luke-Acts Series';
		}
		elseif ( $series == 'torah' )
		{
			$series = 'Torah Series';
		}
		elseif ( $series == 'Torah_Series' )
		{
			$series = 'Torah Series';
		}
		elseif ( $series == 'mark' )
		{
			$series = 'Mark';
		}

		return $this->getAll( "SELECT title, title_raw, intro, category, subcategory, episode, thumbnail, video_url, priority, date_added, views FROM videos WHERE subcategory = ? ORDER BY episode ASC", [$series] );
	}

	/**
	 * @return mixed
	 */
	public function getBookCollections()
	{
		// Get all videos from book collections series
		return $this->getAll( "SELECT DISTINCT videos.subcategory, video_cat_descriptions.thumbnail AS catthumbnail, video_cat_descriptions.description, video_cat_descriptions.url FROM videos JOIN video_cat_descriptions ON video_cat_descriptions.subcategory = videos.subcategory WHERE videos.category = ? ORDER BY videos.subcategory ASC", ["Book Collections"] );
	}

	/**
	 * @param $cat
	 * @param $subcat
	 * @return mixed
	 */
	public function getCatDescription( $cat, $subcat = null )
	{
		if ( is_null( $subcat ) )
		{
			return $this->getRow( "SELECT description, thumbnail FROM video_cat_descriptions WHERE category = ?", [$cat] );
		}

		if ( $subcat == 'Luke Acts' )
		{
			$subcat = 'Luke-Acts Series';
		}

		return $this->getRow( "SELECT description, thumbnail FROM video_cat_descriptions WHERE subcategory = ?", [$subcat] );
	}

	/**
	 * @return mixed
	 */
	public function getCategories()
	{
		// Get all available categories
		$content = [];

		$query = $this->getAll( "SELECT DISTINCT category FROM videos ORDER BY category ASC" );

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
	public function getMostPopular( $limit = 8 )
	{
		return $this->getAll( "SELECT title, title_raw, intro, category, subcategory, episode, thumbnail, video_url, priority, date_added, views FROM videos ORDER BY views DESC LIMIT $limit" );
	}

	/**
	 * @param $category
	 * @return mixed
	 */
	public function getRelatedVideos( $category, $subcat = null )
	{
		if ( !is_null( $subcat['subcategory'] ) )
		{
			return $this->getAll( "SELECT title, title_raw, intro, category, subcategory, episode, thumbnail, video_url, priority, date_added, views FROM videos WHERE category = ? AND subcategory != ? ORDER BY priority DESC", [$category['category'], $subcat['subcategory']] );
		}

		return $this->getAll( "SELECT title, title_raw, intro, category, episode, thumbnail, video_url, priority, date_added, views FROM videos WHERE category = ? ORDER BY priority DESC", [$category['category']] );

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
	public function getVideosByCat( $cat = null )
	{
		if ( is_null( $cat ) )
		{
			// Get videos and sort by category
			$container        = [];
			$video_categories = self::getCategories();

			foreach ( $video_categories as $cat )
			{
				$q = $this->getAll( "SELECT title, title_raw, intro, category, subcategory, episode, thumbnail, video_url, priority, date_added, views FROM videos WHERE category = ? ORDER BY priority ASC", [$cat['category']] );

				$container[$cat['category']] = $q;
			}

			return $container;
		}

		$cat = str_replace( "-", " ", $cat );

		return $this->getAll( "SELECT title, title_raw, intro, category, subcategory, episode, thumbnail, video_url, priority, date_added, views FROM videos WHERE category = ? ORDER BY priority ASC", [$cat] );

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
	 * @param $stars
	 * @param $submitted_by
	 */
	public function submitRating( $stars, $submitted_by )
	{
		$checkIfAlreadyRated = $this->getRow( "SELECT rating, submitted_by FROM video_ratings WHERE submitted_by = ?", [$submitted_by] );
		var_dump( $checkIfAlreadyRated );exit;
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
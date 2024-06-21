<?php
namespace App\Controller;

class Videos_Controller extends Init_Controller
{
	/**
	 * @var mixed
	 */
	public $book;

	/**
	 * @var mixed
	 */
	public $books_of_bible;

	/**
	 * @var mixed
	 */
	public $categories;

	/**
	 * @var mixed
	 */
	public $chapter;

	/**
	 * @var mixed
	 */
	public $intro;

	/**
	 * @var mixed
	 */
	public $lang;

	/**
	 * @var mixed
	 */
	public $num_chapters;

	/**
	 * @var mixed
	 */
	public $version;

	public function category()
	{
		if ( isset( $this->route->parameter[1] ) )
		{
			$category = urldecode( $this->route->parameter[1] );
			$twigfile = strtolower( $category );
		}
		else
		{
			$category = 'all';
		}

		if ( $category == 'all' )
		{
			return self::index();
		}

		$cat        = str_replace( "-", " ", $category );
		$videomodel = $this->model( 'Videos' );
		$videos     = $videomodel->getVideosByCat();

		$this->template->render( "videos\\" . $twigfile . ".html.twig", [
			'videos' => $videos,
		] );

	}

	public function collections()
	{
		// Book Collections
		if ( !isset( $this->route->parameter[1] ) || $this->route->parameter[1] == '' )
		{
			$collection = 'all';
		}
		else
		{
			$collection = urldecode( strip_tags( $this->route->parameter[1] ) );
		}

		$model = $this->model( 'Videos' );

		if ( $collection == 'all' )
		{
			$collections = $model->getBookCollections();
			$this->template->render( "videos\collections.html.twig", [
				'collections' => $collections,
			] );
		}
		else
		{
			$episodes = $model->getBookCollection( $collection );
			$this->template->render( "videos\\" . $collection . ".html.twig", [
				'episodes' => $episodes,
			] );
		}
	}

	public function index()
	{
		// Model was created and stored at: /app/models/VideosModel.php
		// View was created and stored at: /app/template/views/videos/index.html.twig
		$videomodel = $this->model( 'Videos' );
		$videos     = $videomodel->getVideosByCat();
		$popular    = $videomodel->getMostPopular();
		$latest     = $videomodel->getLatest();
		$this->template->render( "videos\categories.html.twig", [
			'video_list'   => $videos,
			'most_popular' => $popular,
			'lastest'      => $latest,
			'categories'   => $this->categories,
		] );
	}

	public function watch()
	{
		if ( empty( $this->route->parameter[1] ) )
		{
			$this->redirect( 'videos' );
		}

		$slug = strip_tags( urldecode( $this->route->parameter[1] ) );

		$videomodel = $this->model( 'Videos' );
		$videomodel->updateViewsCount( $slug );
		$thumbnail = $videomodel->getThumbnail( $slug );
		$title     = $videomodel->getVideoRawTitle( $slug );
		$intro     = $videomodel->getVideoIntro( $slug );
		$cat       = $videomodel->getVideoCat( $slug );
		$subcat    = $videomodel->getVideoSubcat( $slug );
		$episode   = $videomodel->getEpisodeNum( $slug );
		// Videos that are not part of a collection,
		// get other videos from this category
		$related_videos = $videomodel->getRelatedVideos( $cat );
		// For videos that are part of a collection
		$getAllEpisodesFromCollection = null;

		$epcount              = 0;
		$related_videos_count = 0;

		if ( $episode != 0 )
		{
			$getAllEpisodesFromCollection = $videomodel->getAllEpisodesFromCollection( $subcat );
			$epcount                      = count( $getAllEpisodesFromCollection );
		}

		if ( !is_null( $related_videos ) )
		{
			$related_videos_count = count( $related_videos );
		}

		if ( is_null( $title ) )
		{
			$this->redirect( 'error/not_found' );
		}

		$this->template->render( "videos\watch.html.twig", [
			'video'                => $slug,
			'videoRawTitle'        => $title,
			'video_category'       => $cat,
			'video_subcategory'    => $subcat,
			'intro'                => $intro,
			'thumbnail'            => $thumbnail,
			'episode'              => $episode,
			'all_episodes'         => $getAllEpisodesFromCollection,
			'ep_count'             => $epcount,
			'related_videos'       => $related_videos,
			'related_videos_count' => $related_videos_count,
		] );
	}
}
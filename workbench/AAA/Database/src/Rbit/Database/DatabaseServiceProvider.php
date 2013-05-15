<?php namespace Rbit\Database;

use Illuminate\Support\ServiceProvider;
use Config;
use Log;

class DatabaseServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
		$this->app->bind('collection_tweet', function() {

			$mongoconnection = Config::get("spotweet.mongo-connection");
			$mongo_url = parse_url($mongoconnection);
			$mongodatabase = str_replace("/", "", $mongo_url["path"]);
			//$mongodatabase = Config::get("spotweet.mongo-database");

			Log::info('Mongo connection : '.$mongo_url["host"]);
			if (array_key_exists("user", $mongo_url)) {
				Log::info('Mongo user       : '.$mongo_url["user"]);
			}
			Log::info('Mongo database   : '.$mongodatabase);
			$mc = new \MongoClient($mongoconnection);

			$db = $mc->selectDB($mongodatabase);
      $c_tweets = $db->tweets;
      return $c_tweets;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
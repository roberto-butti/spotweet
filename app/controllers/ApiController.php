<?php

class ApiController extends \BaseController {

	/**
	 * Display a listing tweet grouped by lang
	 *
	 * @return Response
	 */
	public function lang()
	{
		$c_tweets = App::make('collection_tweet');
		$date = new DateTime();
	  $time = 1;
	  $unit_time="M";
	  $date->sub(new DateInterval('PT' . $time . $unit_time));
	  $mdate = new MongoDate($date->getTimestamp());
	  $g = $c_tweets->aggregate(
	    array(
	        '$match' => array(
	          'rbit_created_at' => array(
	            '$gt' => $mdate
	        )
	        )
	      )
	    ,
	    array(
	      '$group' => 
	      array(
	        "_id" => '$lang',
	        "count" => array('$sum' => 1)
	      ) 
	    ),
	    array(
	      '$sort' => array("count"=> -1),
	    )
	  );

		return Response::json($g['result']);
		
	}

	/**
	 * Display a listing of geolocalized tweet 
	 *
	 * @return Response
	 */
	public function geo()
	{
		$c_tweets = App::make('collection_tweet');
		$cursor = $c_tweets->find(array(), array("coordinates"=>1))->sort(array("rbit_created_at" => -1))->limit(200);
  	$array = iterator_to_array($cursor);
  	return Response::json($array);
  
	}


}
<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Collection extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'collections';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('user_id','title', 'description', 'visability','active','image_order','deleted');

	public static function getCollectionsForUser($userID)
	{
		return Collection::where('user_id', '=', $userID)->where('deleted','=',0)->get();
	}

	public static function getCollection($userID,$collectionID)
	{
		return Collection::where('user_id', '=', $userID)->where('id','=',$collectionID)->first();
	}

	public static function getCollectionImages($userID,$collectionID)
	{
		$collection = Collection::getCollection($userID,$collectionID);
		$imageOrder = $collection->image_order;
		if($imageOrder == ''){
			$imageOrder = '1';
		}
		return Image::where('user_id', '=', $userID)->where('collection_id','=',$collectionID)->orderBy(DB::raw('FIELD(id,'.$imageOrder.')'))->get();
	}
	
}

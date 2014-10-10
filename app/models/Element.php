<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Element extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'elements';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('user_id','element_type_id','title', 'description','content', 'visability','active','deleted');

	public static function getPagesForUser($userID)
	{
		return Element::where('user_id', '=', $userID)->where('element_type_id','=',1)->where('deleted','=',0)->get();
	}

	public static function getPage($pageID)
	{
		return Element::where('user_id', '=', Auth::user()->id)->where('id','=',$pageID)->first();
	}

	public static function getSiteNavigation($userID)
	{
		return Element::where('user_id', '=', $userID)->where('element_type_id','=',1)->where('active','=',1)->where('deleted','=',0)->get();
	}

	public static function getCollectionImages($collectionID)
	{
		$collection = Collection::getCollection($collectionID);
		$imageOrder = $collection->image_order;
		if($imageOrder == ''){
			$imageOrder = '1';
		}
		return Image::where('user_id', '=', Auth::user()->id)->where('collection_id','=',$collectionID)->orderBy(DB::raw('FIELD(id,'.$imageOrder.')'))->get();
	}
	
}

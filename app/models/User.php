<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

class User extends Eloquent implements ConfideUserInterface {

	use ConfideUser;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function toArray()
  {
      $array = parent::toArray();
      $array['avatar_url'] = $this->avatar_url;
      return $array;
  }

	public function hasRole($role){
		return in_array(Auth::User()->roles, $role);
	}
	public function subscribed_categories(){
		return $this->belongsToMany('Category', 'users_subscribed_categories','user_id', 'category_id');
	}
	public function received_messages(){
		return $this->hasMany('Message', 'recipient_id');
	}

	public function sent_messages(){
		return $this->hasMany('Message','sender_id');
	}

	public function favourite_events()
	{
     	return $this->belongsToMany('Happening','users_favourite_events', 'user_id', 'event_id');
	}

	public function comments($value='')
	{
		return $this->hasMany('Comment');
	}
	public function events($page=1, $limit=1)
	{	
		$date = date('Y-m-d',(strtotime ( '-'+$this->number_of_days+' day' , strtotime ( '2015-06-11 09:00:00') ) ));
		$date2 = date('Y-m-d');
		$items = Happening::leftJoin('events_categories', 'events_categories.event_id', '=', 'events.id')
			  ->leftJoin('users_subscribed_categories', 'users_subscribed_categories.category_id', '=', 'events_categories.category_id')
			  ->leftJoin('categories','categories.id', '=', 'users_subscribed_categories.category_id')
			  ->where('users_subscribed_categories.user_id', $this->id);
			  // ->where('events.start_datetime', '>=', $date)
			  // ->where('events.start_datetime', '<=', $date2);

		return [
			'allItems' => $items->get()->toArray(),
			'items'=>$items->skip($limit * ($page - 1))->take($limit)->get()->toArray(),
			'itemTotal' =>$items->count(),
			'page' =>$page
		];
	}

	public function published_events(){
		return $this->hasMany('Happening');
	}

	public function getAvatarUrlAttribute(){
		return Gravatar::url($this->email);
	}

}

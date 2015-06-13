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

	public function hasRole($role){
		return in_array(Auth::User()->roles, $role);
	}
	public function subscribed_categories(){
		return $this->belongsToMany('Category', 'users_subscribed_categories', 'user_id', 'category_id');
	}
	public function events(){
		return $this->hasMany('Category');
	}

	public function received_messages(){
		return $this->hasMany('Message', 'recipient_id');
	}

	public function sent_messages(){
		return $this->hasMany('Message','sender_id');
	}

	public function favourite_events()
	{
     	return $this->belongsToMany('Event','users_favourite_events', 'event_id','user_id');
	}

	public function comments($value='')
	{
		return $this->hasMany('Comment');
	}
	public function disaster($value='')
	{
		Happening::leftJoin('events_categories', 'events_categories.event_id', '=', 'events.id')
			  ->leftJoin('users_subscribed_categories', 'users_subscribed_categories.category_id', '=', 'events_categories.category_id')
			  ->where('users_subscribed_categories.user_id', $this->id)->get();
	}

}

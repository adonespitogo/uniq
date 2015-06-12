<?php

class Category extends \Eloquent {
	protected $fillable = ['name','description','slug','restricted'];

  public function events(){
    return $this->belongsToMany('Event');
  }

  public function allowed_users(){
    return $this->belongsToMany('User', 'categories_users');
  }
}
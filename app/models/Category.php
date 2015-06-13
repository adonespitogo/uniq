<?php

class Category extends \Eloquent {
	protected $fillable = ['name','description','slug','restricted'];

  public function events(){
    return $this->belongsToMany('Event');
  }
}
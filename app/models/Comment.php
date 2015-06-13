<?php

class Comment extends \Eloquent {
	protected $table = 'comments';
	protected $fillable = ['event_id','content','user_id'];
  public function event(){
    return $this->belongsTo('Event');
  }
}
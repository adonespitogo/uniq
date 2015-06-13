<?php

class Comment extends \Eloquent {
	protected $table = 'comments';
	protected $fillable = ['event_id','content','user_id'];
  public function event(){
    return $this->belongsTo('Happening', 'event_id');
  }

  public function user(){
    return $this->belongsTo('User');
  }
}
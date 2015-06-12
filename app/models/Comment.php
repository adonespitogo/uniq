<?php

class Comment extends \Eloquent {
	protected $table = 'un_comments';
	protected $fillable = ['event_id','content','user_id'];
  public function event(){
    return $this->belongsTo()
  }

  public function user(){
    return $this->belongsTo('User');
  }
}
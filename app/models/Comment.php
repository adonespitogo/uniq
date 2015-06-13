<?php

class Comment extends \Eloquent {
	protected $table = 'comments';
	protected $fillable = ['event_id','content','user_id'];
  public function event(){
    return $this->belongsTo('Happening', 'event_id');
  }

  public function toArray(){
      $array = parent::toArray();

      $array['username'] = $this->username;

      return $array;
  }

  public function user(){
    return $this->belongsTo('User');
  }

  public function getUsernameAttribute(){
    return $this->user->username;
  }
}
<?php

class Message extends Eloquent  {
  protected $table = 'un_messages';
  protected $fillable=['sender_id','recipient_id','message','status'];

  public function reply_to(){
    return $this->hasOne('Message', 'reply_to_id');
  }

  public function replies(){
    return $this->hasMany('Message', 'reply_to_id');
  }
}

<?php

class Message extends Eloquent  {
  protected $table = 'un_messages';
  protected $fillable=['sender_id','recipient_id','message','status'];
}

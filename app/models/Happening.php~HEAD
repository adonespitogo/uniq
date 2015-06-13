<?php
use LaravelBook\Ardent\Ardent;
class Happening extends Ardent {
  protected $table = 'events';
	protected $fillable = ['title', 'description', 'slug', 'start_datetime', 'end_datetime', 'venue'];

  public function attachments()
  {
      return $this->morphTo("Attachment", "attachable");
  }

  public function categories(){
    return $this->belongsToMany('Category');
  }

  public function publisher(){
    return $this->belongsTo('User', 'user_id');
  }
}
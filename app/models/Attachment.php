<?php
use LaravelBook\Ardent\Ardent;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Attachment extends Ardent implements StaplerableInterface{
	protected $fillable = ['attachable_type', 'attachable_id'];

  public function __construct(array $attributes = array()) {
      $this->hasAttachedFile('file', [
          'styles' => [
              'medium' => '300x300',
              'thumb' => '100x100'
          ]
      ]);

      parent::__construct($attributes);
  }

  public function attachable()
  {
      return $this->morphTo();
  }
}
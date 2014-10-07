<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Entry extends \Eloquent {

  use SoftDeletingTrait;

  /**
   * Which fields may be mass assigned
   *
   * @var array
   */
  protected $fillable = [
    'owner_id',
    'title',
    'body',
    'favorite',
  ];

  public static $rules = [
    'title' => 'required'
  ];

  public function owner()
  {
    return $this->belongsTo('User');
  }

  public static function getPaginated(array $params)
  {
    $recordPerPage = 10;

    if($params['type'])
    {
      if($params['type'] == 'trashed')
      {
        return Entry::onlyTrashed()->paginate($recordPerPage);
      }

      return Entry::orderBy('updated_at', 'DESC')->paginate($recordPerPage);
    }

    return Entry::orderBy('updated_at', 'DESC')->paginate($recordPerPage);
  }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class todo_category extends Model
{
  protected $fillable = [
      'text',
  ];

  public function todo_lists()
  {
      return $this->belongsTo('App\Model\todo_category');
  }
}

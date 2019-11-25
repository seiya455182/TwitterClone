<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class todo_list extends Model
{

  protected $table = 'todo_list';

  protected $fillable = [
  
      'text',
  ];

  public function users()
  {
    return $this->belongsTo('App\Models\user');
  }


  public function todo_categorys()
  {
      return $this->hasMany('App\Models\todo_category');
  }


  // public function todoStore(Int $user_id, Array $data)
  // {
  //   $this->user_id = $user_id;
  //   $this->text = $data['text'];
  //   $this->save();
  //
  //   return;
  // }
}

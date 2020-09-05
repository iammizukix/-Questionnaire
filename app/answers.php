<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answers extends Model
{
protected $table = 'answers';

  protected $guarded = array('id');

  public $timestamps = true;

  protected $fillable = [
    'fullname', 'gender', 'age_id', 'email', 'is_send_email','feedback','updated_at','created_at',
  ];
}

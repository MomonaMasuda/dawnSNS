<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
  public $timestamps = false;
  protected $fillable = ['follow_id', 'follower_id'];
}

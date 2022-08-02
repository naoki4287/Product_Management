<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
  use HasFactory;

  protected $guarded = [
    'created_at',
    'deleted_at',
  ];

  public $timestamps = false;
}

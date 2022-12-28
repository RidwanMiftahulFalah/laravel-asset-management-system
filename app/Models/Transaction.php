<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
  use HasFactory;
  use HasUuids;

  public $timestamps = false;

  protected $guarded = ['id'];

  protected $with = ['user', 'item'];

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function item() {
    return $this->belongsTo(Item::class);
  }
}

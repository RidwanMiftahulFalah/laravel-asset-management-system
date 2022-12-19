<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model {
  use HasFactory;

  protected $guarded = ['id'];

  public function category() {
    return $this->belongsTo(Category::class);
  }

  public function workUnit() {
    return $this->belongsTo(WorkUnit::class);
  }

  public function transactions() {
    return $this->hasMany(Transaction::class);
  }
}

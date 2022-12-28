<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model {
  use HasFactory;
  use HasUuids;

  protected $guarded = ['id'];

  protected $with = ['category', 'workUnit'];

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

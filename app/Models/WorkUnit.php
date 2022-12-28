<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkUnit extends Model {
  use HasFactory;
  use HasUuids;

  protected $guarded = ['id'];

  public function items() {
    return $this->hasMany(Item::class);
  }
}

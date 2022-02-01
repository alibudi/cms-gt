<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = "tag";
    protected $guarded = [];
      public function article()
    {
        return $this->hasMany(Article::class);
    }
}

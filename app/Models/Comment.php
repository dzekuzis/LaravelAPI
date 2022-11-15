<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'text'];
    protected $hidden = ['created_at', 'updated_at'];

    public function blogpost() {
        return $this->belongsTo('App\Models\Blogpost');
    }
}

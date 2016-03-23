<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Videos extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'category_id', 'tag', 'file', 'title', 'description', 'created_at'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];
}

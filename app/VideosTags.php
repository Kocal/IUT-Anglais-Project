<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideosTags extends Model
{
    protected $fillable = [
        'video_id', 'tag_id',
    ];
}

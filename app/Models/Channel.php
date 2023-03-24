<?php

namespace App\Models;

use App\Models\Feed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Channel extends Model
{
    use HasFactory;
    protected $table = 'channels2';

            //  * Get the comments for the blog post.

    public function feeds()
    { 
        return $this->hasMany(Feed::class);
    }

}

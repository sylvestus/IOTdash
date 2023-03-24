<?php

namespace App\Models;

use App\Models\Channel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feed extends Model
{
    use HasFactory;
    protected $table = 'feeds2';

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

}

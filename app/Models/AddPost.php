<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AddPost extends Model
{
    use HasFactory;

    public function getCreatedAtMinutesAgoAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->diffInDays() . ' minutes ago';
    }

    public function user()
    {
        return $this->belongsTo(User::class,'author_id');
    }

    public function show_category()
    {
        return $this->belongsTo(Category::class, 'category'); // Assuming 'category' is the foreign key in the 'posts' table
    }

    public function show_tag()
    {
        return $this->belongsTo(Tag::class, 'tag'); // Assuming 'tag' is the foreign key in the 'posts' table
    }
}

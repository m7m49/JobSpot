<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employer;
use App\Models\Tag;

class Job extends Model
{
    use HasFactory;

    public function tag(string $name) 
    {
        $tag = Tag::firstOrCreate(['name' => $name]);

        $this->tags()->attach($tag);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags() 
    {
        return $this->belongsToMany(Tag::class);
    }
}


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'description', 'content', 'poster_image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function save(array $options = [])
    {
        $this->slug = \slug($this->title);
        parent::save($options);
    }
}

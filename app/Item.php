<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['code', 'name', 'url', 'image_url'];
    
    //ある一つのitemに関係する多数のuserを取るよ
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('type')->withTimestamps();
    }
    //ある一つのitemに関係する多数のuserの中で”type”が”want”のものを取るよ
    public function want_users()
    {
        return $this->users()->where('type', 'want');
    }
    //ある一つのitemに関係する多数のuserの中で”type”が”have”のものを取るよ
    public function have_users()
    {
        return $this->users()->where('type', 'have');
    }
}
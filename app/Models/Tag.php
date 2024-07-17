<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function job()
    {
        return $this->belongsToMany(Job::class, table: "job_tags", foreignPivotKey: "tag_id", relatedPivotKey: "job_listings_id");
    }

    public function post()
    {
        return $this->belongsToMany(Post::class, table: "post_tags", foreignPivotKey: "tag_id", relatedPivotKey: "post_id");
    }
}

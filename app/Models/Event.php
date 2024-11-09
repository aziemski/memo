<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'description',
        'image_url',
        'created_by',
        'updated_by',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}

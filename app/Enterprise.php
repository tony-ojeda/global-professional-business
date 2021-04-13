<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Enterprise extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'address_object' => 'array',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

      
    public function images()
    {
        return $this->hasMany(EnterpriseImage::class);
    }
}

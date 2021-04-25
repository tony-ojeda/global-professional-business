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

    public function memberships()
    {
        return $this->hasMany(EnterpriseMembership::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeCurrentPayment($query)
    {
        return $query->whereHas('memberships', static function ($query) {
            $query->where('due_date', '>=', date('Y-m-d'));
        });
    }
}

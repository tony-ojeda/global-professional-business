<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enterprise extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
		'address_object' => 'array',
      ];
      
    public function images()
    {
        return $this->hasMany(EnterpriseImage::class);
    }
}

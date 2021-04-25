<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnterpriseMembership extends Model
{
    protected $table = 'enterprise_membership';
    
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'paypal_data' => 'array',
    ];

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
}

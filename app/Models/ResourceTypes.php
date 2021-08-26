<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceTypes extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'resource_types';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime'
    ];

    public function marketData()
    {
        return $this->hasMany(MarketData::class);
    }
}

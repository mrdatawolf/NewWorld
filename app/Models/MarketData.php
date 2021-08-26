<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketData extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'market_data';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'locations_id',
        'types_id',
        'resources_id',
        'value',
        'amount'
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

    public function locations() {
        return $this->belongsTo(Locations::class);
    }

    public function types() {
        return $this->belongsTo(ResourceTypes::class);
    }

    public function baseResources() {
        return $this->belongsTo(BaseResources::class, 'resources_id', 'id');
    }

    public function ores() {
        return $this->belongsTo(Ores::class, 'resources_id', 'id');
    }

    public function ingots() {
        return $this->belongsTo(Ingots::class, 'resources_id', 'id');
    }

    public function items() {
        return $this->belongsTo(Items::class, 'resources_id', 'id');
    }
}

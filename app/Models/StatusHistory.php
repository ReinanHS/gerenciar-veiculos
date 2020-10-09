<?php

namespace App\Models;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;

class StatusHistory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vehicle_id', 'to', 'from',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}

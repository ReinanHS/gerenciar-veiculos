<?php

namespace App\Models;

use App\Models\StatusHistory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'placa', 'modelo', 'marca', 'status', 'chassi',
    ];

    public function statusHistory(){
        return $this->hasMany(StatusHistory::class);
    }

    public function getRouteKeyName()
    {
        return 'placa';
    }
}

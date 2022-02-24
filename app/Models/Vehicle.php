<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'model',
        'price',
        'company_id'
    ];


    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }


    public function vehicleImages()
    {
        return $this->hasMany(VehicleImage::class, 'vehicle_id', 'id');
    }
}

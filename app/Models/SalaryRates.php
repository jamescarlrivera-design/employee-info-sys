<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryRates extends Model
{
    /** @use HasFactory<\Database\Factories\SalaryRatesFactory> */
    use HasFactory;
      protected $fillable = [
        'rate_name',
        'amount',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}

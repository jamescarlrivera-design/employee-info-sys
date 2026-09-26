<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentStatus extends Model
{
    /** @use HasFactory<\Database\Factories\EmploymentStatusFactory> */
    use HasFactory;
    protected $fillable = [ 'employment_status',];

    public function employees(){
        return $this->hasMany(Employee::class);
    }

}
 
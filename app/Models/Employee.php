<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['employee_number',
    'first_name',
    'middle_name',
    'last_name',
    'email',
    'phone',
    'address',
    'department_id',
    'email',
    'position_id',
    'employment_status_id',
    'salary_rate_id',
    'date_hired',
    ];


     public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
    return $this->belongsTo(User::class);
    }

    public function employmentStatus(){
        return $this->belongsTo(EmploymentStatus::class, 'employment_status_id');
    }

    public function position(){
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function salaryrates(){
        return $this->belongsTo(SalaryRates::class, 'salary_rate_id' );
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAttandance extends Model
{
    use HasFactory;
    protected $fillable = ['out_date','out_time', 'hours', 'status', 'updated_at'];
}

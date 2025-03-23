<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'dob', 'college_id'];

    // A student belongs to a college
    public function college()
    {
        return $this->belongsTo(College::class);
    }
}

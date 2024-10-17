<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'students';

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'student_name',
        'teacher_id',
        'admission_date',
        'yearly_fees',
        'contact_no',
        'email',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}


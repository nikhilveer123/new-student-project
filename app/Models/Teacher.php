<?php

namespace App\Models;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';

    protected $fillable = ['teacher_name', 'address', 'contact_no', 'email'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}

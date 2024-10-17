<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $studentNames = [
            'Aarav Jadhav', 'Ananya Gaikwad', 'Rohan Ghosh', 'Priya Thakur',
            'Tanvi Kulkarni', 'Shreyas Waghmare', 'Ishaan Gite',
            'Kriti Suryawanshi', 'Yash Desai', 'Diya Shinde'
        ];

        foreach ($studentNames as $index => $name) {
            Student::create([
                'teacher_id' => rand(1, 10), // Randomly assign a teacher
                'student_name' => $name,
                'admission_date' => now()->subYears(rand(1, 5)),
                'yearly_fees' => rand(4000, 6000),
                'contact_no' => '98765432' . rand(0, 9),
                'email' => strtolower(str_replace(' ', '_', $name)) . '@example.com',
            ]);
        }
    }
}




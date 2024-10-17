<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        $teacherNames = [
            'Aditi Patil', 'Nikhil Deshmukh', 'Snehal Shinde', 'Pratik Joshi',
            'Neha Khandekar', 'Sameer Pawar', 'Kavita More', 'Rahul Bhosale',
            'Vidya Chavan', 'Sandeep Gawande'
        ];

        $addresses = [
            '123 A Wing, Mumbai',
            '456 B Wing, Pune',
            '789 C Wing, Nashik',
            '321 D Wing, Nagpur',
            '654 E Wing, Thane',
            '987 F Wing, Aurangabad',
            '135 G Wing, Kolhapur',
            '246 H Wing, Solapur',
            '369 I Wing, Sangli',
            '852 J Wing, Jalna'
        ];

        foreach ($teacherNames as $index => $name) {
            Teacher::create([
                'teacher_name' => $name,
                'address' => $addresses[$index],
                'contact_no' => '12345678' . rand(0, 9),
                'email' => strtolower(str_replace(' ', '_', $name)) . '@example.com',
            ]);
        }
    }
}





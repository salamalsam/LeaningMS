<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = DB::table('roles')->where('name', 'Admin')->first();
        $teacher = DB::table('roles')->where('name', 'Teacher')->first();
        $student = DB::table('roles')->where('name', 'Student')->first();
        
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin_123!'),
            'role_id' => $admin->id,
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Teacher User',
            'email' => 'teacher@example.com',
            'password' => Hash::make('teacher_123!'),
            'role_id' => $teacher->id,
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Student User',
            'email' => 'student@example.com',
            'password' => Hash::make('student_123!'),
            'role_id' => $student->id,
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

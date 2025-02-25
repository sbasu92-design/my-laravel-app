<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 1, // 1 for admin role
            'is_active' => 1, // 1 for active, 0 for inactive
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Log::info('Admin created with ID: ' . $admin->id);

        Storage::disk('public')->makeDirectory('profile_images');

        // Path to the default profile image (place a default image in storage/app/public/)
        $defaultImagePath = storage_path('app/public/uploads/default.png');

        // Check if the default image exists before adding media
        if (file_exists($defaultImagePath)) {
            $admin->addMedia($defaultImagePath)
            ->toMediaCollection('profile_images');
            
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Admin extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia; // Ensure InteractsWithMedia is included

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', 
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Register media collections for Spatie Media Library.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile_images')->singleFile();
    }

    public function getProfileImageUrl()
    {
       // $media = $this->getFirstMedia('profile_images'); // Get the first media from collection
        //return $media ? $media->getUrl() : asset('default.png'); // Use default image if no media found
        //return $this->getFirstMediaUrl('profile_images') ?: asset('storage/profile_images/default.png');

        $media = $this->getFirstMedia('profile_images');

        // If media exists, return correct public path
        return $media ? asset('storage/app/public/profile_images/' . $media->id . '/' . $media->file_name) 
                      : asset('storage/papp/public/profile_images/1/default.png'); // Default image
    }

    static public function getAdmin()
    {
         return self::select('admins.*')
                      ->where('role','=','2')
                      ->where('is_active','=','1')
                      ->orderBy('id','desc')
                      ->get();
    }
}

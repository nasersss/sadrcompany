<?php

namespace App\Models;

use App\Http\Controllers\BiddingController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Action;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Policies()
    {
        return $this->hasMany(Product::class, 'user_id');
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id');
    }
    public function notificationFrom()
    {
        return $this->hasMany(   Notification::class, 'from_user_id');
    }

    public function notificationTo()
    {
        return $this->hasMany(Notification::class, 'to_user_id');
    }

    public function like()
    {
        return $this->hasMany(PostLike::class,'user_id');
    }

    public function trainer()
    {
        return $this->hasOne(TrainerInfo::class, 'trainer_id');
    }

    public function course(){

        return $this->hasMany(StudentCourse::class,'student_id');
    }
    public function exercise(){

        return $this->hasMany(ExerciseDone::class,'student_id');
    }

    public function inquiry()
    {
        return $this->hasMany(Inquiry::class,'student_id');
    }

    public function reply()
    {
        return $this->hasMany(Reply::class,'replier_id');
    }
    public function work()
    {
        return $this->hasMany(StudentWork::class,'student_id');
    }
    /**
     * Check if the user is authenticate and has admin role
     *
     * @return boolean
     *
     */
    public function isAdmin()
    {
        if (!Auth::check()) {
            return false;
        }
        $user = User::find(Auth::user()->id);
        if ($user->role == 1 || $user->role == 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if the user is authenticate and has super admin role
     *
     * @return boolean
     *
     */
    public function isSuperAdmin()
    {
        if (!Auth::check()) {
            return false;
        }
        $user = User::find(Auth::user()->id);
        if ($user->role == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function evaluation()
    {
        return $this->hasMany(Evaluation::class,'student_id');
    }

    #scope
    public function scopeTrain($query)
    {
        return $query->where('role',1);
    }
     public function scopeStudent($query)
    {
        return $query->where('role',2);
    }
}

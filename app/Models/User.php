<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relation to Position
     *
     * @return HasOne
     */
    public function position() : HasOne
    {
        return $this->hasOne(Position::class, 'id', 'id');
    }

    /**
     * Relation to Department
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'users_departments', 'employee_id');
    }

    /**
     * Relation to Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function task()
    {
        return $this->belongsToMany(Department::class, 'users_tasks', 'employee_id');
    }

    /**
     * Relation to Days_info
     *
     * @return HasMany
     */
    public function days_info()
    {
        return $this->hasMany(Days_info::class);
    }
}

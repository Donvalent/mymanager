<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Employee extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'gender',
        'phone',
        'position',
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
     * @return BelongsToMany
     */
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'users_departments', 'employee_id');
    }

    /**
     * Relation to Task
     *
     * @return BelongsToMany
     */
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'users_tasks');
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

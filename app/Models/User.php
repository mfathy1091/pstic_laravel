<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        //'roles_name',
        //'status',
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
        //'roles_name' => 'array',
    ];



    // if we use elequent to seed users, it will hash in seeder, then here, so the password will be wrong
/*      public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    } 
 */

    public function psWorker(){
        return $this->hasOne(PsWorker::class);
    }

    public function groups()
    {
        return $this->belongsToMany('App\Models\Group');
    }


    public function hasGroup(string $group)
    {
        return null !== $this->groups()->where('name', $group)->first();
    }


    public function hasAnyGroups(array $groups)
    {
        return null !== $this->groups()->whereIn('name', $groups)->first();
    }

}
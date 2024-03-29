<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Idea;

class User extends Authenticatable
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

  
    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public function votes()
    {
        return $this->morphToMany(Idea::class,'votable');
    }

    public  function getAvatar()
    {
        $firstCharacter = $this->name[0];
        $integerToUse = is_numeric($firstCharacter)
        ? ord( strtolower( $firstCharacter)) - 21  
        : ord(strtolower($firstCharacter)) - 96;
    // $emailHash = md5($this->email);
    // $avatarDefaults = ['mp', 'identicon', 'monsterid', 'retro', 'robohash'];
    // $randomInteger = rand(0, count($avatarDefaults) - 1);
    
    return 'https://www.gravatar.com/avatar/'
            .md5($this-> email)
            .'?s=200'
            .'&d=http://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-'
            .$integerToUse
            .'.png';


    }

    public function isAdmin()
    {
        return in_array($this->email,[
            'habib@gmail.com',
            'macie58@example.com'
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const STAMINA_RATE = 6;

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

    public static function add($fields, $ip)
    {
        $user = new static($fields);
        $user->last_ip = $user->reg_ip = $ip;
        $user->generatePassword($fields['password']);
        $user->save();

        return $user;
    }

    public function generatePassword($password)
    {
        $this->password = bcrypt($password);
    }

    public function recalculateMaxHp(&$user)
    {
        $potentialMaxHp = $user->stamina * self::STAMINA_RATE;

        if ($potentialMaxHp != $user->maxhp) {
            $user->maxhp = $potentialMaxHp;

            static::where('id', $user->id)->update([
                'maxhp' => $user->maxhp
            ]);
        }
    }

    public function restoreHp(&$user)
    {
        if ((boolean)$user->fight) return;

        $time   = time();
        $restore = false;

        if ($user->curhp < 0) {
            $user->curhp = 0;
            $restore = true;
        } elseif ($user->last_restore < $time && $user->curhp < $user->maxhp) {
            $restoreSpeed = 1;
            $minutesToMaxHp = 5;
            $restoreOneSecond = $user->maxhp / ($minutesToMaxHp / $restoreSpeed) / 60;
            $user->curhp = $user->curhp + ($time - $user->last_restore) * $restoreOneSecond;
            $restore = true;
        }

        if ($user->curhp > $user->maxhp) {
            $user->curhp = $user->maxhp;
            $restore = true;
        }

        if ($restore) {
            $user->last_restore = $time;
            static::where('id', $user->id)->update([
                'curhp'         => $user->curhp,
                'last_restore'  => $time
            ]);
        }
    }

    public function getUser()
    {
        $user = (object)Auth::user()->only(['id', 'login', 'level', 'stamina', 'location', 'curhp', 'maxhp', 'last_restore', 'fight']);
        $this->recalculateMaxHp($user);
        $this->restoreHp($user);

        return $user;
    }
}

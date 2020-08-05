<?php

namespace App\Policies;

class GatePolicy
{
    protected static $AUTHORITIES = [
        'user'  => 1,
        'chief' => 127,
        'admin' => 255,
    ];

    protected static $USER  = 1;
    protected static $CHIEF = 127;
    protected static $ADMIN = 255;

    public static function getAuthorities()
    {
        return array_keys(array_diff_key(
            static::$AUTHORITIES,
            ['admin' => 255]
        ));
    }

    public function userHigher($user)
    {
        return static::$USER <= $this->getAuthorityValue($user->role);
    }

    public function chiefHigher($user)
    {
        return static::$CHIEF <= $this->getAuthorityValue($user->role);
    }

    public function adminOnly($user)
    {
        return static::$ADMIN <= $this->getAuthorityValue($user->role);
    }

    protected function getAuthorityValue($role)
    {
        return static::$AUTHORITIES[$role] ?? 0;
    }
}

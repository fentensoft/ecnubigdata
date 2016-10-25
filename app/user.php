<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class user extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
}

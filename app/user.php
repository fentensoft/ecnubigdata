<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class user extends Model implements Authenticatable
{
    use HasApiTokens;
    use \Illuminate\Auth\Authenticatable;
}

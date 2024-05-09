<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Notifications\VerifyEmail;

class Employer extends Model
{
    use HasFactory;

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }



    protected $guarded = [];
}

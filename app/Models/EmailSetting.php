<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'mailDriver',
        'mailHost',
        'mailPort',
        'mailUsername',
        'mailPassword',
        'mailEncryption',
        'mailFromEmail',
        'mailFromName',
    ];
}

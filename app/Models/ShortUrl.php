<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ShortUrl
 * @package App\Models
 * @property int id
 * @property int user_id
 * @property string url
 * @property string code
 *
 */
class ShortUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'link'
    ];
}

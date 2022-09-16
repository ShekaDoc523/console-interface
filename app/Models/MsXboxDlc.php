<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsXboxDlc extends Model
{
    use HasFactory;

    public $table = 'ms_xbox_dlc';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'game_id',
        'product_name',
        'addon_name',
        'price',
        'source',
        'platform',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

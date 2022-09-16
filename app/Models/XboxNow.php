<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XboxNow extends Model
{
    use HasFactory;

    public $table = 'xbox_now';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'game_id',
        'title',
        'url',
        'is_game',
        'release_date',
        'on_sale',
        'discount_percent',
        'end_sale',
        'region_1',
        'price_region_1',
        'region_2',
        'price_region_2',
        'region_3',
        'price_region_3',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

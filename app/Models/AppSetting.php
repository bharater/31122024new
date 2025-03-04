<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory;

    protected $table = 'app_settings';

    protected $fillable = [
        'mission_title',
        'mission_description',
        'mission_image',
        'vision_title',
        'vision_description',
        'vision_image',
        'values_title',
        'values_description',
        'values_image',
        'project_6_title',
        'project_6_description',
        'project_6_image',
        'project_7_title',
        'project_7_description',
        'project_7_image',
        'project_8_title',
        'project_8_description',
        'project_8_image'
    ];
}   
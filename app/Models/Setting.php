<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Setting extends Model
{
    protected $fillable = [
        'website_name', 'website_url', 'page_title', 'meta_keyword',
        'meta_description', 'address', 'phone1', 'phone2', 'email1',
        'email2', 'facebook', 'instagram', 'youtube', 'twitter', 'logo', 'theme_color',
        'header_bg_color', 'footer_bg_color', 'link_color', 'font_color'
    ];
}

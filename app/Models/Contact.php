<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact 
{
    public static $contact = [
        'title' => 'Kontak Kami',
        'email'    => 'support@kostanku.com',
        'telepon' => '+62 812-3456-7890',
        'instagram' => '@kostanku',
        'whatsapp' => '+62 812-3456-7890'
    ];

    public static function all() {
        return self::$contact;
    }
}

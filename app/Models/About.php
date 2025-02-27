<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About 
{
    public static $about = [
        'title' => "Tentang Kami",
        'body' => "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni sit natus id itaque expedita, dolores velit minima, modi nobis veritatis tempora, rem officiis aspernatur unde mollitia illo illum iusto voluptas error. Esse quaerat explicabo suscipit reprehenderit sint similique labore dolorum!</p>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis ut quisquam quos consequatur veritatis? Excepturi blanditiis sunt inventore quibusdam, quasi ratione possimus, sint nobis cumque doloribus aspernatur modi consequuntur in maiores distinctio voluptate, tenetur optio quisquam iusto voluptates odio eos praesentium. Dolor excepturi labore officiis possimus soluta aut sint?</p>
<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis cumque cum, facilis placeat vero at, doloribus, esse aliquam dignissimos reiciendis eaque quaerat animi enim. Voluptatum et soluta officia harum quidem porro reiciendis illum atque assumenda sint, repellendus ex consectetur placeat molestias quaerat similique aspernatur cum dolore dolores cumque vel impedit blanditiis, quis laboriosam! Ipsam consequuntur odit, repudiandae quam omnis aspernatur. Qui cupiditate incidunt animi neque vero quidem maiores aspernatur deserunt consequuntur sed pariatur quam veritatis non quisquam fugiat iure, odio porro mollitia sint amet quia sequi temporibus! Laboriosam, quo similique!</p>
"
    ];
    public static function all() {
        return self::$about;
    }
}

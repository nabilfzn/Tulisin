<?php

namespace App\Models;
use Illuminate\Support\Arr;

class Post {
    public static function all() {
        return [
            [
                'id' => 1,
                'judul' => 'Judul artikel 1',
                'penulis' => 'Ahmad Nabil',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt reprehenderit exercitationem et nostrum ea! Unde voluptatum natus fugit blanditiis, provident, rerum optio, quibusdam laborum pariatur nostrum ea cumque quis. Animi?'
            ],

            [
                'id' => 2,
                'judul' => 'Judul artikel 2',
                'penulis' => 'Fauzan Abdillah',
                'content' => 'ipsum ipsum dolor sit amet, consectetur adipisicing elit. Deserunt reprehenderit exercitationem et nostrum ea! Unde voluptatum natus fugit blanditiis, provident, rerum optio, quibusdam laborum pariatur nostrum ea cumque quis. Animi?'
            ],
        ];
    }

    public static function find($id): array {
        
        // return Arr::first(static::all(), function ($post) use ($id) {
        //     return $post['id'] == $id;
        // }); 

        $post = Arr::first(static::all(), fn ($post) => $post['id'] == $id);
        
        if (! $post) {
            abort(404);
        }

        return $post;  

    }
}
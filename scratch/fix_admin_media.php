<?php

use App\Models\Post;

// Load Laravel
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$adminPosts = Post::where('post_type', 'admin')->get();

foreach ($adminPosts as $post) {
    if ($post->media && !is_array($post->media)) {
        echo "Fixing post ID: {$post->id} (String media)\n";
        $post->media = ['uploads/post/' . $post->media];
        $post->save();
    } elseif (is_array($post->media) && count($post->media) > 0) {
        if (strpos($post->media[0], 'uploads/post/') === false) {
            echo "Fixing post ID: {$post->id} (Array media without path)\n";
            $media = $post->media;
            $media[0] = 'uploads/post/' . $media[0];
            $post->media = $media;
            $post->save();
        }
    }
}

echo "Done.\n";

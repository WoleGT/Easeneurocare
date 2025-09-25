<?php

if (! function_exists('postImageUrl')) {
    function postImageUrl($path)
    {
        // If no image, return default placeholder
        if (!$path) {
            return asset('images/default.png'); // put a placeholder inside /public/images
        }

         $fullPath = public_path('storage/blog_images/' . $path);

         // If file doesn’t exist (maybe deleted manually), fallback too
        if (!file_exists($fullPath)) {
            return asset('images/default.png');
        }

        // Always point to public/storage/blog_images
        return asset('storage/blog_images/' . basename($path));

          
    }
}

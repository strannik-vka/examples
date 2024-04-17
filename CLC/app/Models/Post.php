<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name',
        'published', 'created_at', 'user_id', 'editor_user_id'
    ];

    protected $casts = [
        'content' => 'array',
    ];

    public static $thumbs = [
        [640]
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function editorUser()
    {
        return $this->belongsTo(User::class, 'editor_user_id');
    }

    public function nextUrl()
    {
        $nextPost = self::where('id', '>', $this->id)->orderBy('id', 'desc')->first();

        return $nextPost ? Route('post.show', $nextPost->id) : null;
    }

    public function shortText()
    {
        $result = '';

        if ($this->content) {
            if (is_array($this->content)) {
                foreach ($this->content as $content) {
                    $key = array_key_first($content);

                    if (strpos($key, 'text') !== false) {
                        $result = strip_tags($content[$key]);
                        break;
                    }
                }
            }
        }

        return Str::limit($result, 200, '');
    }
}

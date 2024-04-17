<?php

namespace App\Models;

use App\Helpers\RutubeHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name', 'description', 'videoSrc',
        'published', 'created_at', 'user_id', 'editor_user_id'
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
        return Str::limit($this->description, 200, '');
    }

    public function getIframeSrcAttribute()
    {
        return 'https://rutube.ru/play/embed/' . RutubeHelper::getId($this->videoSrc) . '?p=' . RutubeHelper::getP($this->videoSrc);
    }
}

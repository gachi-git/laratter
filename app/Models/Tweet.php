<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    /** @use HasFactory<\Database\Factories\TweetFactory> */
    use HasFactory;

    // fillableはモデルに対して一括代入を許可する属性のリストを指定するためのプロパティです。
    // これにより、セキュリティリスクを軽減し、意図しない属性の変更を防ぐことができます。
    protected $fillable = ['tweet'];

    //一対多で自分が「多」の側なのでbelongsToを使う
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function liked()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    //1対多の関係
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }
}

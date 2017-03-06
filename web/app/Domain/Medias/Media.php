<?php

namespace App\Domain\Medias;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    const IMAGE = 'image';

    //protected $table = 'medias';

    protected $fillable = [
        'file',
        'extension',
        'filename',
        'path',
        'size',
        'type'
    ];
}

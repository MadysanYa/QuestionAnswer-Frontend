<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use \Encore\Admin\Traits\Resizable;
}

// To access thumbnail
$photo->files('photos','photo');
$photos->files('photo','Front photo');
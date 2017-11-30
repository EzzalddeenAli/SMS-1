<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $full_path
 */
class Image extends Model
{
    public $timestamps = false;

    protected $fillable = ['path', 'ext', 'type', 'title', 'description', 'position'];

    public function getFullPathAttribute() {
        return $this->path.'.'.$this->ext;
    }
}

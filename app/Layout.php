<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $full_path
 */
class Layout extends Model
{
    public $timestamps = false;

    public function getFullPathAttribute() {
        return $this->path.'.'.$this->ext;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Paste extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    public function newUniqueId()
    {
        $uuid = Str::random("8");

        while (Paste::where("id", $uuid)->exists()) {
            $uuid = Str::random("8");
        }

        return $uuid;
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return Paste::findOrFail($value);
    }
}

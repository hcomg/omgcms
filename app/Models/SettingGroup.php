<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SettingGroup
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $sort_order
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Setting[] $settings
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SettingGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SettingGroup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SettingGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SettingGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SettingGroup whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SettingGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SettingGroup extends Model
{
    public function settings() {
        return $this->hasMany(Setting::class, 'group_id', 'id');
    }
}

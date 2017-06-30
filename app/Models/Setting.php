<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property int $group_id
 * @property string $setting_key
 * @property string $setting_value
 * @property string $setting_type
 * @property string|null $setting_options
 * @property int $sort_order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereSettingKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereSettingOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereSettingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereSettingValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereSortOrder($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{
    public $timestamps = false;
}

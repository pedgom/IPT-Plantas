<?php

namespace App\Models;

use App\Models\Traits\DropzoneFilesArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class Demo
 * @package App\Models
 * @version March 22, 2022, 11:35 am WET
 *
 * @property \App\Models\User $user
 * @property \App\Models\Demo $demo
 * @property integer $demo_id
 * @property integer $user_id
 * @property string $name
 * @property string $body
 * @property string $optional
 * @property string $body_optional
 * @property number $value
 * @property string $date
 * @property string|\Carbon\Carbon $datetime
 * @property boolean $checkbox
 * @property boolean $privacy_policy
 * @property integer $status 1 - Active | 2 - Disable | 3 - Draft
 */
class Demo extends Model implements Auditable, HasMedia
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;
    use DropzoneFilesArray;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'demos';

    const STATUS_ACTIVE = 1;
    const STATUS_DISABLE = 2;
    const STATUS_DRAFT = 3;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'demo_id',
        'user_id',
        'name',
        'body',
        'optional',
        'body_optional',
        'value',
        'date',
        'datetime',
        'checkbox',
        'privacy_policy',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'demo_id' => 'integer',
        'user_id' => 'integer',
        'name' => 'string',
        'body' => 'string',
        'optional' => 'string',
        'body_optional' => 'string',
        'value' => 'decimal:2',
        'date' => 'date',
        'datetime' => 'datetime',
        'checkbox' => 'boolean',
        'privacy_policy' => 'boolean',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'demo_id' => 'nullable',
            'user_id' => 'nullable',
            'name' => 'required|string|max:255',
            'body' => 'required|string',
            'optional' => 'nullable|string|max:255',
            'body_optional' => 'nullable|string',
            'value' => 'nullable|numeric',
            'date' => 'nullable',
            'datetime' => 'nullable',
            'checkbox' => 'required|boolean',
            'privacy_policy' => 'accepted',
            'status' => 'required',
            'created_at' => 'nullable',
            'updated_at' => 'nullable'
        ];
    }

    /**
     * Attribute labels
     *
     * @return array
     */
    public static function attributeLabels()
    {
        return [
            'id' => __('Id'),
            'demo_id' => __('Demo'),
            'user_id' => __('User'),
            'name' => __('Name'),
            'body' => __('Body'),
            'optional' => __('Optional'),
            'body_optional' => __('Body Optional'),
            'value' => __('Value'),
            'date' => __('Date'),
            'datetime' => __('Datetime'),
            'checkbox' => __('Checkbox'),
            'privacy_policy' => __('Privacy Policy'),
            'status' => __('Status'),
            'created_at' => __('Created At'),
            'updated_at' => __('Updated At'),
            'cover' => __('Cover'),
            'files' => __('Files'),
            'template' => __('Template'),
        ];
    }

    /**
     * Return the attribute label
     * @param string $attribute
     * @return string
     */
    public function getAttributeLabel($attribute){
        $attributeLabels = static::attributeLabels();
        return isset($attributeLabels[$attribute]) ? $attributeLabels[$attribute] : __($attribute);
    }

    /**
     * Return an array with the values of status field
     * @return array
     */
    public static function getStatusArray()
    {
        return [
            self::STATUS_ACTIVE =>  __('Active'),
            self::STATUS_DISABLE =>  __('Disable'),
            self::STATUS_DRAFT =>  __('Draft'),
        ];
    }

    /**
     * Return an array with the values of status field
     * @return array
     */
    public function getStatusOptions()
    {
        return static::getStatusArray();
    }

    /**
     * Return the status label
     * @return mixed|string
     */
    public function getStatusLabelAttribute()
    {
        $array = self::getStatusOptions();
        return $array[$this->status] ?? "";
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function demo()
    {
        return $this->belongsTo(\App\Models\Demo::class, 'demo_id');
    }

    /**
     * Register the media collection for this model
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('files');
        $this->addMediaCollection('template')->singleFile();
        $this->addMediaCollection('cover')
            ->useFallbackUrl('/demo1/media/avatars/blank.png')
            ->useFallbackPath(public_path('/demo1/media/avatars/blank.png'))
            ->singleFile();

    }
}

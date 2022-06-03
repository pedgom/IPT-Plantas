<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class AlturaAtributoPlanta
 * @package App\Models
 * @version May 31, 2022, 6:45 pm WEST
 *
 * @property \App\Models\AlturaAtributo $alturaAtributo
 * @property \App\Models\Planta $planta
 * @property \Illuminate\Database\Eloquent\Collection $planta1s
 * @property integer $planta_id
 * @property integer $altura_atributo_id
 */
class AlturaAtributoPlanta extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'altura_atributo_planta';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'planta_id',
        'altura_atributo_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'planta_id' => 'integer',
        'altura_atributo_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'planta_id' => 'required',
        'altura_atributo_id' => 'required',
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
        'planta_id' => __('Planta Id'),
        'altura_atributo_id' => __('Altura Atributo Id'),
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At')
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function alturaAtributo()
    {
        return $this->belongsTo(\App\Models\AlturaAtributo::class, 'altura_atributo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function planta()
    {
        return $this->belongsTo(\App\Models\Planta::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function planta1s()
    {
        return $this->hasMany(\App\Models\Planta::class, 'altura_atributo_planta_id');
    }
}

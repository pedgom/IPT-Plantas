<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class DensidadeAtributoPlanta
 * @package App\Models
 * @version June 10, 2022, 4:42 pm WEST
 *
 * @property \App\Models\Planta $planta
 * @property integer $densidade_atributo_id
 * @property integer $planta_id
 */
class DensidadeAtributoPlanta extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'densidade_atributo_plantas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'densidade_atributo_id',
        'planta_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'densidade_atributo_id' => 'integer',
        'planta_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'densidade_atributo_id' => 'required',
        'planta_id' => 'required',
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
        'densidade_atributo_id' => __('Densidade Atributo Id'),
        'planta_id' => __('Planta Id'),
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
    public function planta()
    {
        return $this->belongsTo(\App\Models\Planta::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function densidadeAtributo()
    {
        return $this->belongsTo(\App\Models\DensidadeAtributo::class, 'densidade_atributo_id');
    }


    public function planta5s()
    {
        return $this->hasMany(\App\Models\Planta::class, 'densidade_atributo_planta_id');
    }
}

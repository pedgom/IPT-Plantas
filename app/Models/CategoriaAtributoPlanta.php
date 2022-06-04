<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class CategoriaAtributoPlanta
 * @package App\Models
 * @version June 4, 2022, 10:14 pm WEST
 *
 * @property \App\Models\CategoriaAtributo $categoriaAtributo
 * @property \App\Models\Planta $planta
 * @property \Illuminate\Database\Eloquent\Collection $planta2s
 * @property integer $planta_id
 * @property integer $categoria_atributo_id

 */
class CategoriaAtributoPlanta extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'categoria_atributo_plantas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'planta_id',
        'categoria_atributo_id'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'planta_id' => 'integer',
        'categoria_atributo_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'planta_atributo_id' => 'required',
        'categoria_atributo_id' => 'required',
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
        'categoria_atributo_id' => __('Categoria Atributo Id'),
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
    public function categoriaAtributo()
    {
        return $this->belongsTo(\App\Models\CategoriaAtributo::class, 'categoria_atributo_id');
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
    public function planta2s()
    {
        return $this->hasMany(\App\Models\Planta::class, 'categoria_atributo_planta_id');
    }
}

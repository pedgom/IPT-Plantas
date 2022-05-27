<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Planta
 * @package App\Models
 * @version May 27, 2022, 7:09 pm WEST
 *
 * @property \App\Models\AlturaAtributoPlanta $alturaAtributoPlanta
 * @property \Illuminate\Database\Eloquent\Collection $alturaAtributoPlanta1s
 * @property \Illuminate\Database\Eloquent\Collection $categoriaAtributoPlantas
 * @property string $abreviatura
 * @property string $nome_botanico
 * @property string $nome_comum
 * @property string $tempo_crescimento
 * @property string $notas
 * @property string $curiosidades
 * @property integer $altura_atributo_planta_id
 */
class Planta extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'plantas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'abreviatura',
        'nome_botanico',
        'nome_comum',
        'tempo_crescimento',
        'notas',
        'curiosidades',
        'altura_atributo_planta_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'abreviatura' => 'string',
        'nome_botanico' => 'string',
        'nome_comum' => 'string',
        'tempo_crescimento' => 'string',
        'notas' => 'string',
        'curiosidades' => 'string',
        'altura_atributo_planta_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'abreviatura' => 'required|string|max:255',
        'nome_botanico' => 'required|string|max:255',
        'nome_comum' => 'required|string|max:255',
        'tempo_crescimento' => 'required|string|max:255',
        'notas' => 'required|string|max:255',
        'curiosidades' => 'required|string|max:255',
        'altura_atributo_planta_id' => 'nullable'
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
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At'),
        'deleted_at' => __('Deleted At'),
        'abreviatura' => __('Abreviatura'),
        'nome_botanico' => __('Nome Botanico'),
        'nome_comum' => __('Nome Comum'),
        'tempo_crescimento' => __('Tempo Crescimento'),
        'notas' => __('Notas'),
        'curiosidades' => __('Curiosidades'),
        'altura_atributo_planta_id' => __('Altura Atributo Planta Id')
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
    public function alturaAtributoPlanta()
    {
        return $this->belongsTo(\App\Models\AlturaAtributoPlanta::class, 'altura_atributo_planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function alturaAtributoPlanta1s()
    {
        return $this->hasMany(\App\Models\AlturaAtributoPlanta::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function categoriaAtributoPlantas()
    {
        return $this->hasMany(\App\Models\CategoriaAtributoPlanta::class, 'planta_id');
    }
}

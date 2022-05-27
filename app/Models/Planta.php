<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Planta
 * @package App\Models
 * @version May 27, 2022, 3:06 pm WEST
 *
 * @property string $abreviatura
 * @property string $nome_botanico
 * @property string $nome_comum
 * @property string $tempo_crescimento
 * @property string $notas
 * @property string $curiosidades
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
        'curiosidades'
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
        'curiosidades' => 'string'
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
        'abreviatura' => 'required|string|max:255',
        'nome_botanico' => 'required|string|max:255',
        'nome_comum' => 'required|string|max:255',
        'tempo_crescimento' => 'required|string|max:255',
        'notas' => 'required|string|max:255',
        'curiosidades' => 'required|string|max:255'
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
        'abreviatura' => __('Abreviatura'),
        'nome_botanico' => __('Nome Botanico'),
        'nome_comum' => __('Nome Comum'),
        'tempo_crescimento' => __('Tempo Crescimento'),
        'notas' => __('Notas'),
        'curiosidades' => __('Curiosidades')
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

    
}

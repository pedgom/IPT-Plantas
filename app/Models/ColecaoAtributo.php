<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class ColecaoAtributo
 * @package App\Models
 * @version June 21, 2022, 3:46 pm WEST
 *
 * @property string $colecao
 */
class ColecaoAtributo extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'colecao_atributos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const SOMBRA = 1;
    const INTERIOR = 2;
    const DUNA_PRIMARIA = 3;
    const DUNA_SECUNDARIA = 4;




    public $fillable = [
        'colecao'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'colecao' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'colecao' => 'required|string|max:255',
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
        'colecao' => __('Colecao'),
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At')
        ];
    }

    public static function getColecaoArray(){

        return [
            self::SOMBRA=>__('SOMBRA'),
            self::INTERIOR=>__('INTERIOR'),
            self::DUNA_PRIMARIA=>__('DUNA PRIMARIA'),
            self::DUNA_SECUNDARIA=>__('DUNA SECUNDARIA'),

        ];
    }



    /**
     * Retorna a familia selecionada
     * @return array
     *
     */
    public function getColecaoOptions(){

        return static::getColecaoArray();
    }


    /**
     * Retorna a ordem selecionada
     * @return
     */
    public function getColecaoLabelAttribute(){
        $array= self::getColecaoOptions();
        return $array [$this->colecao]??null;
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function plantas()
    {
        return $this->hasMany(\App\Models\Planta::class, 'colecao_atributo_id');
    }



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class CorSinteseAtributo
 * @package App\Models
 * @version July 7, 2022, 1:26 am WEST
 *
 * @property string $name
 */
class CorSinteseAtributo extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'cor_sintese_atributos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const VERMELHO = 1;
    const VERDE = 2;
    const AMARELO = 3;
    const AZUL = 4;
    const ROXO = 5;
    const ROSA = 6;
    const BRANCO = 7;
    const PRETO = 8;
    const CINZENTO = 9;
    const LARANJA = 10;
    const CASTANHO = 11;




    public $fillable = [
        'cor_sintese'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cor_sintese' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'cor_sintese' => 'required|string|max:255',
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
        'cor_sintese' => __('Cor Sintese'),
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At')
        ];
    }


    public static function getCorSinteseArray(){

        return [
            self::VERMELHO=>__('VERMELHO'),
            self::VERDE=>__('VERDE'),
            self::AMARELO=>__('AMARELO'),
            self::AZUL=>__('AZUL'),
            self::ROXO=>__('ROXO'),
            self::ROSA=>__('ROSA'),
            self::BRANCO=>__('BRANCO'),
            self::PRETO=>__('PRETO'),
            self::CINZENTO=>__('CINZENTO'),
            self::LARANJA=>__('LARANJA'),
            self::CASTANHO=>__('CASTANHO')

        ];
    }



    /**
     * Retorna a familia selecionada
     * @return array
     *
     */
    public function getCorSinteseOptions(){

        return static::getCorSinteseArray();
    }


    /**
     * Retorna a ordem selecionada
     * @return
     */
    public function getCorSinteseLabelAttribute(){
        $array= self::getCorSinteseOptions();
        return $array [$this->cor_sintese]??null;
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

    public function plantas()
    {
        return $this->hasMany(\App\Models\Planta::class, 'cor_sintese_atributo_id');
    }
}

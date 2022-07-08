<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class FormaHerbaceaAtributo
 * @package App\Models
 * @version June 21, 2022, 3:49 pm WEST
 *
 * @property string $name
 */
class FormaHerbaceaAtributo extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'forma_herbacea_atributos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const NA = 1;
    const FLORACAO_ALTA = 2;
    const CESPITOSA = 3;
    const CURVADA_PENDULA_ERVA = 4;
    const FLORACAO_TOPO = 5;
    const TUFO_RASTEIRO = 6;
    const COMPOSTA = 7;
    const DELICADA = 8;
    const FLORACAO_EXTERIOR = 9;
    const PENDENTE = 10;
    const ESPINHOSA = 11;




    public $fillable = [
        'forma_herbacea'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'forma_herbacea' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'forma_herbacea' => 'required|string|max:255',
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
        'forma_herbacea' => __('Forma Herbacea'),
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At')
        ];
    }

    public static function getFormaHerbaceaArray(){

        return [
            self::NA=>__('NA'),
            self::FLORACAO_ALTA=>__('FLORACAO ALTA'),
            self::CESPITOSA=>__('CESPITOSA'),
            self::CURVADA_PENDULA_ERVA=>__('CURVADA PENDULA ERVA'),
            self::FLORACAO_TOPO=>__('FLORACAO TOPO'),
            self::TUFO_RASTEIRO=>__('TUFO RASTEIRO'),
            self::COMPOSTA=>__('COMPOSTA'),
            self::DELICADA=>__('DELICADA'),
            self::FLORACAO_EXTERIOR=>__('FLORACAO EXTERIOR'),
            self::PENDENTE=>__('PENDENTE'),
            self::ESPINHOSA=>__('ESPINHOSA')

        ];
    }



    /**
     * Retorna a familia selecionada
     * @return array
     *
     */
    public function getFormaHerbaceaOptions(){

        return static::getFormaHerbaceaArray();
    }


    /**
     * Retorna a ordem selecionada
     * @return
     */
    public function getFormaHerbaceaLabelAttribute(){
        $array= self::getFormaHerbaceaOptions();
        return $array [$this->forma_herbacea]??null;
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
        return $this->hasMany(\App\Models\Planta::class, 'forma_herbacea_atributo_id');
    }



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class FormaArbustoAtributo
 * @package App\Models
 * @version June 14, 2022, 12:41 pm WEST
 *
 * @property string $name
 */
class FormaArbustoAtributo extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'forma_arbusto_atributos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const NA = 1;
    const FORMA_PENDENTE = 2;
    const FORMA_CESPITOSA = 3;
    const FORMA_OVOIDE_IRREGULAR = 4;
    const FORMA_IRREGULAR = 5;
    const FORMA_LECQUE = 6;
    const FORMA_ESFERICA = 7;
    const FORMA_OVOIDE_RASTEIRA = 8;
    const FORMA_PENDENTE_RASTEIRA =9;
    const FORMA_PROSTADA =10;
    const FORMA_TUFO_RASTEIRO =11;




    public $fillable = [
        'forma_arbusto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'forma_arbusto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'forma_arbusto' => 'required|string|max:255',
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
        'forma_arbusto' => __('Forma Arbusto'),
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At')
        ];
    }


    /**
     * Retorna um Array com os valores do campo FormaArbusto
     * @return array
     *
     */
    public static function getFormaArbustoArray(){

        return [
            self::NA=>__('NA'),
            self::FORMA_PENDENTE=>__('PENDING FORM'),
            self::FORMA_CESPITOSA=>__('CESPITOSE FORM'),
            self::FORMA_OVOIDE_IRREGULAR=>__('IRREGULAR OVOID FORM'),
            self::FORMA_IRREGULAR=>__('IRREGULAR FORM'),
            self::FORMA_LECQUE=>__('LECQUE FORM'),
            self::FORMA_ESFERICA=>__('SPHERICAL FORM'),
            self::FORMA_OVOIDE_RASTEIRA=>__('RASTERIA OVOID FORM'),
            self::FORMA_PENDENTE_RASTEIRA=>__('LOW PENDANT FORM'),
            self::FORMA_PROSTADA=>__('PROSTATE FORM'),
            self::FORMA_TUFO_RASTEIRO=>__('LOW TUFT FORM')
        ];
    }



    /**
     * Retorna a familia selecionada
     * @return array
     *
     */
    public function getFormaArbustoOptions(){

        return static::getFormaArbustoArray();
    }


    /**
     * Retorna a ordem selecionada
     * @return
     */
    public function getFormaArbustoLabelAttribute(){
        $array= self::getFormaArbustoOptions();
        return $array [$this->forma_arbusto]??null;
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
        return $this->hasMany(\App\Models\Planta::class, 'forma_arbusto_atributo_id');
    }



}

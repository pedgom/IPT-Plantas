<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class FormaArvoreAtributo
 * @package App\Models
 * @version June 21, 2022, 3:49 pm WEST
 *
 * @property string $forma_arvore
 */
class FormaArvoreAtributo extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'forma_arvore_atributos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const NA = 1;
    const COLUNAR = 2;
    const FASTIGIATA = 3;
    const OVAL = 4;
    const CONICA = 5;
    const ESFERICA = 6;
    const ELIPTICA = 7;
    const UMBELA = 8;
    const ESTENDIDA = 9;
    const PENDULAR = 10;
    const IRREGULAR = 11;
    const SEMIOVOIDE = 12;
    const PALMIFORME = 13;
    const ABANICO = 14;




    public $fillable = [
        'forma_arvore'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'forma_arvore' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'forma_arvore' => 'required|string|max:255',
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
        'forma_arvore' => __('Forma Arvore'),
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At')
        ];
    }

    /**
     * Retorna um Array com os valores do campo FormaArvore
     * @return array
     *
     */
    public static function getFormaArvoreArray(){

        return [
            self::NA=>__('NA'),
            self::COLUNAR=>__('COLUNAR'),
            self::FASTIGIATA=>__('FASTIGIATA'),
            self::OVAL=>__('OVAL'),
            self::CONICA=>__('CONICA'),
            self::ESFERICA=>__('ESFERICA'),
            self::ELIPTICA=>__('ELIPTICA'),
            self::UMBELA=>__('UMBELA'),
            self::ESTENDIDA=>__('ESTENDIDA'),
            self::PENDULAR=>__('PENDULAR'),
            self::IRREGULAR=>__('IRREGULAR'),
            self::SEMIOVOIDE=>__('SEMIOVOIDE'),
            self::PALMIFORME=>__('PALMIFORME'),
            self::ABANICO=>__('ABANICO')
        ];
    }



    /**
     * Retorna a familia selecionada
     * @return array
     *
     */
    public function getFormaArvoreOptions(){

        return static::getFormaArvoreArray();
    }


    /**
     * Retorna a ordem selecionada
     * @return
     */
    public function getFormaArvoreLabelAttribute(){
        $array= self::getFormaArvoreOptions();
        return $array [$this->forma_arvore]??null;
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
        return $this->hasMany(\App\Models\Planta::class, 'forma_arvore_atributo_id');
    }


}

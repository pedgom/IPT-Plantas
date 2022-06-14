<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class FamiliaAtributo
 * @package App\Models
 * @version June 14, 2022, 1:00 am WEST
 *
 * @property string $name
 */
class FamiliaAtributo extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'familia_atributos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const FAMILIA_ASTERACEAE = 1;
    const FAMILIA_BRASSICACEAE = 2;
    const FAMILIA_POACEAE = 3;
    const FAMILIA_CLUSIACEAE = 4;
    const FAMILIA_LAMIACEAE = 5;
    const FAMILIA_FABACEAE = 6;
    const FAMILIA_ARECACEAE = 7;
    const FAMILIA_APIACEAE =8;




    public $fillable = [
        'familia'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'familia' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'familia' => 'required|string|max:255',
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
        'familia' => __('Familia'),
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At')
        ];
    }


    /**
     * Retorna um Array com os valores do campo Familia
     * @return array
     *
     */
    public static function getFamiliaArray(){

        return [
            self::FAMILIA_ASTERACEAE=>__('ASTERACEAE FAMILY'),
            self::FAMILIA_BRASSICACEAE=>__('BRASSICACEAE FAMILY'),
            self::FAMILIA_POACEAE=>__('POACEAE FAMILY'),
            self::FAMILIA_CLUSIACEAE=>__('CLUSIACEAE FAMILY'),
            self::FAMILIA_LAMIACEAE=>__('LAMIACEAE FAMILY'),
            self::FAMILIA_FABACEAE=>__('FABACEAE FAMILY'),
            self::FAMILIA_ARECACEAE=>__('ARECACEAE FAMILY'),
            self::FAMILIA_APIACEAE=>__('APIACEAE FAMILY')
        ];
    }



    /**
     * Retorna a familia selecionada
     * @return array
     *
     */
    public function getFamiliaOptions(){

        return static::getFamiliaArray();
    }


    /**
     * Retorna a ordem selecionada
     * @return
     */
    public function getFamiliaLabelAttribute(){
        $array= self::getFamiliaOptions();
        return $array [$this->familia]??null;
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
        return $this->hasMany(\App\Models\Planta::class, 'familia_atributo_id');
    }


}

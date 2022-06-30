<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class UsoAtributo
 * @package App\Models
 * @version June 21, 2022, 3:35 pm WEST
 *
 * @property string $uso
 */
class UsoAtributo extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'uso_atributos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const MEDICINAL = 1;
    const ALIMENTAR = 2;
    const ESSENCIAS_INDUSTRIAIS = 3;
    const VENENOSAS_TOXICAS = 4;
    const MATERIAIS_INFRAESTRUTURAS = 5;
    const FORRAGEIRAS = 6;
    const MELIDERA = 7;
    const SOCIAL = 8;




    public $fillable = [
        'uso'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uso' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'uso' => 'required|string|max:255',
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
        'uso' => __('Uso'),
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At')
        ];
    }

    /**
     * Retorna um Array com os valores do campo UsoAtributo
     * @return array
     *
     */
    public static function getUsoArray(){

        return [
            self::MEDICINAL=>__('MEDICINAL'),
            self::ALIMENTAR=>__('ALIMENTAR'),
            self::ESSENCIAS_INDUSTRIAIS=>__('ESSENCIAS_INDUSTRIAIS'),
            self::VENENOSAS_TOXICAS=>__('VENENOSAS_TOXICAS'),
            self::MATERIAIS_INFRAESTRUTURAS=>__('MATERIAIS_INFRAESTRUTURAS'),
            self::FORRAGEIRAS=>__('FORRAGEIRAS'),
            self::MELIDERA=>__('MELIDERA'),
            self::SOCIAL=>__('SOCIAL')

        ];
    }



    /**
     * Retorna a familia selecionada
     * @return array
     *
     */
    public function getUsoOptions(){

        return static::getUsoArray();
    }


    /**
     * Retorna a ordem selecionada
     * @return
     */
    public function getUsoLabelAttribute(){
        $array= self::getUsoOptions();
        return $array [$this->uso]??null;
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
        return $this->hasMany(\App\Models\Planta::class, 'uso_atributo_id');
    }

}



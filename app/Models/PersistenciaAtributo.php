<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class PersistenciaAtributo
 * @package App\Models
 * @version June 13, 2022, 6:00 pm WEST
 *
 * @property string $name
 */
class PersistenciaAtributo extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'persistencia_atributos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const PERSISTENCIA_PERENIFOLIA = 1;
    const PERSISTENCIA_CADUCIFOLIA = 2;
    const PERSISTENCIA_MARCESCENTE = 3;
    const PERSISTENCIA_PERENE = 4;
    const PERSISTENCIA_VIVAZ = 5;
    const PERSISTENCIA_ANUAL = 6;
    const PERSISTENCIA_BIANUAL = 7;




    public $fillable = [
        'persistencia'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'persistencia' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'persistencia' => 'required|string|max:255',
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
        'persistencia' => __('Persistence'),
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At')
        ];
    }



    /**
     * Retorna um Array com os valores do campo persistencia
     * @return array
     *
     */
    public static function getPersistenciaArray(){

        return [
            self::PERSISTENCIA_PERENIFOLIA=>__('PERENNIFOLIA PERSISTENCE'),
            self::PERSISTENCIA_CADUCIFOLIA=>__('CADUCIFOLIA PERSISTENCE'),
            self::PERSISTENCIA_MARCESCENTE=>__('MARCESCENTE PERSISTENCE'),
            self::PERSISTENCIA_PERENE=>__('PERENE PERSISTENCE'),
            self::PERSISTENCIA_VIVAZ=>__('VIVAZ PERSISTENCE'),
            self::PERSISTENCIA_ANUAL=>__('ANUAL PERSISTENCE'),
            self::PERSISTENCIA_BIANUAL=>__('BIANUAL PERSISTENCE')
        ];
    }



    /**
     * Retorna a persistencia selecionada
     * @return array
     *
     */
    public function getPersistenciaOptions(){

        return static::getPersistenciaArray();
    }


    /**
     * Retorna a persistencia selecionada
     * @return
     */
    public function getPersistenciaLabelAttribute(){
        $array= self::getPersistenciaOptions();
        return $array [$this->persistencia]??null;
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
        return $this->hasMany(\App\Models\Planta::class, 'persistencia_atributo_id');
    }


}

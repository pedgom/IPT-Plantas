<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class AplicacaoAtributo
 * @package App\Models
 * @version June 21, 2022, 3:45 pm WEST
 *
 * @property string $aplicacao
 */
class AplicacaoAtributo extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'aplicacao_atributos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const ROCK_GARDEN = 1;
    const REVESTIMENTO_SOLO = 2;
    const CONTROLO_EROSAO = 3;
    const SEBES_COMPARTIMENTO = 4;
    const FILTRAGEM_AR = 5;





    public $fillable = [
        'aplicacao'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'aplicacao' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'aplicacao' => 'required|string|max:255',
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
        'aplicacao' => __('Aplicacao'),
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At')
        ];
    }
    public static function getAplicacaoArray(){

        return [
            self::ROCK_GARDEN=>__('ROCK GARDEN'),
            self::REVESTIMENTO_SOLO=>__('REVESTIMENTO SOLO'),
            self::CONTROLO_EROSAO=>__('CONTROLO EROSAO'),
            self::SEBES_COMPARTIMENTO=>__('SEBES COMPARTIMENTO'),
            self::FILTRAGEM_AR=>__('FILTRAGEM AR')

        ];
    }



    /**
     * Retorna a familia selecionada
     * @return array
     *
     */
    public function getAplicacaoOptions(){

        return static::getAplicacaoArray();
    }


    /**
     * Retorna a ordem selecionada
     * @return
     */
    public function getAplicacaoLabelAttribute(){
        $array= self::getAplicacaoOptions();
        return $array [$this->aplicacao]??null;
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
        return $this->hasMany(\App\Models\Planta::class, 'aplicacao_atributo_id');
    }

}

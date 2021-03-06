<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class OrigemRelacaoAtributo
 * @package App\Models
 * @version June 21, 2022, 3:44 pm WEST
 *
 * @property string $origem_relacao
 */
class OrigemRelacaoAtributo extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'origem_relacao_atributos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const AUTOTOCNES = 1;
    const EXOTICAS = 2;
    const NATURALIZADA = 3;
    const INVASORA = 4;
    const INFRAESTRANTES = 5;




    public $fillable = [
        'origem_relacao'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'origem_relacao' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'origem_relacao' => 'required|string|max:255',
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
        'origem_relacao' => __('Origem Relacao'),
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At')
        ];
    }


    /**
     * Retorna um Array com os valores do campo OrigemRelacao
     * @return array
     *
     */
    public static function getOrigemRelacaoArray(){

        return [

            self::AUTOTOCNES=>__('AUTOTOCNES'),
            self::EXOTICAS=>__('EXOTICAS'),
            self::NATURALIZADA=>__('NATURALIZADA'),
            self::INVASORA=>__('INVASORA'),
            self::INFRAESTRANTES=>__('INFRAESTRANTES')

        ];
    }



    /**
     * Retorna a familia selecionada
     * @return array
     *
     */
    public function getOrigemRelacaoOptions(){

        return static::getOrigemRelacaoArray();
    }


    /**
     * Retorna a ordem selecionada
     * @return
     */
    public function getOrigemRelacaoLabelAttribute(){
        $array= self::getOrigemRelacaoOptions();
        return $array [$this->origem_relacao]??null;
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
        return $this->hasMany(\App\Models\Planta::class, 'origem_relacao_atributo_id');
    }


}

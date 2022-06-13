<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class OrdemAtributo
 * @package App\Models
 * @version June 14, 2022, 12:06 am WEST
 *
 * @property string $name
 */
class OrdemAtributo extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'ordem_atributos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const ORDEM_BRASSICALES = 1;
    const ORDEM_CELASTRALES = 2;
    const ORDEM_CROSSOSOMATALES = 3;
    const ORDEM_FABALES = 4;
    const ORDEM_GERANIALES = 5;
    const ORDEM_HUERTEALES = 6;
    const ORDEM_MYRTALES = 7;





    public $fillable = [
        'ordem'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ordem' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'ordem' => 'required|string|max:255',
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
        'ordem' => __('Ordem'),
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At')
        ];
    }



    /**
     * Retorna um Array com os valores do campo persistencia
     * @return array
     *
     */
    public static function getOrdemArray(){

        return [
            self::ORDEM_BRASSICALES=>__('BRASSICALES ORDER'),
            self::ORDEM_CELASTRALES=>__('CELASTRALES ORDER'),
            self::ORDEM_CROSSOSOMATALES=>__('CROSSOSOMATALES ORDER'),
            self::ORDEM_FABALES=>__('FABALES ORDER'),
            self::ORDEM_GERANIALES=>__('GERANIALES ORDER'),
            self::ORDEM_HUERTEALES=>__('HUERTEALES ORDER'),
            self::ORDEM_MYRTALES=>__('MYRTALES ORDER')
        ];
    }



    /**
     * Retorna a ordem selecionada
     * @return array
     *
     */
    public function getOrdemOptions(){

        return static::getOrdemArray();
    }


    /**
     * Retorna a ordem selecionada
     * @return
     */
    public function getOrdemLabelAttribute(){
        $array= self::getOrdemOptions();
        return $array [$this->ordem]??null;
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
        return $this->hasMany(\App\Models\Planta::class, 'ordem_atributo_id');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class GeneroAtributo
 * @package App\Models
 * @version June 14, 2022, 11:59 am WEST
 *
 * @property string $name
 */
class GeneroAtributo extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'genero_atributos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const GENERO_ABAREMA = 1;
    const GENERO_ABELIA = 2;
    const GENERO_ACAENA = 3;
    const GENERO_ACHETARIA = 4;
    const GENERO_AGROCHARIS = 5;
    const GENERO_AGONIS = 6;
    const GENERO_EUPHORBIA = 7;
    const GENERO_ASTRAGALUS =8;




    public $fillable = [
        'genero'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'genero' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'genero' => 'required|string|max:255',
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
        'genero' => __('Genero'),
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At')
        ];
    }


    /**
     * Retorna um Array com os valores do campo Genero
     * @return array
     *
     */
    public static function getGeneroArray(){

        return [
            self::GENERO_ABAREMA=>__('ABAREMA GENRE'),
            self::GENERO_ABELIA=>__('ABELIA GENRE'),
            self::GENERO_ACAENA=>__('ACAENA GENRE'),
            self::GENERO_ACHETARIA=>__('ACHETARIA GENRE'),
            self::GENERO_AGROCHARIS=>__('AGROCHARIS GENRE'),
            self::GENERO_AGONIS=>__('AGONIS GENRE'),
            self::GENERO_EUPHORBIA=>__('EUPHORBIA GENRE'),
            self::GENERO_ASTRAGALUS=>__('ASTRAGALUS GENRE')
        ];
    }



    /**
     * Retorna o genero selecionado
     * @return array
     *
     */
    public function getGeneroOptions(){

        return static::getGeneroArray();
    }


    /**
     * Retorna o genero selecionado
     * @return
     */
    public function getGeneroLabelAttribute(){
        $array= self::getGeneroOptions();
        return $array [$this->genero]??null;
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
        return $this->hasMany(\App\Models\Planta::class, 'genero_atributo_id');
    }

}

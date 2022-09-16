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

        return self::all()->pluck('forma_arbusto', 'id')->toArray();
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

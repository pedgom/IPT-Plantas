<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class OrigemAtributo
 * @package App\Models
 * @version June 21, 2022, 3:43 pm WEST
 *
 * @property \Illuminate\Database\Eloquent\Collection $origemAtributoPlantas
 * @property string $pais
 * @property string $continente
 */
class OrigemAtributo extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'origem_atributos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'pais',
        'continente'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pais' => 'string',
        'continente' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'pais' => 'required|string|max:2',
        'continente' => 'required|string|max:2',
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
        'pais' => __('Pais'),
        'continente' => __('Continente'),
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At')
        ];
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
    public function origemAtributoPlantas()
    {
        return $this->hasMany(\App\Models\OrigemAtributoPlanta::class, 'origem_atributo_id');
    }
}

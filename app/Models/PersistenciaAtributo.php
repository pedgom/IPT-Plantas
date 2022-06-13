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
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'name' => 'required|string|max:255',
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
        'name' => __('Name'),
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


}

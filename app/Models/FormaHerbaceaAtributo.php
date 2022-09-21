<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class FormaHerbaceaAtributo
 * @package App\Models
 * @version June 21, 2022, 3:49 pm WEST
 *
 * @property string $name
 */
class FormaHerbaceaAtributo extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'forma_herbacea_atributos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';






    public $fillable = [
        'forma_herbacea'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'forma_herbacea' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'forma_herbacea' => 'required|string|max:255',
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
        'forma_herbacea' => __('Forma Herbacea'),
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At')
        ];
    }

    public static function getFormaHerbaceaArray(){

        return self::all()->pluck('forma_herbacea', 'id')->toArray();
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
        return $this->hasMany(\App\Models\Planta::class, 'forma_herbacea_atributo_id');
    }



}

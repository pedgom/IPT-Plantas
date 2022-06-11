<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Planta
 * @package App\Models
 * @version June 1, 2022, 5:22 pm WEST
 *
 * @property \Illuminate\Database\Eloquent\Collection $aguaAtributoPlantas
 * @property \Illuminate\Database\Eloquent\Collection $alturaAtributoPlantas
 * @property \Illuminate\Database\Eloquent\Collection $categoriaAtributoPlantas
 * @property \Illuminate\Database\Eloquent\Collection $densidadeAtributoPlantas
 * @property \Illuminate\Database\Eloquent\Collection $diametroAtributoPlantas
 * @property \Illuminate\Database\Eloquent\Collection $luzAtributoPlantas
 * @property \Illuminate\Database\Eloquent\Collection $origemAtributoPlantas
 * @property \Illuminate\Database\Eloquent\Collection $phSoloAtributoPlantas
 * @property \Illuminate\Database\Eloquent\Collection $resistenciaAtributoPlantas
 * @property \Illuminate\Database\Eloquent\Collection $soloAtributoPlantas
 * @property string $abreviatura
 * @property string $nome_botanico
 * @property string $nome_comum
 * @property string $tempo_crescimento
 * @property string $notas
 * @property string $curiosidades
 */
class Planta extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'plantas';
    public $altura= [];
    public $categoria= [];
    public $luz= [];
    public $diametro= [];
    public $densidade= [];
    public $agua= [];


    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'abreviatura',
        'nome_botanico',
        'nome_comum',
        'tempo_crescimento',
        'notas',
        'curiosidades'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'abreviatura' => 'string',
        'nome_botanico' => 'string',
        'nome_comum' => 'string',
        'tempo_crescimento' => 'string',
        'notas' => 'string',
        'curiosidades' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'abreviatura' => 'required|string|max:255',
        'nome_botanico' => 'required|string|max:255',
        'nome_comum' => 'required|string|max:255',
        'tempo_crescimento' => 'required|string|max:255',
        'notas' => 'required|string|max:255',
        'curiosidades' => 'required|string|max:255',
            'altura'=>'required|array|min:1',
            'categoria'=>'required|array|min:1',
            'luz'=>'required|array|min:1',
            'diametro'=>'required|array|min:1',
            'densidade'=>'required|array|min:1',
            'agua'=>'required|array|min:1'

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
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At'),
        'deleted_at' => __('Deleted At'),
        'abreviatura' => __('Abreviatura'),
        'nome_botanico' => __('Nome Botanico'),
        'nome_comum' => __('Nome Comum'),
        'tempo_crescimento' => __('Tempo Crescimento'),
        'notas' => __('Notas'),
        'curiosidades' => __('Curiosidades')
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
    public function aguaAtributoPlantas()
    {
        return $this->hasMany(\App\Models\AguaAtributoPlanta::class, 'planta_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function aguaAtributos()
    {
        return $this->belongsToMany(\App\Models\AguaAtributo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function alturaAtributoPlantas()
    {
        return $this->hasMany(\App\Models\AlturaAtributoPlanta::class, 'planta_id');
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function alturaAtributos()
    {
        return $this->belongsToMany(\App\Models\AlturaAtributo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function categoriaAtributoPlantas()
    {
        return $this->hasMany(\App\Models\CategoriaAtributoPlanta::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categoriaAtributos()
    {
        return $this->belongsToMany(\App\Models\CategoriaAtributo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function densidadeAtributoPlantas()
    {
        return $this->hasMany(\App\Models\DensidadeAtributoPlanta::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function densidadeAtributos()
    {
        return $this->belongsToMany(\App\Models\DensidadeAtributo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function diametroAtributoPlantas()
    {
        return $this->hasMany(\App\Models\DiametroAtributoPlanta::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function diametroAtributos()
    {
        return $this->belongsToMany(\App\Models\DiametroAtributo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function luzAtributoPlantas()
    {
        return $this->hasMany(\App\Models\LuzAtributoPlanta::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function luzAtributos()
    {
        return $this->belongsToMany(\App\Models\LuzAtributo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function origemAtributoPlantas()
    {
        return $this->hasMany(\App\Models\OrigemAtributoPlanta::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function phSoloAtributoPlantas()
    {
        return $this->hasMany(\App\Models\PhSoloAtributoPlanta::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function resistenciaAtributoPlantas()
    {
        return $this->hasMany(\App\Models\ResistenciaAtributoPlanta::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function soloAtributoPlantas()
    {
        return $this->hasMany(\App\Models\SoloAtributoPlanta::class, 'planta_id');
    }

    //melhorar
    public function alturasToString()
    {
        $string = '';
        foreach ($this->alturaAtributos as $altura){
            $string.=$altura->name.', ';
        }
        return trim($string, ', ');
    }


    public function categoriasToString()
    {
        $string = '';
        foreach ($this->categoriaAtributos as $categoria){
            $string.=$categoria->name.', ';
        }
        return trim($string, ', ');
    }


    public function luzToString()
    {
        $string = '';
        foreach ($this->luzAtributos as $luz){
            $string.=$luz->name.', ';
        }
        return trim($string, ', ');
    }

    public function diametroToString()
    {
        $string = '';
        foreach ($this->diametroAtributos as $diametro){
            $string.=$diametro->name.', ';
        }
        return trim($string, ', ');
    }


    public function densidadeToString()
    {
        $string = '';
        foreach ($this->densidadeAtributos as $densidade) {
            $string .= $densidade->name . ', ';
        }
        return trim($string, ', ');
    }


    public function aguaToString()
    {
        $string = '';
        foreach ($this->aguaAtributos as $agua){
            $string.=$agua->name.', ';
        }
        return trim($string, ', ');
    }
}

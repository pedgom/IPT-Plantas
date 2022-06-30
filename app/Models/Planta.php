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
    public $resistencia= [];
    public $solo= [];
    public $ph_solo= [];



    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'abreviatura',
        'nome_botanico',
        'nome_comum',
        'tempo_crescimento',
        'notas',
        'curiosidades',
        'persistencia_atributo_id',
        'ordem_atributo_id',
        'familia_atributo_id',
        'genero_atributo_id',
        'forma_arbusto_atributo_id',
        'descritor_atributo_id',
        'uso_atributo_id',
        'origem_relacao_atributo_id',
        'forma_arvore_atributo_id'



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
            'agua'=>'required|array|min:1',
            'resistencia'=>'required|array|min:1',
            'solo'=>'required|array|min:1',
            'ph_solo'=>'required|array|min:1',
            'persistencia'=>'required|in:'.implode(',',array_keys(\App\Models\PersistenciaAtributo::getPersistenciaArray())),
            'ordem'=>'required|in:'.implode(',',array_keys(\App\Models\OrdemAtributo::getOrdemArray())),
            'familia'=>'required|in:'.implode(',',array_keys(\App\Models\FamiliaAtributo::getFamiliaArray())),
            'genero'=>'required|in:'.implode(',',array_keys(\App\Models\GeneroAtributo::getGeneroArray())),
            'forma_arbusto'=>'required|in:'.implode(',',array_keys(\App\Models\FormaArbustoAtributo::getFormaArbustoArray())),
            'uso'=>'required|in:'.implode(',',array_keys(\App\Models\UsoAtributo::getUsoArray())),
            'origem_relacao'=>'required|in:'.implode(',',array_keys(\App\Models\OrigemRelacaoAtributo::getOrigemRelacaoArray())),
            'forma_arvore'=>'required|in:'.implode(',',array_keys(\App\Models\FormaArvoreAtributo::getFormaArvoreArray()))



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
        'curiosidades' => __('Curiosidades'),
            'persistencia' => __('Persistencia'),
            'ordem' => __('Ordem'),
            'familia' => __('Familia'),
            'genero' => __('Genero'),
            'forma_arbusto' => __('Forma Arbusto'),
            'uso' => __('Uso'),
            'origem_relacao' => __('Origem Relacao'),
            'forma_arvore' => __('Forma Arvore')




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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function phSoloAtributos()
    {
        return $this->belongsToMany(\App\Models\PhSoloAtributo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function resistenciaAtributoPlantas()
    {
        return $this->hasMany(\App\Models\ResistenciaAtributoPlanta::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function resistenciaAtributos()
    {
        return $this->belongsToMany(\App\Models\ResistenciaAtributo::class, 'planta_resistencia_atributos');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persistenciaAtributo()
    {
        return $this->belongsTo(\App\Models\PersistenciaAtributo::class, 'persistencia_atributo_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ordemAtributo()
    {
        return $this->belongsTo(\App\Models\OrdemAtributo::class, 'ordem_atributo_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function familiaAtributo()
    {
        return $this->belongsTo(\App\Models\FamiliaAtributo::class, 'familia_atributo_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function generoAtributo()
    {
        return $this->belongsTo(\App\Models\GeneroAtributo::class, 'genero_atributo_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function formaArbustoAtributo()
    {
        return $this->belongsTo(\App\Models\FormaArbustoAtributo::class, 'forma_arbusto_atributo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usoAtributo()
    {
        return $this->belongsTo(\App\Models\UsoAtributo::class, 'uso_atributo_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function origemRelacaoAtributo()
    {
        return $this->belongsTo(\App\Models\OrigemRelacaoAtributo::class, 'origem_relacao_atributo_id');
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function formaArvoreAtributo()
    {
        return $this->belongsTo(\App\Models\FormaArvoreAtributo::class, 'forma_arvore_atributo_id');
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function soloAtributoPlantas()
    {
        return $this->hasMany(\App\Models\SoloAtributoPlanta::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function soloAtributos()
    {
        return $this->belongsToMany(\App\Models\SoloAtributo::class, 'planta_solo_atributos');
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

    public function resistenciaToString()
    {
        $string = '';
        foreach ($this->resistenciaAtributos as $resistencia){
            $string.=$resistencia->name.', ';
        }
        return trim($string, ', ');
    }

    public function soloToString()
    {
        $string = '';
        foreach ($this->soloAtributos as $solo){
            $string.=$solo->name.', ';
        }
        return trim($string, ', ');
    }

    public function phSoloToString()
    {
        $string = '';
        foreach ($this->phSoloAtributos as $ph_solo){
            $string.=$ph_solo->name.', ';
        }
        return trim($string, ', ');
    }



}

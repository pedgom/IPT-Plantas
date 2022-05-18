<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Planta
 * @package App\Models
 * @version May 18, 2022, 4:08 pm WEST
 *
 * @property \App\Models\AplicacoesAtributo $aplicacoesAtributo
 * @property \App\Models\ColecoesAtributo $colecoesAtributo
 * @property \App\Models\CorSinteseAtributo $corSinteseAtributo
 * @property \App\Models\DescritorAtributo $descritorAtributo
 * @property \App\Models\EstacaoSinteseAtributo $estacaoSinteseAtributo
 * @property \App\Models\FamiliaAtributo $familiaAtributo
 * @property \App\Models\FormaArbAtributo $formaArbAtributo
 * @property \App\Models\FormaArvAtributo $formaArvAtributo
 * @property \App\Models\FormaHerbAtributo $formaHerbAtributo
 * @property \App\Models\GeneroAtributo $generoAtributo
 * @property \App\Models\OrdemAtributo $ordemAtributo
 * @property \App\Models\ORelacaoAtributo $oRelacaoAtributo
 * @property \App\Models\PersistenciaAtributo $persistenciaAtributo
 * @property \App\Models\SituacaoEcologicaAtributo $situacaoEcologicaAtributo
 * @property \App\Models\UsosAtributo $usosAtributo
 * @property \Illuminate\Database\Eloquent\Collection $aguaAtributoPlanta
 * @property \Illuminate\Database\Eloquent\Collection $alturaAtributoPlanta
 * @property \Illuminate\Database\Eloquent\Collection $categoriaAtributoPlanta
 * @property \Illuminate\Database\Eloquent\Collection $densidadeAtributoPlanta
 * @property \Illuminate\Database\Eloquent\Collection $diametroAtributoPlanta
 * @property \Illuminate\Database\Eloquent\Collection $luzAtributoPlanta
 * @property \Illuminate\Database\Eloquent\Collection $origemAtributoPlanta
 * @property \Illuminate\Database\Eloquent\Collection $phsoloAtributoPlanta
 * @property \Illuminate\Database\Eloquent\Collection $resisAtributoPlanta
 * @property \Illuminate\Database\Eloquent\Collection $soloAtributoPlanta
 * @property string $abreviatura
 * @property string $nome_botanico
 * @property string $nome_comum
 * @property string $tempo_crescimento
 * @property string $notas
 * @property string $curiosidades
 * @property integer $descritor_atributo_id
 * @property integer $ordem_atributo_id
 * @property integer $familia_atributo_id
 * @property integer $genero_atributo_id
 * @property integer $situacao_ecologica_atributo_id
 * @property integer $persistencia_atributo_id
 * @property integer $o_relacao_atributo_id
 * @property integer $usos_atributo_id
 * @property integer $aplicacoes_atributo_id
 * @property integer $colecoes_atributo_id
 * @property integer $forma_arv_atributo_id
 * @property integer $forma_arb_atributo_id
 * @property integer $forma_herb_atributo_id
 * @property integer $cor_sintese_atributo_id
 * @property integer $estacao_sintese_atributo_id
 */
class Planta extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'plantas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'abreviatura',
        'nome_botanico',
        'nome_comum',
        'tempo_crescimento',
        'notas',
        'curiosidades',
        'descritor_atributo_id',
        'ordem_atributo_id',
        'familia_atributo_id',
        'genero_atributo_id',
        'situacao_ecologica_atributo_id',
        'persistencia_atributo_id',
        'o_relacao_atributo_id',
        'usos_atributo_id',
        'aplicacoes_atributo_id',
        'colecoes_atributo_id',
        'forma_arv_atributo_id',
        'forma_arb_atributo_id',
        'forma_herb_atributo_id',
        'cor_sintese_atributo_id',
        'estacao_sintese_atributo_id'
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
        'curiosidades' => 'string',
        'descritor_atributo_id' => 'integer',
        'ordem_atributo_id' => 'integer',
        'familia_atributo_id' => 'integer',
        'genero_atributo_id' => 'integer',
        'situacao_ecologica_atributo_id' => 'integer',
        'persistencia_atributo_id' => 'integer',
        'o_relacao_atributo_id' => 'integer',
        'usos_atributo_id' => 'integer',
        'aplicacoes_atributo_id' => 'integer',
        'colecoes_atributo_id' => 'integer',
        'forma_arv_atributo_id' => 'integer',
        'forma_arb_atributo_id' => 'integer',
        'forma_herb_atributo_id' => 'integer',
        'cor_sintese_atributo_id' => 'integer',
        'estacao_sintese_atributo_id' => 'integer'
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
        'abreviatura' => 'required|string|max:255',
        'nome_botanico' => 'required|string|max:255',
        'nome_comum' => 'required|string|max:255',
        'tempo_crescimento' => 'required|string|max:255',
        'notas' => 'required|string|max:255',
        'curiosidades' => 'required|string|max:255',
        'descritor_atributo_id' => 'nullable',
        'ordem_atributo_id' => 'nullable',
        'familia_atributo_id' => 'nullable',
        'genero_atributo_id' => 'nullable',
        'situacao_ecologica_atributo_id' => 'nullable',
        'persistencia_atributo_id' => 'nullable',
        'o_relacao_atributo_id' => 'nullable',
        'usos_atributo_id' => 'nullable',
        'aplicacoes_atributo_id' => 'nullable',
        'colecoes_atributo_id' => 'nullable',
        'forma_arv_atributo_id' => 'nullable',
        'forma_arb_atributo_id' => 'nullable',
        'forma_herb_atributo_id' => 'nullable',
        'cor_sintese_atributo_id' => 'nullable',
        'estacao_sintese_atributo_id' => 'nullable'
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
        'abreviatura' => __('Abreviatura'),
        'nome_botanico' => __('Nome Botanico'),
        'nome_comum' => __('Nome Comum'),
        'tempo_crescimento' => __('Tempo Crescimento'),
        'notas' => __('Notas'),
        'curiosidades' => __('Curiosidades'),
        'descritor_atributo_id' => __('Descritor Atributo Id'),
        'ordem_atributo_id' => __('Ordem Atributo Id'),
        'familia_atributo_id' => __('Familia Atributo Id'),
        'genero_atributo_id' => __('Genero Atributo Id'),
        'situacao_ecologica_atributo_id' => __('Situacao Ecologica Atributo Id'),
        'persistencia_atributo_id' => __('Persistencia Atributo Id'),
        'o_relacao_atributo_id' => __('O Relacao Atributo Id'),
        'usos_atributo_id' => __('Usos Atributo Id'),
        'aplicacoes_atributo_id' => __('Aplicacoes Atributo Id'),
        'colecoes_atributo_id' => __('Colecoes Atributo Id'),
        'forma_arv_atributo_id' => __('Forma Arv Atributo Id'),
        'forma_arb_atributo_id' => __('Forma Arb Atributo Id'),
        'forma_herb_atributo_id' => __('Forma Herb Atributo Id'),
        'cor_sintese_atributo_id' => __('Cor Sintese Atributo Id'),
        'estacao_sintese_atributo_id' => __('Estacao Sintese Atributo Id')
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function aplicacoesAtributo()
    {
        return $this->belongsTo(\App\Models\AplicacoesAtributo::class, 'aplicacoes_atributo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function colecoesAtributo()
    {
        return $this->belongsTo(\App\Models\ColecoesAtributo::class, 'colecoes_atributo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function corSinteseAtributo()
    {
        return $this->belongsTo(\App\Models\CorSinteseAtributo::class, 'cor_sintese_atributo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function descritorAtributo()
    {
        return $this->belongsTo(\App\Models\DescritorAtributo::class, 'descritor_atributo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estacaoSinteseAtributo()
    {
        return $this->belongsTo(\App\Models\EstacaoSinteseAtributo::class, 'estacao_sintese_atributo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function familiaAtributo()
    {
        return $this->belongsTo(\App\Models\FamiliaAtributo::class, 'familia_atributo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function formaArbAtributo()
    {
        return $this->belongsTo(\App\Models\FormaArbAtributo::class, 'forma_arb_atributo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function formaArvAtributo()
    {
        return $this->belongsTo(\App\Models\FormaArvAtributo::class, 'forma_arv_atributo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function formaHerbAtributo()
    {
        return $this->belongsTo(\App\Models\FormaHerbAtributo::class, 'forma_herb_atributo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function generoAtributo()
    {
        return $this->belongsTo(\App\Models\GeneroAtributo::class, 'genero_atributo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ordemAtributo()
    {
        return $this->belongsTo(\App\Models\OrdemAtributo::class, 'ordem_atributo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function oRelacaoAtributo()
    {
        return $this->belongsTo(\App\Models\ORelacaoAtributo::class, 'o_relacao_atributo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function persistenciaAtributo()
    {
        return $this->belongsTo(\App\Models\PersistenciaAtributo::class, 'persistencia_atributo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function situacaoEcologicaAtributo()
    {
        return $this->belongsTo(\App\Models\SituacaoEcologicaAtributo::class, 'situacao_ecologica_atributo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function usosAtributo()
    {
        return $this->belongsTo(\App\Models\UsosAtributo::class, 'usos_atributo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function aguaAtributoPlanta()
    {
        return $this->hasMany(\App\Models\AguaAtributoPlantum::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function alturaAtributoPlanta()
    {
        return $this->hasMany(\App\Models\AlturaAtributoPlantum::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function categoriaAtributoPlanta()
    {
        return $this->hasMany(\App\Models\CategoriaAtributoPlantum::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function densidadeAtributoPlanta()
    {
        return $this->hasMany(\App\Models\DensidadeAtributoPlantum::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function diametroAtributoPlanta()
    {
        return $this->hasMany(\App\Models\DiametroAtributoPlantum::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function luzAtributoPlanta()
    {
        return $this->hasMany(\App\Models\LuzAtributoPlantum::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function origemAtributoPlanta()
    {
        return $this->hasMany(\App\Models\OrigemAtributoPlantum::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function phsoloAtributoPlanta()
    {
        return $this->hasMany(\App\Models\PhsoloAtributoPlantum::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function resisAtributoPlanta()
    {
        return $this->hasMany(\App\Models\ResisAtributoPlantum::class, 'planta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function soloAtributoPlanta()
    {
        return $this->hasMany(\App\Models\SoloAtributoPlantum::class, 'planta_id');
    }
}

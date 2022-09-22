<?php

namespace App\Helpers;

use App\Models\AguaAtributo;
use App\Models\AlturaAtributo;
use App\Models\CategoriaAtributo;
use App\Models\CorSinteseAtributo;
use App\Models\DensidadeAtributo;
use App\Models\DiametroAtributo;
use App\Models\LuzAtributo;
use App\Models\PersistenciaAtributo;
use App\Models\SoloAtributo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class Helper
{
    public static function validateFakeRequest(Request $request, $rules){
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return [
                'success' => false,
                'errors' => $validator->errors()
            ];
        }else{
            return [
                'validated' => $validator->valid(),
                'success' => true
            ];
        }
    }

    public static function parseNomeBotanico(mixed $nome_botanico)
    {
        if(empty($nome_botanico)){
            return $nome_botanico;
        }
        else if(strlen($nome_botanico)>255){

            return substr($nome_botanico,0,255);
        }

        else{
            return $nome_botanico;
        }
    }

    public static function parseCategoria(mixed $categoria)
    {
        $exists = CategoriaAtributo::where('name', $categoria)->exists();

        if($exists){
            return CategoriaAtributo::where('name', $categoria)->first()->id;
        }

        else{
            return null;
        }
    }

    public static function parseFamilia(mixed $familia)
    {
        if(empty($familia)){
            return $familia;
        }
        else if(strlen($familia)>255){

            return Str::lower(substr($familia,0,255));
        }

        else{
            return $familia;
        }
    }

    public static function parseAltura(mixed $altura)
    {
        if($altura<0.10){
            return [AlturaAtributo::where('name', '0 - 0.10')->first()->id];
        }

        else if($altura>=0.10 && $altura<0.30){
            return [AlturaAtributo::where('name', '0.10 - 0.30')->first()->id];
        }

        else if($altura>=0.30 && $altura<0.45){
            return [AlturaAtributo::where('name', '0.30 - 0.45')->first()->id];
        }

        else if($altura>=0.45 && $altura<0.60){
            return [AlturaAtributo::where('name', '0.45 - 0.60')->first()->id];
        }

        else if($altura>=0.60 && $altura<0.75){
            return [AlturaAtributo::where('name', '0.60 - 0.75')->first()->id];
        }

        else if($altura>=0.75 && $altura<0.90){
            return [AlturaAtributo::where('name', '0.75 - 0.90')->first()->id];
        }

        else if($altura>=0.90 && $altura<1.50){
            return [AlturaAtributo::where('name', '0.90 - 1.50')->first()->id];
        }

        else if($altura>=1.50 && $altura<3.00){
            return [AlturaAtributo::where('name', '1.50 - 3.00')->first()->id];
        }

        else if($altura>=3.00 && $altura<4.00){
            return [AlturaAtributo::where('name', '3.00 - 4.00')->first()->id];
        }

        else if($altura>=4.00 && $altura<8.00){
            return [AlturaAtributo::where('name', '4.00 - 8.00')->first()->id];
        }

        else if($altura>=8.00 && $altura<12.00){
            return [AlturaAtributo::where('name', '8.00 - 12.00')->first()->id];
        }

        else if($altura>=12.00 && $altura<16.00){
            return [AlturaAtributo::where('name', '12.00 - 16.00')->first()->id];
        }

        else if($altura>=16.00 && $altura<20.00){
            return [AlturaAtributo::where('name', '16.00 - 20.00')->first()->id];
        }

        else if($altura>=20.00 && $altura<25.00){
            return [AlturaAtributo::where('name', '20.00 - 25.00')->first()->id];
        }

        else if($altura>=25.00 && $altura<30.00){
            return [AlturaAtributo::where('name', '25.00 - 30.00')->first()->id];
        }

        else if($altura>=30.00){
            return [AlturaAtributo::where('name', '30.00+')->first()->id];
        }

        else{
            return null;
        }

    }

    public static function parseDiametro(mixed $diametro)
    {
        if($diametro<0.50){
            return [DiametroAtributo::where('name', '0.50-')->first()->id];
        }

        else if($diametro>=0.50 && $diametro<0.80){
            return [DiametroAtributo::where('name', '0.50 - 0.80')->first()->id];
        }

        else if($diametro>=0.80 && $diametro<1.20){
            return [DiametroAtributo::where('name', '0.80 - 1.20')->first()->id];
        }

        else if($diametro>=1.20 && $diametro<1.50){
            return [DiametroAtributo::where('name', '1.20 - 1.50')->first()->id];
        }

        else if($diametro>=1.50 && $diametro<3.00){
            return [DiametroAtributo::where('name', '1.50 - 3.00')->first()->id];
        }

        else if($diametro>=3.00 && $diametro<7.00){
            return [DiametroAtributo::where('name', '3.00 - 7.00')->first()->id];
        }


        else if($diametro>=7.00){
            return [DiametroAtributo::where('name', '7.00+')->first()->id];
        }

        else{
            return null;
        }
    }

    public static function parsePersistencia(mixed $persistencia)
    {
        if(str_starts_with($persistencia, 'marces')){
            return PersistenciaAtributo::where('persistencia', 'Marcescente')->first()->id;

        }

        else if(str_starts_with($persistencia, 'perene')){
            return PersistenciaAtributo::where('persistencia', 'Perene')->first()->id;
        }

        else if(str_starts_with($persistencia, 'caduca')){
            return PersistenciaAtributo::where('persistencia', 'Caducifolia')->first()->id;
        }

        else if(str_starts_with($persistencia, 'caduca')){
            return PersistenciaAtributo::where('persistencia', 'Caducifolia')->first()->id;
        }

        else if(str_starts_with($persistencia, 'vivaz')){
            return PersistenciaAtributo::where('persistencia', 'Vivaz')->first()->id;
        }

        else if(str_starts_with($persistencia, 'anual')){
            return PersistenciaAtributo::where('persistencia', 'Anual')->first()->id;
        }

        else if(str_starts_with($persistencia, 'bianual')){
            return PersistenciaAtributo::where('persistencia', 'Bianual')->first()->id;
        }

        else {
            return null;
        }


    }

    public static function parseCorSintese(mixed $cor_sintese)
    {
        if(str_starts_with($cor_sintese, 'branca')){
            return CorSinteseAtributo::where('cor_sintese',CorSinteseAtributo::BRANCO)->first()->id;
        }

        else if (str_starts_with($cor_sintese, 'laranja')){
            return CorSinteseAtributo::where('cor_sintese',CorSinteseAtributo::LARANJA)->first()->id;
        }

        else if (str_starts_with($cor_sintese, 'amarela')){
            return CorSinteseAtributo::where('cor_sintese',CorSinteseAtributo::AMARELO)->first()->id;
        }

        else if (str_starts_with($cor_sintese, 'vermelha')){
            return CorSinteseAtributo::where('cor_sintese',CorSinteseAtributo::VERMELHO)->first()->id;
        }

        else if (str_starts_with($cor_sintese, 'rosa')){
            return CorSinteseAtributo::where('cor_sintese',CorSinteseAtributo::ROSA)->first()->id;
        }

        else if (str_starts_with($cor_sintese, 'azul')){
            return CorSinteseAtributo::where('cor_sintese',CorSinteseAtributo::AZUL)->first()->id;
        }

        else if (str_starts_with($cor_sintese, 'lilás')){
            return CorSinteseAtributo::where('cor_sintese',CorSinteseAtributo::ROXO)->first()->id;
        }

        else if (str_starts_with($cor_sintese, 'roxa')){
            return CorSinteseAtributo::where('cor_sintese',CorSinteseAtributo::ROXO)->first()->id;
        }

        else if (str_starts_with($cor_sintese, 'verde')){
            return CorSinteseAtributo::where('cor_sintese',CorSinteseAtributo::VERDE)->first()->id;
        }

        else if (str_starts_with($cor_sintese, 'preta')){
            return CorSinteseAtributo::where('cor_sintese',CorSinteseAtributo::PRETO)->first()->id;
        }

        else if (str_starts_with($cor_sintese, 'castanha')){
            return CorSinteseAtributo::where('cor_sintese',CorSinteseAtributo::CASTANHO)->first()->id;
        }

        else if (str_starts_with($cor_sintese, 'cinzenta')){
            return CorSinteseAtributo::where('cor_sintese',CorSinteseAtributo::CINZENTO)->first()->id;
        }


        else{
            return null;
        }


    }

    public static function parseEstacao(mixed $estacao)
    {


        $arr= [];

        if(Str::contains($estacao, ['Primavera'])){
            $arr = array_merge($arr, [3,4,5,6]);
        }

        if(str_starts_with($estacao, 'Verão')){
            $arr = array_merge($arr, [6,7,8,9]);

        }

        if(str_starts_with($estacao, 'Outono')){
            $arr = array_merge($arr, [9,10,11,12]);
        }

        if(str_starts_with($estacao, 'Inverno')){
            $arr = array_merge($arr, [12,1,2,3]);
        }

        if(str_starts_with($estacao, 'todo o ano')){
            $arr = array_merge($arr, [1,2,3,4,5,6,7,8,9,10,11,12]);

        }

        return array_unique($arr);
    }

    public static function parseLuz(mixed $luz)
    {
        if(empty($luz)){
            return LuzAtributo::where('name', 'Indiferente')->first()->id;
        }
        $arr= [];

        if(Str::contains($luz, ['sol'])){
            $luz_atributo = LuzAtributo::where('name', 'Sol Pleno')->first()->id;
            $arr = array_merge($arr, [$luz_atributo]);
        }

        if(Str::contains($luz, ['1/2sombra'])){
            $luz_atributo = LuzAtributo::where('name', 'Meia-sombra')->first()->id;
            $arr = array_merge($arr, [$luz_atributo]);
        }

        if(preg_match("/sombra/i", $luz)){
            $luz_atributo = LuzAtributo::where('name', 'Sombra')->first()->id;
            $arr = array_merge($arr, [$luz_atributo]);
        }

        return $arr;

    }

    public static function parseSolo(mixed $solo)
    {
        $arr= [];

        if(Str::contains($solo, ['arenoso'])){
            $solo_id = SoloAtributo::where('name', 'Arenoso')->first()->id;
            $arr = array_merge($arr, [$solo_id]);
        }

        if(Str::contains($solo, ['medio'])){
            $solo_id = SoloAtributo::where('name', 'Medio')->first()->id;
            $arr = array_merge($arr, [$solo_id]);
        }

        if(Str::contains($solo, ['argiloso'])){
            $solo_id = SoloAtributo::where('name', 'Argiloso')->first()->id;
            $arr = array_merge($arr, [$solo_id]);
        }

        if(Str::contains($solo, ['drenado'])){
            $solo_id = SoloAtributo::where('name', 'Drenado')->first()->id;
            $arr = array_merge($arr, [$solo_id]);
        }



        if(Str::contains($solo, ['bem drenado'])){
            $solo_id = SoloAtributo::where('name', 'Bem Drenado')->first()->id;
            $arr = array_merge($arr, [$solo_id]);
        }

        if(Str::contains($solo, ['não calcário'])){
            $solo_id = SoloAtributo::where('name', 'Não-Calcário')->first()->id;
            $arr = array_merge($arr, [$solo_id]);
        }

        if(Str::contains($solo, ['calcareos'])){
            $solo_id = SoloAtributo::where('name', 'Calcário')->first()->id;
            $arr = array_merge($arr, [$solo_id]);
        }

        if(Str::contains($solo, ['neutro'])){
            $solo_id = SoloAtributo::where('name', 'Neutro')->first()->id;
            $arr = array_merge($arr, [$solo_id]);
        }

        if(Str::contains($solo, ['qualquer'])){
            $solo_id = SoloAtributo::all()->pluck('id')->toArray();
            $arr = array_merge($arr, $solo_id);
        }

        return array_unique($arr);
    }

    public static function parseAgua(mixed $agua)
    {
        $arr= [];

        if(Str::contains($agua, ['Verão','pouca'])){
            $agua_id = AguaAtributo::where('name', 'Baixa')->first()->id;
            $arr = array_merge($arr, [$agua_id]);
        }

        if(Str::contains($agua, ['media'])){
            $agua_id = AguaAtributo::where('name', 'Moderada')->first()->id;
            $arr = array_merge($arr, [$agua_id]);
        }

        if(Str::contains($agua, ['resist. seca'])){
            $agua_id = AguaAtributo::where('name', 'Resistente-seca')->first()->id;
            $arr = array_merge($arr, [$agua_id]);
        }

        if(Str::contains($agua, ['muita'])){
            $agua_id = AguaAtributo::where('name', 'Solo Humido')->first()->id;
            $arr = array_merge($arr, [$agua_id]);
        }

        return array_unique($arr);


    }

    public static function parseResistencia(mixed $int, mixed $int1, mixed $int2)
    {
        return [1];
    }

    public static function parseTempoCrescimento(mixed $tempo_crescimento)
    {
        if(empty($tempo_crescimento)){
            return 'moderado';
        }

        else if(Str::contains($tempo_crescimento, '?')){
            return 'indefinido';
        }
        else if(strlen($tempo_crescimento)>255){

            return substr($tempo_crescimento,0,255);
        }

        else{
            return $tempo_crescimento;
        }

    }

    public static function parseDensidade(mixed $densidade)
    {
        return DensidadeAtributo::where('name', 'NA')->pluck('id')->toArray();

    }


}

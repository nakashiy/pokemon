<?php
// ポケモンAPIを利用するクラス
class PokemonApi
{
    private const BASE_URL = 'https://pokeapi.co/api/v2/';
    private const URL_PARAMS = [
        'pokemon', //基本情報
        'pokemon-species' //種族情報
    ];
    private $id; //ポケモンID
    private $info; //ポケモン情報

    // IDから情報を取得
    public function __construct($id)
    {
        $this->id = $id;
        foreach (self::URL_PARAMS as $url_param) {
            ${'url_' . $url_param} = self::BASE_URL . $url_param . '/' . $this->id . '/';
            ${'curl_' . $url_param} = curl_init(${'url_' . $url_param});
            curl_setopt(${'curl_' . $url_param}, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt(${'curl_' . $url_param}, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt(${'curl_' . $url_param}, CURLOPT_RETURNTRANSFER, true);
            ${'curl_json' . $url_param} = curl_exec(${'curl_' . $url_param});
            $this->info[$url_param] = json_decode(${'curl_json' . $url_param}, true);
            $this->info['img_url'] = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/' . $this->id . '.png';
            curl_close(${'curl_' . $url_param});
        }
    }

    // ポケモン情報取得
    public function getInfo()
    {
        return $this->info;
    }
}

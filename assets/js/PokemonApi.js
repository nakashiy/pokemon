// 定数設定
const BASE_URL = 'https://pokeapi.co/api/v2/';
const URL_PARAM = [
    'pokemon', //基本情報
    'pokemon-species' //種族情報
];
// ポケモンAPIを利用するクラス
class PokemonApi {
    constructor() {
        this.info = {};
    }
    // 初期化
    async init(number) {
        await this.fetchPokemonInfo(number);
    }
    // ポケモン情報をAPIで取得
    fetchPokemonInfo = async (number) => {
        for (let param of URL_PARAM) {
            const data = await fetch(BASE_URL + param + '/' + number + '/');
            const data_json = await data.json();
            this.info[param] = data_json;
        }
        this.info['pokemon-img'] = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/' + number + '.png';
    };
}
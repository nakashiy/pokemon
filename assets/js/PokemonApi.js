// 定数設定
const BASE_URL = 'https://pokeapi.co/api/v2/';
const BASE_IMG_URL = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/'
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
        this.info['pokemon-img'] = {};
        this.info['pokemon-img']['front'] = BASE_IMG_URL + number + '.png';
        this.info['pokemon-img']['front-shiny'] = BASE_IMG_URL + 'shiny/' + number + '.png';
        this.info['pokemon-img']['front-female'] = BASE_IMG_URL + 'female/' + number + '.png';
        this.info['pokemon-img']['front-shiny-female'] = BASE_IMG_URL + 'shiny/female/' + number + '.png';
        this.info['pokemon-img']['back'] = BASE_IMG_URL + 'back/' + number + '.png';
        this.info['pokemon-img']['back-shiny'] = BASE_IMG_URL + 'back/shiny/' + number + '.png';
        this.info['pokemon-img']['back-female'] = BASE_IMG_URL + 'back/female/' + number + '.png';
        this.info['pokemon-img']['back-shiny-female'] = BASE_IMG_URL + 'back/shiny/female/' + number + '.png';
    };
}
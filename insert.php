<?php
require_once './lib/function.php';
require_once './lib/PokemonApi.php';

// ポケモン情報取得
$ids = range(1, 151);
foreach ($ids as $index => $id) {
    $PokemonApi = new PokemonApi($id);
    $results[$index] = $PokemonApi->getInfo();
}

// 取得したポケモン情報を登録
foreach ($results as $result) {
    insertPokemonInfo(
        $result['pokemon']['id'],
        $result['pokemon-species']['names'][0]['name'],
        $result['pokemon']['stats'][0]['base_stat'],
        $result['pokemon']['stats'][1]['base_stat'],
        $result['pokemon']['stats'][2]['base_stat'],
        $result['pokemon']['stats'][3]['base_stat'],
        $result['pokemon']['stats'][4]['base_stat'],
        $result['pokemon']['stats'][5]['base_stat']
    );
}

// データベースにポケモン情報を登録
function insertPokemonInfo($no, $name, $hp, $attack, $defense, $special_attack, $special_defense, $speed)
{
    require_once './connect.php';
    $db = dbconnect();
    $sql = $db->prepare('insert into pokemon set no=?,name=?,hp=?,attack=?,defense=?,special_attack=?,special_defense=?,speed=?');
    $sql->execute([$no, $name, $hp, $attack, $defense, $special_attack, $special_defense, $speed]);
}

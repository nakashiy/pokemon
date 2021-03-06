<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>PokeApi</title>
</head>

<body>
    <?php
    // PHPでポケモン情報を取得
    // require_once './lib/function.php';
    // require_once './lib/PokemonApi.php';
    // $ids[] = mt_rand(1, 898);
    // foreach ($ids as $index => $id) {
    //     $PokemonApi = new PokemonApi($id);
    //     $results[$index] = $PokemonApi->getInfo();
    // }
    // console($results);
    ?>
    <!-- PHPコンテンツstart -->
    <?php if (false) : ?>
        <?php include_once './html_inc/navi.html'; ?>
        <div class="flex">
            <?php foreach ($results as $result) : ?>
                <div class="pokemon col-md-4 col-sm-6 col-xs-12">
                    <img src='<?= $result['img_url'] ?>'>
                    <div><?= $result['pokemon']['id'] ?></div>
                    <div><?= $result['pokemon-species']['names'][0]['name'] ?></div>
                    <?php $total_stat = 0; ?>
                    <?php for ($i = 0; $i <= 5; $i++) : ?>
                        <div><?= $result['pokemon']['stats'][$i]['stat']['name'] . ':' . $result['pokemon']['stats'][$i]['base_stat'] ?></div>
                        <?php $total_stat += $result['pokemon']['stats'][$i]['base_stat'] ?>
                    <?php endfor; ?>
                    <div>total:<?= $total_stat ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <!-- PHPコンテンツend -->

    <!-- JSコンテンツstart -->
    <button type="button" class="btn btn-danger" onclick="displayPokemon()">ポケモン！</button>
    <div id="pokemon_wrap">
        <img id="img_front"></img>
        <div id="info">
            <div>　　ＩＤ：<span id="id"></span></div>
            <div>　　名前：<span id="name"></span></div>
            <div>　　ＨＰ：<span id="hp"></span></div>
            <div>こうげき：<span id="attack"></span></div>
            <div>ぼうぎょ：<span id="defense"></span></div>
            <div>とくこう：<span id="special_attack"></span></div>
            <div>とくぼう：<span id="special_defense"></span></div>
            <div>すばやさ：<span id="speed"></span></div>
            <div>　　合計：<span id="total"></span></div>
        </div>
    </div>
    <!-- JSコンテンツend -->

    <script>
        // ページが全て読み込まれたら実行
        window.onload = function() {
            displayPokemon();
        };
        // ポケモンを表示
        const displayPokemon = async () => {
            // ポケモン情報取得
            const No = getRandam(1, 898);
            const pokemonApi = new PokemonApi();
            await pokemonApi.init(No);
            console.log(pokemonApi.info);
            //ステータスの合計算出
            let total_stat = 0;
            for (let i = 0; i < 6; i++) {
                total_stat += pokemonApi.info['pokemon']['stats'][i]['base_stat'];
            }
            // ポケモン情報の表示
            const img_front = document.getElementById('img_front');
            img_front.src = pokemonApi.info['pokemon-img']['front'];
            const id = document.getElementById('id');
            id.innerHTML = pokemonApi.info['pokemon']['id'];
            const name = document.getElementById('name');
            name.innerHTML = pokemonApi.info['pokemon-species']['names'][0]['name'];
            const hp = document.getElementById('hp');
            hp.innerHTML = pokemonApi.info['pokemon']['stats'][0]['base_stat'];
            const attack = document.getElementById('attack');
            attack.innerHTML = pokemonApi.info['pokemon']['stats'][1]['base_stat'];
            const defense = document.getElementById('defense');
            defense.innerHTML = pokemonApi.info['pokemon']['stats'][2]['base_stat'];
            const special_attack = document.getElementById('special_attack');
            special_attack.innerHTML = pokemonApi.info['pokemon']['stats'][3]['base_stat'];
            const special_defense = document.getElementById('special_defense');
            special_defense.innerHTML = pokemonApi.info['pokemon']['stats'][4]['base_stat'];
            const speed = document.getElementById('speed');
            speed.innerHTML = pokemonApi.info['pokemon']['stats'][5]['base_stat'];
            const total = document.getElementById('total');
            total.innerHTML = total_stat;
        };
    </script>
    <!-- JSライブラリ -->
    <script type="text/javascript" src="./assets/js/function.js"></script>
    <script type="text/javascript" src="./assets/js/PokemonApi.js"></script>
</body>

</html>
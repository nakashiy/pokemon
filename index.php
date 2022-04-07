<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">

    <title>PokeApi</title>
</head>

<body>
    <?php
    require_once './lib/function.php';
    require_once './lib/PokemonApi.php';
    // IDからポケモン情報取得
    $ids[] = mt_rand(1, 898);
    $ids[] = mt_rand(1, 898);
    $ids[] = mt_rand(1, 898);
    foreach ($ids as $index => $id) {
        $PokemonApi = new PokemonApi($id);
        $results[$index] = $PokemonApi->getInfo();
    }
    console($results);
    ?>

    <!-- コンテンツstart -->
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
    <!-- コンテンツend -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
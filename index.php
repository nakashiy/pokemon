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

<body class="bg-light">
    <?php
    // PHPでポケモン情報を取得
    require_once './lib/function.php';
    require_once './lib/PokemonApi.php';
    $num = 3; //表示するポケモンの数
    for ($i = 0; $i < $num; $i++) {
        $ids[] = mt_rand(1, 898);
    }
    foreach ($ids as $index => $id) {
        $PokemonApi = new PokemonApi($id);
        $pokemons[$index] = $PokemonApi->getInfo();
    }
    console($pokemons);
    ?>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
        <div class="container">
            <!-- サブコンポーネント -->
            <!-- ブランド -->
            <a class="navbar-brand" href="./">POKEMON</a>
            <!-- 切り替えボタン -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- ナビゲーション -->
            <div class="collapse navbar-collapse justify-content-end" id="navbar-content">
                <!-- 左側メニュー：トップページの各コンテンツへのリンク -->
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="./#">ページ１<span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./#about">ページ２</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./#items">ページ３</a>
                    </li>
                    <!-- ドロップダウン -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            インフォメーション
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="./#shop">お店</a>
                            <a class="dropdown-item" href="./#access">アクセス</a>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /サブコンポーネント -->
        </div>
    </nav>

    <div class="container py-4">
        <div class="row">
            <?php foreach ($pokemons as $pokemon) : ?>
                <div class="col-sm-6 col-md-4">
                    <!-- カード -->
                    <div class="card mb-3">
                        <img src="<?= $pokemon['img_url'] ?>" alt="" class="img-fluid bg-dark">
                        <!-- カードの本文 -->
                        <div class="card-body d-flex justify-content-between">
                            <h4 class="card-title"><?= $pokemon['pokemon-species']['names'][0]['name'] ?></h4>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal<?= $pokemon['pokemon']['id'] ?>">
                                詳しく見る
                            </button>
                        </div>
                    </div>
                </div>
                <!-- モーダル -->
                <div class="modal fade" id="modal<?= $pokemon['pokemon']['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-label"><?= $pokemon['pokemon-species']['names'][0]['name'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center">
                                    <img alt="ポケモンの写真" src="<?= $pokemon['img_url'] ?>" class="img-fluid">
                                </p>
                                <p><?= $pokemon['pokemon-species']['flavor_text_entries'][0]['flavor_text'] ?></p>
                            </div>
                            <div class="modal-footer">
                                <table class="table">
                                    <tbody>
                                        <?php $total_stat = 0; ?>
                                        <?php for ($i = 0; $i <= 5; $i++) : ?>
                                            <tr>
                                                <th><?= $pokemon['pokemon']['stats'][$i]['stat']['name'] ?></th>
                                                <td><?= $pokemon['pokemon']['stats'][$i]['base_stat'] ?></td>
                                            </tr>
                                            <?php $total_stat += $pokemon['pokemon']['stats'][$i]['base_stat'] ?>
                                        <?php endfor; ?>
                                        <tr>
                                            <th>total</th>
                                            <td><?= $total_stat ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>
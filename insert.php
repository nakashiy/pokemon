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
    <h1 class="text-center mb-5">ポケモン登録</h1>
    <h2 class="text-center mb-4">Noの開始と終了を入れてください</h2>
    <div class="container">
        <form action="./insert_processing.php" method="POST">
            <!-- メールアドレス入力 -->
            <div class="row">
                <div class="mb-3 col-3">
                    <label class="form-label" for="start">開始</label>
                    <input class="form-control" id="start" name="start" required>
                </div>
                <div class="mb-3 col-3">
                    <label class="form-label" for="end">終了</label>
                    <input class="form-control" id="end" name="end" required>
                </div>
            </div>
            <!-- 送信ボタン -->
            <button type="submit" class="btn btn-primary">登録</button>
        </form>
    </div>
</body>

</html>
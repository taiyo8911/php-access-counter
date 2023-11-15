<?php
// カウント数が記録してあるファイルを開く
$fp = fopen('count.dat', 'r+b');

// ファイルをロックする
flock($fp, LOCK_EX);

// ファイルからカウント数を取得する
$count = fgets($fp);

// カウント数をインクリメントする
$count++;
?>

<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DIY Programmerの部屋</title>
        <meta name="description" content="日曜エンジニアが作ったアプリを公開しているサイト">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
        <style>
        body {
            background-color: skyblue;
            cursor: crosshair;
        }

        h1 {
            color: blue;
            font-style: italic;
        }

        div {
            margin: 20px 0;
        }

        div.container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        div.counter {
            background-color: pink;
            width: max-content;
            margin: 0 auto;
        }

        table {
            margin: 0 auto;
        }
        </style>
    </head>

    <body oncontextmenu="alert('右クリックは禁止です！');">
        <div class="container">
            <div class="title_logo">
                <h1>DIY Programmerの部屋</h1>
                <small>作りたいものは自分で作る！</small>
            </div>

            <marquee>Welcome to my homepage!</marquee>

            <div class="counter">
                <div>あなたは<?php echo $count; ?>人目の来訪者です。</div>
                <div class="sub"><span class="counter_sub">本日：23</span>
                    <span class="counter_sub">昨日：30</span>
                </div>
            </div>

            <div class="btn">
                <button onclick="func1()">お気に入りに登録</button>
            </div>

            <div class="update-history">
                <h2 class="title">What’s NEW</h2>
                <div class="inner">
                    <table class="contents" border="1">
                        <tbody>
                            <tr class="">
                                <td class="date">2023/01/25</td>
                                <td>サイトをいろいろ変更</td>
                            </tr>
                            <tr class="">
                                <td class="date">2023/01/23</td>
                                <td>サイトを公開</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <h2 class="title">メインコンテンツ</h2>
            <table class="contents" border="1">
                <tbody>
                    <tr>
                        <td class="">プロフィール</td>
                        <td class="">管理人のプロフィールです。</td>
                    </tr>
                    <tr>
                        <td class="">100の質問</td>
                        <td class="">100の質問です。</td>
                    </tr>
                    <tr>
                        <td class="">アプリ</a></td>
                        <td class="">自作のアプリを公開しています。</td>
                    </tr>
                    <tr>
                        <td class=""><s>素材置き場</s></td>
                        <td class="">写真や画像置き場です。</td>
                    </tr>
                    <tr>
                        <td class="">
                            <s>掲示板</s>
                        </td>
                        <td class="">工事中。</td>
                    </tr>
                    <tr>
                        <td class=""><s>リンクの冒険</s></td>
                        <td class="">おすすめサイトのリンク集です。</td>
                    </tr>
                </tbody>
            </table>

            <h2>PCスペック</h2>
            <table class="contents" border="1">
                <tbody>
                    <tr>
                        <td>PC</td>
                        <td>MacBook Air(Retina, 13-inch, 2018)</td>
                    </tr>
                    <tr>
                        <td>プロセッサ</td>
                        <td>1.6 GHz デュアルコア Intel Core i5</td>
                    </tr>
                    <tr>
                        <td>メモリ</td>
                        <td>16GB 2133 MHz LPDDR3</td>
                    </tr>
                    <tr>
                        <td>グラフィックス</td>
                        <td>Intel UHD Graphics 617 1536 MB</td>
                    </tr>
                    <tr>
                        <td>好きなソフト</td>
                        <td>vscode、filezilla</td>
                    </tr>
                    <tr>
                        <td>使用OS</td>
                        <td>macOS Montery</td>
                    </tr>
                </tbody>
            </table>

            <div>
                <marquee>★★当サイトはリンクフリーです。相互リンク大募集！★★</marquee>
            </div>
            <hr>
            <div class="copyright">
                <small>&copy; DIY Programmerの部屋. 2023</small>
            </div>
        </div>

        <!-- 右クリック禁止処理 -->
        <script>
        function func1() {
            alert("ごめんなさい。できません。")
        }
        </script>
    </body>

</html>

<?php
// ファイルのポインタを先頭に戻す
rewind($fp);

// ファイルにカウント数を書き込む
fwrite($fp, $count);

// ファイルのロックを解除する
flock($fp, LOCK_UN);

// ファイルを閉じる
fclose($fp);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

</head>
<body>

    <header>
        <div class="menu">
            <!-- リンクと画像設定 -->
        <p><a href="/top"><img src="{{ asset('images/atlas.png') }}" alt="AtlasSNSヘッダー画像" class="image1"></a></p>
            <input type="checkbox" id="menu_bar01" />

                <label for="menu_bar01">
                    <p class="username"> {{ Auth::user()->username }} さん</p>

                    @if(Auth::user()->images == 'dawn.png')
                    <img src="{{ asset('storage/icon1.png') }}" alt="AtlasSNSアイコン画像" class="image2">

                    @else
                    <img src="{{ asset('storage/'.Auth::user()->images) }}" alt="AtlasSNSアイコン画像" class="image2">
                    @endif

                </label>
                <ul id="links01">
                    <li><a href="/top">HOME</a></li>
                    <li><a href="/profile">プロフィール編集</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="login-username"> {{ Auth::user()->username }} さんの</p>
                <div>
                <p>フォロー数</p>
                <p>{{ Auth::user()->follows()->count() }}名</p>
                </div>
                <p class="follow-list_btn"><a href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>{{ Auth::user()->followers()->count() }}名</p>
                </div>
                <p class="follower-list_btn"><a href="/follower-list">フォロワーリスト</a></p>
                 <p class="search_btn"><a href="/search">ユーザー検索</a></p>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/script.js"></script>

</body>
</html>

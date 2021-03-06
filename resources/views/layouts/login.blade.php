<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.5.0.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
		<script src="{{ asset('js/app.js') }}"></script>
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
</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img src="images/main_logo.png" ></a></h1>
            <div id="pulldawn">
                <div id="menu">
                    <p>{{Auth::user()->username}}さん</p>
                    <img src="{{ asset('storage/' .Auth::user()->image) }}" width="50" height="50" >
                </div>
                <ul>
                    <li><a href="/top">ホーム</a></li>
                    <li><a href="/profile_edit">プロフィール</a></li>
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
                <p>{{Auth::user()->username}}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>
                <?php
                $id = Auth::id();

                $follow_counts = \DB::table('follows')
                ->where('follower_id',$id)
                ->select(DB::raw('COUNT(*) as count'))
                ->get();
                ?>
                @foreach ($follow_counts as $follow_count)
                {{$follow_count->count}}名</p>
                @endforeach
                </div>
                <p class="btn"><a href="/followlist">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>
                <?php
                $id = Auth::id();

                $follower_counts = \DB::table('follows')
                ->where('follow_id',$id)
                ->select(DB::raw('COUNT(*) as count'))
                ->get();
                ?>
                @foreach ($follower_counts as $follower_count)
                {{$follower_count->count}}名</p>
                @endforeach
                </div>
                <p class="btn"><a href="/followerlist">フォロワーリスト</a></p>
            </div>
            <div id="user">
            <p class="btn"><a href="/search">ユーザー検索</a></p>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>

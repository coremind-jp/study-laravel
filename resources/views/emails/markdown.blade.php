@component('mail::message')
# こんにちは、{{ $name }}さん。

![sample.png](https://avatars1.githubusercontent.com/u/1571522 '画像タイトル')

@component('mail::panel')
## <span id="cmd">:cl: コマンド一覧</span>
package.json内からであれば `bsbl` として呼び出すことができる。
通常のコマンドラインでは `node_modules/backstopjs_boilerplate/boilerplate/cli.js` に対してサブコマンドを渡す必要がある。

#### init
`bsbl init [path]`

__事前に`backstop init`が実行済みでなければならない。__
  
`[path]`には _backstop.json_ へのパスを指定する。省略した場合、_./backstop.json_ として扱われる。

_backstop_data/_ 内に boilerplate のためのディレクトリと設定ファイル（_boilerplate.json_）を生成し、onBefore, onReady の動作を書き換える。書き換えについては[「engine_scripts のモジュール化」](#toc4)を参照。

#### sync
`bsbl sync [path]`

__事前に`bsbl init`が実行済みでなければならない。__ 
  
`[path]`には _backstop.json_ へのパスを指定する。省略した場合、_./backstop.json_ として扱われる。

設定ファイル（_boilerplate.json_）内のシナリオ定義を利用して _backstop_data/boilerplate/_ 内のディレクトリとファイルを同期する。設定ファイル内にシナリオの定義が存在していて、その定義が示すディレクトリやファイルが存在しない場合はそれらを生成する。既に存在しているファイルに対しては何も行わない。設定ファイル内のシナリオ定義に一致しないディレクトリやファイルが存在する場合はそれらを削除する。基本的にディレクトリとファイルの生成・削除は手動で行わず、設定ファイルの編集と `bsbl sync` コマンドで行う。    
@endcomponent

@component('mail::table')
| prefix | description |
|:----:|----|
| +: | 対象配列にマージする。配列内で重複が見つかった場合、後方の値を破棄する |
| -: | 対象配列に含まれる同じ値を取り除く |
| =: | 配列全体を入れ替える |
@endcomponent

@component('mail::button', ['url' => 'http://localhost:8080/study/auth/home', 'color' => 'success'])
success
@endcomponent

@component('mail::button', ['url' => 'http://localhost:8080/study/auth/home', 'color' => 'primary'])
primary
@endcomponent

@component('mail::button', ['url' => 'http://localhost:8080/study/auth/home', 'color' => 'error'])
error
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

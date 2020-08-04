<div class="alert alert-{{ $type }}">
  <h4 class="alert-heading">
    {{ $alert_title }}
  </h4>

  <p>blade構文上では @@component ディレクティブを使わずにカスタムタグとして呼び出す事もできます。</p>

  <p>{{ $slot }}</p>
  
  @isset($isset)
    <p>メインテンプレートに渡された変数`isset`は「{{ $isset }}」です</p>
  @else
    <p>メインテンプレートに渡された変数`isset`は参照できませんでした</p>
  @endisset
</div>
<div class="alert alert-{{ $type }}">
  <h4 class="alert-heading">
    {{ $alert_title }}
  </h4>

  <p>{{ $slot }}</p>
  
  @isset($isset)
    <p>メインテンプレートに渡された変数`isset`は「{{ $isset }}」です</p>
  @else
    <p>メインテンプレートに渡された変数`isset`は参照できませんでした</p>
  @endisset
</div>
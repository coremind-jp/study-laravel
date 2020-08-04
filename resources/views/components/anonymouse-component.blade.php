@props(['propName'])

<div>
  <p>このコンポーネントは匿名（無名）コンポーネントとして作られています。</p>
  <p>sampleProp に与えられた値は「{{ $sampleProp }}」です。</p>
  {{ $slot }}
</div>
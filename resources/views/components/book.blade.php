@isset($patch)
  <table class="table table-striped">
    <tr>
      <th class="align-middle">ISBN</th>
      <th class="align-middle">書名</th>
      <th class="align-middle">価格</th>
      <th class="align-middle">出版社</th>
      <th class="align-middle">刊行日</th>
      <th colspan="2"></th>
    </tr>
    @each('components.book.item_patch', $records, 'record', 'components.book.empty')
  </table>
@else
  <table class="table table-striped">
    <tr>
      <th class="align-middle">ISBN</th>
      <th class="align-middle">書名</th>
      <th class="align-middle">価格</th>
      <th class="align-middle">出版社</th>
      <th class="align-middle">刊行日</th>
    </tr>
    @each('components.book.item', $records, 'record', 'components.book.empty')
  </table>
@endisset

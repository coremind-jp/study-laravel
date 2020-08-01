<table class="table table-striped">
  <tr>
    <th>ISBN</th>
    <th>書名</th>
    <th>価格</th>
    <th>出版社</th>
    <th>刊行日</th>
  </tr>
  @each('components.book.item', $records, 'record', 'components.book.empty')
</table>
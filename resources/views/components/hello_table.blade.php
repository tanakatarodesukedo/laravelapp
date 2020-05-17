<table>
  <tr>
    <th><a href="/hello?sort=name">name</a></th>
    <th><a href="/hello?sort=mail">mail</a></th>
    <th><a href="/hello?sort=age">age</a></th>
  </tr>
  @foreach($items as $item)
  <tr>
    <td>{{$item->name}}</td>
    <td>{{$item->mail}}</td>
    <td>{{$item->age}}</td>
  </tr>
  @endforeach
</table>
{{$items->appends(['sort' => $sort])->links()}}

<script>
  $(function() {
    $('#main-table a.page-link').on('click', function(e) {
      e.preventDefault();
      $(this).css('pointer-events', 'none');

      const page = $(this).data('page');
      $.ajax({
        url: '{{route("hello.move")}}',
        type: 'post',
        data: {
          page: page,
          sort: '{{$sort}}'
        }
      }).done(function(data) {
        $('#main-table').html(data.partialView);
      }).always(function() {
        $('a.page-link').css('pointer-events', 'auto');
      });
    });
  });
</script>
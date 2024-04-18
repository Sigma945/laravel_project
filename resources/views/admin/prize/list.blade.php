<script>
    @if(Session::has("message"))
    alert("{{ Session::get('message') }}");
    @endif

    function doDelete(id) {
        if (confirm("確定刪除?")) {
            //此方法是危險的,實際開發要用post方式去刪除
            location.href = "delete/" + id;
        }
    }
</script>

<div><a href="add">新增</a></div>
<P></P>
@foreach($list as $data)
<div>獎項:{{ $data->title }}
    &nbsp;&nbsp;
    名額:{{ $data->number }}
    &nbsp;&nbsp;
    內容:{{ $data->content }}
    &nbsp;&nbsp;
    @if(!empty($data->photo))
    圖片: <img src="/images/prize/{{$data->photo}}" width="100"> &nbsp;&nbsp;
    @endif
        <a href="edit/{{ $data->id }}">修改</a> &nbsp;&nbsp;
        <a href="javascript:doDelete('{{ $data->id }}')">刪除</a>
    <P></P>
</div>
@endforeach
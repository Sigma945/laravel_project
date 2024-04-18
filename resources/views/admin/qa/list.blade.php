<script>
    @if (Session::has("message"))
        alert("{{ Session::get('message') }}");
    @endif

    function doDelete(id)
    {
        if(confirm("確定刪除?"))
        {
            //此方法是危險的,實際開發要用post方式去刪除
            location.href="delete/" + id;
        }
    }
</script>

@foreach($list as $data)
<div>標題:{{ $data->title }}
&nbsp;&nbsp;<a href="add">新增</a>
    &nbsp;&nbsp;<a href="edit/{{ $data->id }}">修改</a>
    &nbsp;&nbsp;<a href="javascript:doDelete('{{ $data->id }}')">刪除</a>
</div>
<div>內容:{{ $data->content }}</div>
@endforeach
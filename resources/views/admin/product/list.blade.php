<script>
    @if(Session::has("message"))
    alert("{{ Session::get('message') }}");
    @endif

    function doDelete(pid) {
        if (confirm("確定刪除?")) {
            //此方法是危險的,實際開發要用post方式去刪除
            location.href = "delete/" + pid;
        }
    }
</script>

<div><a href="add">新增</a></div>
<P></P>
@foreach($list as $data)
<div>產品名稱:{{ $data->pname }}
    &nbsp;&nbsp;
    @if(!empty($data->photo))
    圖片: <img src="/images/product/{{$data->photo}}" width="100"> &nbsp;&nbsp;
    @endif
        <a href="edit/{{ $data->pid }}">修改</a> &nbsp;&nbsp;
        <a href="javascript:doDelete('{{ $data->pid }}')">刪除</a>
    <P></P>
</div>
@endforeach
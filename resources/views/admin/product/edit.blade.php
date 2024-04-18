<form method="post" action="../update" enctype="multipart/form-data">
    <input type="hidden" name="pid" value="{{ $product->pid }}">
    {{ csrf_field() }}  

    獎項:<input type="text" name="pname" value="{{ $product->pname }}"><br/>
    圖片:<input type="file" name="photo"><br/>

    @if(!empty($product->photo))
    原圖:<img src="/images/product/{{ $product->photo }}" width="100">
    @endif

    <br>
    <input type="submit" value="確定">
</form>
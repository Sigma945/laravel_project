<!-- 
    {{ csrf_field() }}使用在表單中
    產生token用來辨識使用者身分
    防止外來惡意攻擊
-->

<form method="post" action="insert" enctype="multipart/form-data">
    {{ csrf_field() }}  
    產品名稱:<input type="text" name="pname"><br/>
    圖檔:<input type="file" name="photo"><br/>
    <br>
    <input type="submit" value="確定">
</form>
<!-- 
    {{ csrf_field() }}使用在表單中
    產生token用來辨識使用者身分
    防止外來惡意攻擊
-->

<form method="post" action="insert" enctype="multipart/form-data">
    {{ csrf_field() }}  
    獎項:<input type="text" name="title"><br/>
    名額:<input type="text" name="number"><br/>
    內容:<input type="text" name="content" size="80"><br/>
    圖檔:<input type="file" name="photo"><br/>
    <br>
    <input type="submit" value="確定">
</form>
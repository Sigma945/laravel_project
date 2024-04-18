<!-- 
    {{ csrf_field() }}使用在表單中
    產生token用來辨識使用者身分
    防止外來惡意攻擊
-->

<form method="post" action="insert">
    {{ csrf_field() }}  
    標題:<input type="text" name="title"><br/>
    內容:<textarea cols="80" rows="5" name="content"></textarea>
    <br>
    <input type="submit" value="確定">
</form>
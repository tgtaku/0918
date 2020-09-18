<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>テスト</title>
    </head>
    <body>

    <form id="my_form">
    <input type="file" name="file_1[]" multiple="multiple" onchange="file_upload()">
    <button type="button" onclick="file_upload()">アップロード</button>
</form>
<script>
    function file_upload()
{
    // フォームデータを取得
    var formdata = new FormData(document.getElementById("my_form"));

    // XMLHttpRequestによるアップロード処理
    var xhttpreq = new XMLHttpRequest();
    xhttpreq.onreadystatechange = function() {
        if (xhttpreq.readyState == 4 && xhttpreq.status == 200) {
            alert(xhttpreq.responseText);
        }
    };
    xhttpreq.open("POST", "p_entry_report_place.php", true);
    xhttpreq.send(formdata);
}
</script>
    </body>

</html>
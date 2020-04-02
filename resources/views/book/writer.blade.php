<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
    作者添加页面
    <form action='{{url("book/add_do")}}' method="POST" enctype="multipart/form-data">
        <table >
            <tr>
                <td>作者姓名</td>
                <td><input type="text" name="writer"></td>
            </tr>
            <tr>
                <td>书籍名称</td>
                <td><input type="text" name="book_name"></td>
            </tr>
            <tr>
                <td>书籍分类</td>
                <td>
                    <select name="cate_id" id="">
                        <option value="">--请选择</option>
                        @foreach($cateData as $v)
                        <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>文章详情</td>
                <td><textarea name="book_detail" id="bjq" style="width:500px;height:200px;"></textarea></td>
            </tr>
            <tr>
                <td>点击添加</td>
                <td><input type="submit" value="作者添加"></td>
            </tr>
        </table>

    </form>
</body>
</html>
<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('bjq');
</script>
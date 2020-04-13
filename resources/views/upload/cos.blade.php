<form action="{{url('upload/cos')}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
文件：<input type="file" name="file" />
<input type="submit" value="上传"/>
</form>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <body>
<form action="{{url('codes/checkcode')}}" method="post">   
{{ csrf_field() }}    
<input type="text" name="captcha" class="form-control" style="width: 300px;">
<a onclick="javascript:re_captcha();" ><img src="{{ url('codes/code3') }}"  alt="load" title="loading" width="100" height="40" id="c2c98f0de5a04167a9e427d883690ff6" border="0"></a>
<input type="submit" value="submit"/>
</form> 
<script>  
  function re_captcha() {
    url = "{{ url('codes/code3') }}";
        url = url + "?s=" + Math.random();
        document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=url;
  }
</script>
</body>
</html>
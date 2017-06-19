<form enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    <input type="file" name="file" />
    <input type="submit" value="Go!" />
</form>
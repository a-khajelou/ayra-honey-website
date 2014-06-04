<html>
<head>
    <meta charset="utf-8">
    <title>Replace Textareas by Class Name &mdash; CKEditor Sample</title>
    <script src="/static/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="/static/ckeditor/sample.css">
</head>
<body>
<form action="/test/get" method="post">
    <p>
        <textarea class="ckeditor" cols="80" id="blog_post" name="blog_post" rows="10">
        </textarea>
    </p>
    <p>
        <input type="submit" value="Submit">
    </p>
</form>

<div>
    @if(isset($blogPost))
    {{$blogPost}}
    @endif
</div>

</body>
</html>

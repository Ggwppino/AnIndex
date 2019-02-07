<!DOCTYPE html>
<html>
<head>
    @include('ricurrent_item.head')
</head>
<body>
@include('ricurrent_item.header')

<div id="pagination">
    <print-anime :list-data="animes"/>
</div>
<script>
    var episodes = [];
</script>
@include('ricurrent_item.footer')
<script src="js/app.js" charset="utf-8" ></script>
<script>

</script>
</body>
</html>
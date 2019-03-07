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
@include('ricurrent_item.footer')
<script>

</script>

</body>
</html>
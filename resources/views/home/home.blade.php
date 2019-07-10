<!DOCTYPE html>
<html>
<head>
    @include('ricurrent_item.head')
</head>
<body>
<div id="barabba">
    @include('ricurrent_item.header')
    <div id="pagination">
        <print-anime :list-data="animes"></print-anime>
    </div>
    <script>
        var episodes = [];
    </script>
    <div id="push"></div>
</div>
@include('ricurrent_item.footer_min')
</body>
</html>
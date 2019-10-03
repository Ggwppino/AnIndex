<!DOCTYPE html>
<html>
<head>
    @include('ricurrent_item.head')
</head>
<body>
<div id="pagination" class="barabba">
    <layout>
        <new-episodes :list-data="animes"></new-episodes>
    </layout>
    <div id="push"></div>
</div>
@include('ricurrent_item.footer_min')
</body>
</html>
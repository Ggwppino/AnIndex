<!DOCTYPE html>
<html>
<head>
    @include('ricurrent_item.head')
</head>
<body>
<div class="barabba" id="paginationanime">
    <layout>
        <anime :anime="{{$episode}}"/>
    </layout>
    <div id="push"></div>
</div>

@include('ricurrent_item.footer_min')
<!--<script src="js/app.js" charset="utf-8"></script> -->
</body>
</html>
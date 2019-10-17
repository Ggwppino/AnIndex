<!DOCTYPE html>
<html>
<head>
    @include('ricurrent_item.head')
</head>
<body>
<div class="barabba" id="paginationfansub">
    <layout>
        <fansub :fansub="{{$fansub}}"/>
    </layout>
    <div id="push"></div>
</div>

@include('ricurrent_item.footer_min')
<!--<script src="js/app.js" charset="utf-8"></script> -->
</body>
</html>
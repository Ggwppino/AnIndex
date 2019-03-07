<!DOCTYPE html>
<html>
<head>
    @include('ricurrent_item.head')
    <style>


        .category_filter {
            margin: 4px;
            background-color: transparent;
            border-radius: 5px;
            border: 1px solid #6cb2eb;
            overflow: auto;
            color: #6cb2eb;
            float: left;
        }

        .category_filter label {
            float: left;
            min-width: 5.0em;
            height: auto;
            margin: 0;
        }

        .category_filter label span {
            text-align: center;
            padding: 3px 0;
            display: block;
        }

        .category_filter label input {
            position: absolute;
            visibility: hidden;
        }

        .category_filter input:hover + span {
            background-color: #e1e8eb;
        }

        .category_filter input:checked + span {
            background-color: #6cb2eb;
            color: #fff;
        }

        .category_filter input:checked:hover + span {
            background-color: #4ca6eb;
            color: #fff;
        }

    </style>
</head>
<body>
@include('ricurrent_item.header')
<div class="container">
    <h1>Create</h1>
    <nav>
        <div class="nav nav-tabs " id="nav-tab" role="tablist" style="width:60%">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
               aria-controls="nav-home" aria-selected="true">Anime</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
               aria-controls="nav-profile" aria-selected="false">Season</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
               aria-controls="nav-contact" aria-selected="false">Episode</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent" style="width:60%">

        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <form id="createAnime" method="post" action="{{route('create.anime')}}">
                @csrf
                <div class="form-group">
                    <label for="nomeinput">Name</label>
                    <input class="form-control" type="text" name="name" id="nomeinput">
                </div>
                <div class="form-group">
                    <label for="imginput">Img</label>
                    <input class="form-control" type="text" name="img" id="imginput">
                </div>
                <div class="form-group">
                    <label for="plot">Plot</label>
                    <textarea class="form-control" id="plot" name="plot" rows="5"></textarea>
                </div>
                <span>Categories</span>
                <div>
                    @foreach(App\Genre::all() as $category)
                        <div class="category_filter">
                            <label>
                                <input type="checkbox" name="genres[]"
                                       value="{{$category->id}}"><span class="px-2">{{$category->name}}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
                <button type="submit" form="createAnime" class="btn btn-primary" value="Submit">Create</button>
            </form>
        </div>


        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
    </div>
</div>


@include('ricurrent_item.footer')


</body>
</html>
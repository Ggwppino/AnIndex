<!DOCTYPE html>
<html>
<head>
    @include('ricurrent_item.head')
    <style>


        .category_filter {
            margin: 4px;
            background-color: transparent;
            border-radius: 4px;
            border: 1px solid #6cb2eb;
            overflow: auto;
            color: #6cb2eb;
            float: left;
        }

        .category_filter label {
            float: left;
            width: 5.0em;
            height: auto;
            margin: 0;
        }

        .category_filter label span {
            text-align: center;
            padding: 3px 0;
            display: block;
            border-radius: 4px;
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

<div class="card-deck mx-3 p-5">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top"  alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">
                Create Anime
            </button>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <img class="card-img-top"  alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal2">
                Create Anime
            </button>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal3">
                Create Anime
            </button>
        </div>
    </div>
</div>


@include('ricurrent_item.footer')



<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Create Anime</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                    <span>Categories</span>
                    <div>
                        @foreach(App\Genre::all() as $cat)
                            <div class="category_filter">
                                <label>
                                    <input type="checkbox" name="genres[]"
                                           value="{{$cat->id}}"><span>{{$cat->name}}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="createAnime" class="btn btn-primary" value="Submit">Create</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
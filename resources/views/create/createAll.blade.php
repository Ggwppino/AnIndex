<!DOCTYPE html>
<html>
<head>
    @include('ricurrent_item.head')
</head>
<body>
@include('ricurrent_item.header')
<div id="barabba"><h1>Create</h1>
    <div class="card-deck mx-3 p-5">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Create Anime</h5>
                <p class="card-text">Create an Anime instance with a standard form</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">
                    Create Anime
                </button>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Create Season</h5>
                <p class="card-text">Create a Season instance relatives an Anime</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal2">
                    Create Season
                </button>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Create Episode</h5>
                <p class="card-text">Create an Episode instance relatives a Season of Anime</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal3">
                    Create Episode
                </button>
            </div>
        </div>
    </div>
    <div id="push"></div>

</div>
@include('ricurrent_item.footer_min')



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
                <form id="createAnime" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nomeinput">Name</label>
                        <input class="form-control" type="text" name="name" id="nomeinput">
                    </div>
                    <div class="form-group">
                        <label for="imginput">Image Preview</label>
                        <input class="form-control" type="text" name="img" id="imginput">
                    </div>
                    <div class="form-group">
                        <label for="plotinput">Plot</label>
                        <textarea class="form-control" id="plotinput" rows="5" name="plot"></textarea>
                    </div>
                    <span>Categories</span>
                    <div class="container">
                        @foreach(App\Tag::all() as $cat)
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Create Season</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createSeason" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="animeinput">Name Anime</label>
                        <select class="form-control" id="animeinput" name="anime">
                            @foreach(App\Anime::all() as $anime)
                                <option value="{{$anime->id}}">{{$anime->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nomeinput">Name Season</label>
                        <input class="form-control" type="text" name="name" id="nomeinput">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="createSeason" class="btn btn-primary" name="Submit">Create Season</button>
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
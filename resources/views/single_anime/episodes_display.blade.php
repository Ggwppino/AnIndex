<div class="container" id="slotanime">
    <h3 class="my-3">EPISODES</h3>
    <div class="card-deck">
        @for($i=1;$i<=12;$i++)
            <div class="card my-4 animecard">
                <div class="displayedimage"></div>
                <h4><span class="badge badge-primary episode-anime">Ep {{$i}}</span></h4>
            </div>
        @endfor
    </div>
</div>

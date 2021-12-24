<div class="charts">
    <h1>Bảng Xếp Hạng</h1>
    <hr>
    <div class="ranking">
        @foreach($songs as $key =>$song)
        @if($key == 0)
        <div class="song-ranking">
            <span style="color: rgb(6, 134, 238);">{{$key+1}}</span>
            <div class="info">
                <button class="play-song">
                    <img src="{{$song->sphoto}}" alt="img-song">
                </button>
                <div>
                    <a href="" class="song-name">{{$song->sname}}</a>
                    <a href="" class="singer-name">{{$song->siname}}</a>
                </div>
            </div>
            <div class="action-song">
                <button>
                    <i class="bi bi-plus-circle"></i>
                </button>
            </div>
        </div>
        @endif
        @if($key == 1)
        <div class="song-ranking">
            <span style="color: rgb(79, 238, 6);">{{$key+1}}</span>
            <div class="info">
                <button class="play-song">
                    <img src="{{$song->sphoto}}" alt="img-song">
                </button>
                <div>
                    <a href="" class="song-name">{{$song->sname}}</a>
                    <a href="" class="singer-name">{{$song->siname}}</a>
                </div>
            </div>
            <div class="action-song">
                <button>
                    <i class="bi bi-plus-circle"></i>
                </button>
            </div>
        </div>
        @endif
        @if($key == 2)
        <div class="song-ranking">
            <span style="color: rgb(238, 6, 6);">{{$key+1}}</span>
            <div class="info">
                <button class="play-song">
                    <img src="{{$song->sphoto}}" alt="img-song">
                </button>
                <div>
                    <a href="" class="song-name">{{$song->sname}}</a>
                    <a href="" class="singer-name">{{$song->siname}}</a>
                </div>
            </div>
            <div class="action-song">
                <button>
                    <i class="bi bi-plus-circle"></i>
                </button>
            </div>
        </div>
        @endif
        @if($key > 2)
        <div class="song-ranking">
            <span>{{$key+1}}</span>
            <div class="info">
                <button class="play-song">
                    <img src="{{$song->sphoto}}" alt="img-song">
                </button>
                <div>
                    <a href="" class="song-name">{{$song->sname}}</a>
                    <a href="" class="singer-name">{{$song->siname}}</a>
                </div>
            </div>
            <div class="action-song">
                <button>
                    <i class="bi bi-plus-circle"></i>
                </button>
            </div>
        </div>
        @endif
        @endforeach

    </div>
</div>
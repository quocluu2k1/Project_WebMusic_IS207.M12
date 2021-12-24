        <div class="search-result" id="search-result">
            <div class="title">
                <h1>Kết Quả Tìm Kiếm</h1>
                <span>|</span>
                <a class="song-result action-result">Bài Hát</a>
                <a class="singer-result">Ca Sĩ</a>
                <a class="genre-result">Thể Loại</a>
            </div>
            <hr>
            <!-- <h2>Bài Hát</h2>  -->
            
            <div class="result">
                @foreach($resultSong as $song)
                <div class="song-result">
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
                @endforeach
            </div>





        </div>
        <script src='/js/SearchScript.js'></script>
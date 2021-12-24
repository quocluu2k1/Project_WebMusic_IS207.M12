<div class="genre">
            <h1>Thể Loại Nhạc</h1>
            <hr>
            <div class="list-genres">
                @foreach($genres as $genre)
                <a href="">
                    <img src="{{$genre->cphoto}}" alt="genre-img">
                    <div>
                        <h3 class="genre-name">{{$genre->cname}}</h3>
                        <p class="genre-description">{{$genre->cdescription}}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
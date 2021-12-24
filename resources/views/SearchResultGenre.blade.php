<div class="result3">
    @foreach($resultGenre as $genre)
    <a href="">
        <img src="{{$genre->cphoto}}" alt="genre-img">
        <div>
            <h3 class="genre-name">{{$genre->cname}}</h3>
            <p class="genre-description">{{$genre->cdescription}}</p>
        </div>
    </a>
    @endforeach
</div>
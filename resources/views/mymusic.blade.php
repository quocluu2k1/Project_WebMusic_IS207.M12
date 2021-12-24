

 <div class="individual">
            <img src="{{$user->avatar}}" alt="">
            <h3>{{$user->name}}</h3>
            <hr>
            <span>PLAYLIST | ALBUM</span>
            @foreach($playlists as $playlist)
            <div class="myplaylist" id="myplaylist">
                <button value="{{$playlist->pid}}"><img src="{{$playlist->pphoto}}" alt=""></button>
                <a href="">{{$playlist->pname}}</a>
            </div>
            @endforeach
            
</div>
<!-- <script src='/js/script.js'></script> -->
<script src='/js/MyMusicScript.js'></script>

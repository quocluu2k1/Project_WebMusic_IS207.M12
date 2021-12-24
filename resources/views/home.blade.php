

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Web Music</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='/js/script.js'></script>
    <link rel="stylesheet" href="/css/HomeStyle.css">
    <link rel="stylesheet" href="/css/IndividualStyle.css">
    <link rel="stylesheet" href="/css/GenreStyle.css">
    <link rel="stylesheet" href="/css/ChartStyle.css">
    <link rel="stylesheet" href="/css/SearchResultStyle.css">
    <link rel="stylesheet" href="/css/SingerDetailStyle.css">
    <link rel="stylesheet" href="/css/SongDetailStyle.css">
    <link rel="stylesheet" href="/css/PlaylistDetailStyle.css">
    <script src='/js/HomeScript.js'></script>
    <script src='/js/SearchScript.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

    <!-- ---------------- -->
    <aside class="sidebar">
        <div class="logo">
            <div class="brand">
                <button class="logo-btn">
                    <div class="logo-img">
                        <img class="logo-img1" src="Logo34.png" alt="Logo-Music">
                    </div>
                </button>
            </div>
        </div>
        <nav class="navbar">
            <ul class="menu" id="menu">
                <li class="is-active" id="home">
                    <a href="/">
                        <i class="bi bi-house-door-fill"></i>
                        <span>Trang Chủ</span>
                    </a>
                </li>
                <li id="mymusic">
                    <a>
                        <i class="bi bi-person-lines-fill"></i>
                        <span>Cá Nhân</span>
                    </a>
                </li>
                <li id="genre">
                    <a>
                        <i class="bi bi-grid"></i>
                        <span>Thể Loại</span>
                    </a>
                </li>
                <li id="rank">
                    <a>
                        <i class="bi bi-bar-chart"></i>
                        <span>BXH</span>
                    </a>
                </li>
            </ul>
        </nav>
        <hr class="divide-navbar">
        <div class="createplaylist">
            <button class="createplaylist-btn">
                <i class="bi bi-plus-circle"></i>
                <span>Tạo Playlist Mới</span>
            </button>
        </div>
    </aside>

    <!-- ---------------- -->
    <div class="header">
        <form class="formsearch">
            <div class="search-input">
                <input type="text" name="keyword" placeholder="Nhập tên bài hát, ca sĩ hoặc album..." class="search-input-text" id="search-input-text" value>
            </div>           
            <button class="search-btn" type="submit" id="search-btn">
                <i class="bi bi-search"></i>
                <span>Tìm Kiếm</span>
            </button>
        </form>
        <div class="admin">
            <button class="admin-btn">
                <i class="bi bi-person-rolodex"></i>
                <span>Quản Trị</span>
            </button>
        </div>
        <div class="userprofile">
            <div class="userprofile-item">
                <div class="userprofile-thumbnail">
                    <img src="{{$user->avatar}}" alt="avatar-user" class="userprofile-avatar">
                </div>
                <div class="userprofile-info">
                    <h3 class="userprofile-name">{{$user->name}}</h3>
                </div>
                <i class="bi bi-caret-down-fill expand-user"></i>
            </div>
            <div class="user_control"></div>
            <div class="dropdown-options">
                <a>Trang cá nhân</a>
                <a href="">Tài khoản</a>
                <a href="{{ route('logout') }}">Đăng xuất</a>
            </div>
        </div>
    </div>
    
    <!-- ---------------- -->
    <div style="text-align: center;" class="content" id="content">

        <h1>Trang Chủ</h1>
        <hr>
        <div class="owl-carousel owl-theme">
            <div class="item"><img src="carousel/1.jpg" alt=""></div>
            <div class="item"><img src="carousel/2.jpg" alt=""></div>
            <div class="item"><img src="carousel/3.jpg" alt=""></div>
            <div class="item"><img src="carousel/4.jpg" alt=""></div>
        </div>
        <script>
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                dots: true,
                nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                }
            })
            
        </script>
        <div class="new-song">
            <h2>Bài Hát Mới Nhất</h2>
            <div class="list-song">
                @foreach($newestSong as $song)
                <div class="song">
                    <button>                        
                        <img src="{{$song->sphoto}}" alt="song-img">
                    </button>
                    <div class="song-info">
                        <a href="" class="song-name">{{$song->sname}}</a>
                        <a href="" class="singer-name">{{$song->siname}}</a>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
        <div class="famous-song">
            <h2>Những Bài Hát Được Nghe Nhiều Nhất</h2>
            <div class="list-song">
                @foreach($top5Song as $song)
                <div class="song">
                    <button>                        
                        <img src="{{$song->sphoto}}" alt="song-img">
                    </button>
                    <div class="song-info">
                        <a href="" class="song-name">{{$song->sname}}</a>
                        <a href="" class="singer-name">{{$song->siname}}</a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="featured-singer">
            <h2>Ca Sĩ Nổi Bật</h2>
            <div class="list-singer">
                @foreach($featuredSinger as $singer)
                <div class="singer">
                    <img src="{{$singer->siphoto}}" alt="">
                    <a href="">{{$singer->siname}}</a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="news">
            <h2>Tin Tức Âm Nhạc</h2>
            <div class="content-news">
                <img src="img-news/news.jpg" alt="">
                <p>Nhạc sĩ người Mông Cổ giành giải đặc biệt cuộc thi 'Hát lên Việt Nam': Tác phẩm 'Mời bạn tới thăm chốn này, Việt Nam luôn đón chào' của nhạc sĩ, nhà soạn nhạc người Mông Cổ Ariunbold Dashdorj khiến nhiều người Việt Nam phải xúc động.</p>
            </div>
            <div class="content-news">
                <img src="img-news/news2.jpg" alt="">
                <p>Mỹ Tâm ‘chơi lớn’ với chuỗi đêm nhạc trực tuyến: Mỹ Tâm chính thức công bố chuỗi đêm nhạc trực tuyến “My Soul 1981” với đa dạng sắc màu âm nhạc khác nhau sau khi phải hoãn liveshow Tri âm ở Hà Nội vì dịch Covid-19. Sau hơn 20 năm hoạt động âm nhạc, Mỹ Tâm vẫn giữ được sức nóng từ khán giả và giới showbiz Việt. Đây là lần đầu tiên nữ ca sĩ tổ chức một chuỗi đêm nhạc trực tuyến sau khi tổ chức được liveshow kỷ niệm Tri âm tại TP.HCM nhưng phải hoãn lại liveshow tại Hà Nội vì dịch Covid-19 diễn biến phức tạp. Chuỗi đêm nhạc Acoustic & Lofi - Chill trực tuyến mang tên “My Soul 1981” Unstaged Live Music là nơi nữ ca sĩ gặp gỡ, hát và "chill" cùng khán giả trong 6 đêm nhạc đặc biệt với nhiều cung bậc cảm xúc và màu sắc riêng biệt. Mỹ Tâm sẽ thể hiện những ca khúc đình đám trước đây cho đến những ca khúc sau này, mỗi đêm nhạc cô sẽ trình diễn một ca khúc mới.</p>
            </div>
        </div>
        

        
        <!-- <div class="singer-detail">
            <div class="info-singer">
                <div>
                    <img src="img-singer/SonTung.jpg" alt="img-singer">
                    <h1>Sơn Tùng M-TP</h1>
                </div>
                <p>M-TP tên thật là Nguyễn Thanh Tùng. Cậu thanh niên sinh năm 1994 ở Thái Bình sớm bị hip hop hớp hồn giống như bao bạn bè đồng trang lứa. Có chất giọng cao luyến láy cùng những bản hit R&amp;B hay Dance Pop, Sơn Tùng M-TP là ca sĩ rất thành công, không chỉ nổi tiếng ở Việt Nam mà còn được khán giả yêu nhạc Việt trên thế giới biết đến.</p>
            </div>
            <div class="listsong-singer">
                <div>
                    <button>
                        <img src="img-song/ChungTaCuaHienTai-SonTung.jpg" alt="img-song">
                    </button>
                    <a href="">Chúng Ta Của Hiện Tại</a>
                </div>
                <div>
                    <button>
                        <img src="img-song/ChungTaCuaHienTai-SonTung.jpg" alt="img-song">
                    </button>
                    <a href="">Chúng Ta Của Hiện Tại</a>
                </div>
                <div>
                    <button>
                        <img src="img-song/ChungTaCuaHienTai-SonTung.jpg" alt="img-song">
                    </button>
                    <a href="">Chúng Ta Của Hiện Tại</a>
                </div>
                
            </div>
        </div> -->


        <!-- <div class="song-detail">
            <div>
                <img src="img-song/ChungTaCuaHienTai-SonTung.jpg" alt="img-song">
                <button>
                    <i class="bi bi-play-fill"></i>
                </button>
            </div>
            <div class="song-info">
                <h1 style="color: rgb(0, 132, 255);">Chúng Ta Của Hiện Tại</h1>
                <h2>Ca sĩ: Sơn Tùng M-TP</h2>
                <h2>Thể loại: Nhạc Trẻ</h2>
                <h3>Số lượt nghe: 273590</h3>
            </div>
        </div> -->


        <!-- <div class="playlist-detail">
            <div class="playlist-info">
                <img src="img-playlist/playlist1.jpg" alt="">
                <h2>Nhạc Chill Cuối Tuần</h2>
            </div>
            <div class="list-song">
                <div class="song">
                    <div class="info">
                        <button class="play-song">
                            <img src="img-song/ChungTaCuaHienTai-SonTung.jpg" alt="img-song">
                        </button>
                        <div>
                            <a href="" class="song-name">Chúng Ta Của Hiện Tại</a>
                            <a href="" class="singer-name">Sơn Tùng M-TP</a>
                        </div>
                    </div>
                </div>
                <div class="song">
                    <div class="info">
                        <button class="play-song">
                            <img src="img-song/ChungTaCuaHienTai-SonTung.jpg" alt="img-song">
                        </button>
                        <div>
                            <a href="" class="song-name">Chúng Ta Của Hiện Tại</a>
                            <a href="" class="singer-name">Sơn Tùng M-TP</a>
                        </div>
                    </div>
                </div> 
                <div class="song">
                    <div class="info">
                        <button class="play-song">
                            <img src="img-song/ChungTaCuaHienTai-SonTung.jpg" alt="img-song">
                        </button>
                        <div>
                            <a href="" class="song-name">Chúng Ta Của Hiện Tại</a>
                            <a href="" class="singer-name">Sơn Tùng M-TP</a>
                        </div>
                    </div>
                </div> 
                <div class="song">
                    <div class="info">
                        <button class="play-song">
                            <img src="img-song/ChungTaCuaHienTai-SonTung.jpg" alt="img-song">
                        </button>
                        <div>
                            <a href="" class="song-name">Chúng Ta Của Hiện Tại</a>
                            <a href="" class="singer-name">Sơn Tùng M-TP</a>
                        </div>
                    </div>
                </div>                
            </div>
        </div> -->



        
    </div>
    <div class="show-lyrics" id="show-lyrics">
        <div class="lyric-content">
            <p style="color: red;">Lời bài hát</p>
            @foreach($songDefault as $song)
            <div id="lyrics-song">{{$song->lyrics}}</div>
            @endforeach
            <!-- <p>Thương thì thương thế thôi</p>
            <p>Biết bao đêm dài lòng anh ngóng chông</p> 
            <p>Ở nơi, phía xa xa đại dương</p> 
            <p>Trái đất vẫn xoay, vẫn xoay tròn hai người yêu nhau</p> 
            <p>Chờ mong đến một ngày thuộc về nhau</p> 
            <p>Anh vẫn đứng đây bên khung cửa sổ</p> 
            <p>Anh vẫn đứng đây chờ nắng lên</p> 
            <p>Còn em giờ đang nơi đâu</p> 
            <p>Có thấy thấy chăng mùa nắng đã ghé vai gầy</p> 
            <p>Người yêu hỡi anh nhớ tiếng em à ơi</p>
            <p>Gió vẫn hát thành lời</p>
            <p>Mặc kệ mây, mây bay về trời</p>
            <p>Ở nơi ấy, gió lay buồn biết bao nhiêu</p>
            <p>Những nỗi nhớ một thời</p>
            <p>Người đi xa bên hiên sao không về đây?</p>
            <p>Người yêu hỡi! Hãy quay về với anh</p>
            <p>Bao ngày anh ngóng trông</p>
            <p>Đã bao đêm rồi anh vẫn ngóng trông</p>
            <p>Ở nơi ấy phía xa xa trùng mây</p>
            <p>Bao lời anh hát lên</p>
            <p>Trái tim anh dành trao đến em</p>
            <p>Người yêu hỡi! Anh yêu riêng mình em thôi</p>
            <p>Gió vẫn hát thành lời</p>
            <p>Mặc kệ mây, mây bay về trời</p>
            <p>Ở nơi ấy, gió lay buồn biết bao nhiêu</p>
            <p>Những nỗi nhớ một thời</p>
            <p>Người đi đi xa bên hiên sao không về đây?</p>
            <p>Người yêu hỡi! Hãy quay về với anh</p>
            <p>Ta-da-da-da hah-hah-hahh</p>
            <p>Tình yêu ây anh vẫn chỉ dành trao</p>
            <p>Riêng em mà thôi</p>
            <p>Dù ngày mai bão giông ngập trời</p>
            <p>Thì tình anh trao em mãi mãi</p>
            <p>Người yêu hỡi! Anh chỉ yêu riêng mình em thôi</p>
            <p>Gió vẫn hát thành lời</p>
            <p>Mặc kệ mây, mây mây bay về trời</p>
            <p>Ở nơi ấy, gió lay buồn biết bao nhiêu</p>
            <p>Những nỗi nhớ một thời</p>
            <p>Người đi xa bên hiên sao không về đây?</p>
            <p>Người yêu hơi! Hãy quay về với anh</p>
            <p>Người yêu hỡi! Hãy quay về với anh</p>    -->
        </div>
        
    </div>
    <div class="model-create-playlist">
        
    </div>
    
    <div id="modal-add_to_playlist" class="modal-add_to_playlist">

        <!-- Modal content -->
        <div class="modal-addplaylist-content">
          <span class="close-addplaylist" id="close-addplaylist">&times;</span>
          <p class="text">Thêm vào playlist</p>
          <button class="createplaylist_other">
              <i class="bi bi-plus-circle"></i>
              <span>Tạo playlist mới</span>
          </button>
          <div class="playlist-content">
            <ul class="menu-playlist" id="menu-playlist">
                @foreach($playlists as $playlist)
                <li>
                    <button value="1">
                        <i class="bi bi-music-note-list"></i>
                        <span>{{$playlist->pname}}</span>
                    </button>
                </li>
                @endforeach
            </ul>
          </div>         
        </div>
      
      </div>

      <div id="model-comment-song" class="model-comment-song">
        <div class="modal-comment-content">
            <span class="close-comment" id="close-comment">&times;</span>
            <p class="title">Bình Luận</p>
            <hr>
            <div class="number_of_comments" id="number_of_comments">2 Bình luận</div>
            <div class="comment-content" id="comment-content">
                <div class="comment_of_song">
                    <img src="Avatar-Default.jpg" alt="user-image" class="avatar-user-comment">
                    <div>
                        <span class="username-comment">Nguyễn Văn A</span>
                        <div class="content-user-comment">Bài hát hay quá!!!</div>
                    </div>               
                </div>
                <div class="comment_of_song">
                    <img src="Avatar-Default.jpg" alt="user-image" class="avatar-user-comment">
                    <div>
                        <span class="username-comment">Nguyễn Văn B</span>
                        <div class="content-user-comment">Bài hát xứng đáng được top1 bxh :)))</div>
                    </div>               
                </div>
            </div>
            <div class="form-comment">
                <input type="text" placeholder="Nhập bình luận..." class="input-comment" id="input-comment">
                <button class="submit-comment" id="submit-comment">Xác Nhận</button>
            </div>
        </div>
      </div>
    <!-- ---------------- -->
    <div class="player-controls">
        <div class="media">
            @foreach($songDefault as $song)
            <div class="media-left">
                <a href="">
                    <img src="{{$song->sphoto}}" alt="" class="baihat-img active-CD" id="CD-Song">
                </a>               
            </div>
            <div class="media-content" id="media-content">        
                <a href=""><h3 class="song-info">{{$song->sname}}</h3></a>
                <a href=""><span class="singer-info">{{$song->siname}}</span></a>
            </div>
            @endforeach 
            <div class="media-right">
                <button class="favorite-song" id="favorite-song">
                    <i class="bi bi-heart" id="favorite-song-i"></i>
                </button>
                <div class="tooltip-favorite">Yêu thích</div>
                <button class="comment-song" id="comment-song">
                    <i class="bi bi-chat-dots" id="comment-song-i"></i>
                </button>
                <span class="tooltip-comment">Bình luận</span>
                <button class="addtoplaylist-btn" id="addtoplaylist-btn">
                    <i class="bi bi-plus-circle"></i>
                </button>
                <span class="tooltiptext">Thêm vào playlist</span>
            </div>
        </div>
        <div class="controlbar-flashplayer">
            <div class="actions">
                <button class="shuffle-btn" id="shuffle-btn">
                    <i class="bi bi-shuffle" id="shuffle-i"></i>
                </button>
                <button class="pre-btn" id="pre-btn">
                    <i class="bi bi-skip-start-fill"></i>
                </button>
                <button class="play-btn">
                    <i class="bi bi-play-circle" id="playmusic-btn"></i>
                </button>
                <button class="next-btn" id="next-btn">
                    <i class="bi bi-skip-end-fill"></i>
                </button>
                <button class="repeat-btn" id="repeat-btn">
                    <i class="bi bi-arrow-repeat" id="repeat-i"></i>
                </button>
            </div>
            <div class="music-time">
                <span class="current-time" id="current-time">00:00</span>
                <input type="range" value="0" class="time-sliderbar" id="time-sliderbar" min="0" max="1000">                
                <span class="song-time" id="song-time">04:23</span>
            </div>
        </div>
        <div class="controlbar-musicinfo">
            <button class="showlyric-btn" id="showlyric-btn">
                <svg style="fill: #dadada" xmlns="" width="22" height="22" viewBox="0 0 24 24" id="show-lyrics-svg">
                    <path d="M15.526 11.409c-1.052.842-7.941 6.358-9.536 7.636l-2.697-2.697 7.668-9.504 4.565 4.565zm5.309-9.867c-2.055-2.055-5.388-2.055-7.443 0-1.355 1.356-1.47 2.842-1.536 3.369l5.61 5.61c.484-.054 2.002-.169 3.369-1.536 2.056-2.055 2.056-5.388 0-7.443zm-9.834 17.94c-2.292 0-3.339 1.427-4.816 2.355-1.046.656-2.036.323-2.512-.266-.173-.211-.667-.971.174-1.842l-.125-.125-1.126-1.091c-1.372 1.416-1.129 3.108-.279 4.157.975 1.204 2.936 1.812 4.795.645 1.585-.995 2.287-2.088 3.889-2.088 1.036 0 1.98.464 3.485 2.773l1.461-.952c-1.393-2.14-2.768-3.566-4.946-3.566z"/>
                </svg>
            </button>
            <div class="player-volume">
                <button class="volume-btn">
                    <i class="bi bi-volume-up" id="volume-btn"></i>
                </button>
                <input type="range" value="70" class="volume-sliderbar" min="0" max="100" id="volume-sliderbar"> 
            </div>
            <div class="divide"><i class="bi bi-grip-horizontal icon-90deg" style="font-size:2.5em"></i></div>
                        
            <button class="expand_playlists-btn" id="expand_playlists-btn">
                <i class="bi bi-music-note-list" id="expand_playlists-i"></i>
            </button>

            <!-- div show playlist details -->
            <div class="show-playlist" id="show-playlist">
                <div class="title">
                    <span>Danh sách phát</span>
                </div> 
                <div class="list_of_song" id="list_of_song">
                    <!-- <div class="song_of_playlist">
                        <button class="playsong-playlist">
                            <img src="EmLaConThuyenCoDon-ImgSong.jpg" alt="baihat">
                        </button>
                        <div class="info_song-playlist">
                            <span class="song-name-playlist">Em Là Con Thuyền Cô Đơn</span>
                            <span class="singer-name-playlist">Thái Học</span>
                        </div>
                    </div>
                    <div class="song_of_playlist active-song_of_playlist">
                        <button class="playsong-playlist">
                            <img src="GioVanHat-imgSong.jpg" alt="baihat">
                        </button>
                        <div class="info_song-playlist">
                            <span class="song-name-playlist">Gió Vẫn Hát</span>
                            <span class="singer-name-playlist">Hương Ly</span>
                        </div>
                    </div> -->
                    
                </div>                               
            </div>
        </div>
    </div> 
    @foreach($songDefault as $song)
    <div id="song-default" hidden>{{$song->url}}</div>
    @endforeach
    <div class="notify hide-notify" id="notify">
        <i class="bi bi-check-circle"></i>
        <p class="message-content">Thêm vào playlist thành công</p>
        <span class="close-notify" id="close-notify">&times;</span>
    </div>
</body>
</html>

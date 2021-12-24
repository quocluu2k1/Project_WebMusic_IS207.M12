@extends('home')
@session('contents')
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
                <div class="song">
                    <button>                        
                        <img src="GioVanHat-imgSong.jpg" alt="song-img">
                    </button>
                    <div class="song-info">
                        <a href="" class="song-name">Gió Vẫn Hát</a>
                        <a href="" class="singer-name">Hương Ly</a>
                    </div>
                </div>
                <div class="song">
                    <button>                       
                        <img src="GioVanHat-imgSong.jpg" alt="song-img">
                    </button>
                    <div class="song-info">
                        <a href="" class="song-name">Gió Vẫn Hát</a>
                        <a href="" class="singer-name">Hương Ly</a>
                    </div>
                </div>
                <div class="song">
                    <button>                       
                        <img src="GioVanHat-imgSong.jpg" alt="song-img">
                    </button>
                    <div class="song-info">
                        <a href="" class="song-name">Gió Vẫn Hát</a>
                        <a href="" class="singer-name">Hương Ly</a>
                    </div>
                </div>
                <div class="song">
                    <button>                       
                        <img src="GioVanHat-imgSong.jpg" alt="song-img">
                    </button>
                    <div class="song-info">
                        <a href="" class="song-name">Gió Vẫn Hát</a>
                        <a href="" class="singer-name">Hương Ly</a>
                    </div>
                </div>
                <div class="song">
                    <button>                       
                        <img src="GioVanHat-imgSong.jpg" alt="song-img">
                    </button>
                    <div class="song-info">
                        <a href="" class="song-name">Gió Vẫn Hát</a>
                        <a href="" class="singer-name">Hương Ly</a>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="famous-song">
            <h2>Những Bài Hát Được Nghe Nhiều Nhất</h2>
            <div class="list-song">
                <div class="song">
                    <button>                        
                        <img src="GioVanHat-imgSong.jpg" alt="song-img">
                    </button>
                    <div class="song-info">
                        <a href="" class="song-name">Gió Vẫn Hát</a>
                        <a href="" class="singer-name">Hương Ly</a>
                    </div>
                </div>
                <div class="song">
                    <button>                        
                        <img src="GioVanHat-imgSong.jpg" alt="song-img">
                    </button>
                    <div class="song-info">
                        <a href="" class="song-name">Gió Vẫn Hát</a>
                        <a href="" class="singer-name">Hương Ly</a>
                    </div>
                </div>
                <div class="song">
                    <button>                        
                        <img src="GioVanHat-imgSong.jpg" alt="song-img">
                    </button>
                    <div class="song-info">
                        <a href="" class="song-name">Gió Vẫn Hát</a>
                        <a href="" class="singer-name">Hương Ly</a>
                    </div>
                </div>
                <div class="song">
                    <button>                        
                        <img src="GioVanHat-imgSong.jpg" alt="song-img">
                    </button>
                    <div class="song-info">
                        <a href="" class="song-name">Gió Vẫn Hát</a>
                        <a href="" class="singer-name">Hương Ly</a>
                    </div>
                </div>
                <div class="song">
                    <button>                        
                        <img src="GioVanHat-imgSong.jpg" alt="song-img">
                    </button>
                    <div class="song-info">
                        <a href="" class="song-name">Gió Vẫn Hát</a>
                        <a href="" class="singer-name">Hương Ly</a>
                    </div>
                </div>
                

            </div>
        </div>
        <div class="featured-singer">
            <h2>Ca Sĩ Nổi Bật</h2>
            <div class="list-singer">
                <div class="singer">
                    <img src="img-singer/SonTung.jpg" alt="">
                    <a href="">Sơn Tùng - MTP</a>
                </div>
                <div class="singer">
                    <img src="img-singer/SonTung.jpg" alt="">
                    <a href="">Sơn Tùng - MTP</a>
                </div>
                <div class="singer">
                    <img src="img-singer/SonTung.jpg" alt="">
                    <a href="">Sơn Tùng - MTP</a>
                </div>
                <div class="singer">
                    <img src="img-singer/SonTung.jpg" alt="">
                    <a href="">Sơn Tùng - MTP</a>
                </div>
                <div class="singer">
                    <img src="img-singer/SonTung.jpg" alt="">
                    <a href="">Sơn Tùng - MTP</a>
                </div>
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
@session_commit
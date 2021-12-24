var isRandom = false;
var isRepeat = false;
var stateShowLyric = false;
var stateExpandPlaylists = false;
var isVolume = $('#volume-sliderbar').val();
var statefavoriteSong = false;
var stateCommentSong = false;
var numberOfComments = 2;
var currentSong;

$(document).ready(function(){   
    // var myAudio = new Audio('audio/Gio-Van-Hat-Huong-Ly.mp3');
    var myAudio = new Audio();
    // myAudio.src = $('#song-default').text();

    $('#search-btn').click(function(event){
        $keyword = $('#search-input-text').val();
        event.preventDefault();
        var keyword = $('#search-input-text').val();
        if(keyword){
            $.ajax({
                type: "GET",
                url: "/search",
                data: {keyword: keyword},
                dataType: "html",
                success: function (response) {
                    $('#content').empty(); 
                    $('#content').append(response); 
                }
            });
        }
         
    });

    $('#menu li').click(function(){
        $('#menu li').removeClass("is-active");
        $(this).addClass("is-active");
    });
    $('#mymusic').click(function(){
        $.ajax({
            type: "get",
            url: "mymusic",
            data: "",
            dataType: "html",
            success: function (response) {
                $('#content').empty(); 
                $('#content').append(response); 
            }
        });
    });
    $('#mymusic-dropdown').click(function(){
        $.ajax({
            type: "get",
            url: "mymusic",
            data: "",
            dataType: "html",
            success: function (response) {
                $('#content').empty(); 
                $('#content').append(response); 
            }
        });
    });
    $('#genre').click(function(){
        $.ajax({
            type: "get",
            url: "genre",
            data: "",
            dataType: "html",
            success: function (response) {
                $('#content').empty(); 
                $('#content').append(response); 
            }
        });
    });
    $('#rank').click(function(){
        $.ajax({
            type: "get",
            url: "rank",
            data: "",
            dataType: "html",
            success: function (response) {
                $('#content').empty(); 
                $('#content').append(response); 
            }
        });
    });

    //event click button to show playlist
    $("#expand_playlists-btn").click(function(){
        stateExpandPlaylists = ! stateExpandPlaylists;
        if(stateExpandPlaylists){
            $("#show-playlist").animate({
                width: '22.2%'
            });
            $('#expand_playlists-i').css("color","#1c86dd"); 
        }else{
            $("#show-playlist").animate({
                width: '0'
            });
            $('#expand_playlists-i').css("color","#dadada");
        }
        
    });

    //event change slider volume
    $('#volume-sliderbar').on('input', function (){
        let valueOfVolume = $('#volume-sliderbar').val();
        let volumeButton = $('#volume-btn');
        myAudio.volume = valueOfVolume/100;
        if(valueOfVolume<=0){            
            volumeButton.removeClass("bi-volume-up").addClass("bi-volume-mute");
            volumeButton.removeClass("bi-volume-down").addClass("bi-volume-mute");
        }else if(valueOfVolume<50){
            volumeButton.removeClass("bi-volume-up").addClass("bi-volume-down");
            volumeButton.removeClass("bi-volume-mute").addClass("bi-volume-down");
        }else{
            volumeButton.removeClass("bi-volume-mute").addClass("bi-volume-up");
            volumeButton.removeClass("bi-volume-down").addClass("bi-volume-up");
        }
    });

    //event click button add playlist
    $('#addtoplaylist-btn').click(function(){
        $('#modal-add_to_playlist').show();
    });
    $('#close-addplaylist').click(function () {
        $('#modal-add_to_playlist').hide();
    });
    $(window).on('click', function (e) {
        if ($(e.target).is('#modal-add_to_playlist')) {
            $('#modal-add_to_playlist').hide();
        }
    });

    //set time of song
    var timeOfSong
    myAudio.onloadeddata = function(){
        timeOfSong = Math.floor(myAudio.duration);
        $('#song-time').text(convertNumberToTime(timeOfSong));
    };

    //function convert number second to time
    function convertNumberToTime(numberOfSeconds){
        let minutes = Math.floor(numberOfSeconds/60);
        let seconds = numberOfSeconds - minutes*60;
        if(seconds<10){
            seconds = "0" + seconds;
        }
        if(minutes<10){
            minutes = "0" + minutes;
        }
          return minutes+":"+seconds;
    }
      
    //function convert time to value of input range
    function convertTimeToValueRange(numberOfSeconds){
        numberOfSeconds = numberOfSeconds*10;
        numberOfSeconds = Math.floor(numberOfSeconds);
        return (numberOfSeconds/timeOfSong)*100;
    }
    //update current time of audio and slider time
    // myAudio.ontimeupdate = function() {
    //     let numberOfSeconds = Math.round(myAudio.currentTime);
    //     let time = convertNumberToTime(numberOfSeconds);
    //     $('#current-time').text(time);
    //     $('#time-sliderbar').val(convertTimeToValueRange(myAudio.currentTime));  
    //     // console.log($('#time-sliderbar').val());
    //     if($('#time-sliderbar').val()==1000){
    //         myAudio.pause();
    //         $('#playmusic-btn').removeClass("bi-pause-circle").addClass("bi-play-circle");
    //         if(isRepeat){
    //             myAudio.play();
    //             myAudio.currentTime = 0;
    //             $('#playmusic-btn').removeClass("bi-play-circle").addClass("bi-pause-circle");
    //         }else{
    //             $('#CD-Song').css("animation-play-state","paused");
    //         }
    //     }     
    // };
      
    //event on change slider time
    // $('#time-sliderbar').on('input', function (){
    //     let valueOfSlider = $('#time-sliderbar').val();
    //     let time = (valueOfSlider*timeOfSong)/1000;
    //     myAudio.currentTime = time;        
    // });

    $('#favorite-song').click(function(){
        let favoriteSong = $('#favorite-song-i');
        statefavoriteSong = !statefavoriteSong;
        if(statefavoriteSong){
            favoriteSong.removeClass("bi-heart").addClass("bi-heart-fill");
        }else{
            favoriteSong.removeClass("bi-heart-fill").addClass("bi-heart");
        }
    });

    $.getJSON("comment-song.json",function(data){
        $(data).each(function(key, value){
            let appendComments = '<div class="comment_of_song">' +
                                    '<img src="'+value.avatar+'" alt="user-image" class="avatar-user-comment">' +
                                    '<div>' +
                                        '<span class="username-comment">'+value.name+'</span>' +
                                        '<div class="content-user-comment">'+value.content+'</div>' +
                                    '</div>' +               
                                '</div>';
            $('#comment-content').append(appendComments);
        });
        //event click on comment song button to show comment details of song
        $('#comment-song').click(function(){
            stateCommentSong = ! stateCommentSong;
            let commentSong = $('#comment-song-i');
            if(stateCommentSong){
                $('#model-comment-song').show();
                commentSong.removeClass("bi-chat-dots").addClass("bi-chat-dots-fill");                                 
            }else{
                commentSong.removeClass("bi-chat-dots-fill").addClass("bi-chat-dots");
            }
        });
        
    });
    $('#close-comment').click(function () {
        $('#model-comment-song').hide();
        stateCommentSong = ! stateCommentSong;
        $('#comment-song-i').removeClass("bi-chat-dots-fill").addClass("bi-chat-dots");
    });
    $(window).on('click', function (e) {
        if ($(e.target).is('#model-comment-song')) {
            $('#model-comment-song').hide();
            stateCommentSong = ! stateCommentSong;
            $('#comment-song-i').removeClass("bi-chat-dots-fill").addClass("bi-chat-dots");
        }
    });

    //event enter comments
    $('#submit-comment').click(function(){
        let commentContent = $('#input-comment').val();
        if(commentContent){
            let appendComment = '<div class="comment_of_song">' +
                                    '<img src="Avatar-Default.jpg" alt="user-image" class="avatar-user-comment">' +
                                    '<div>' +
                                        '<span class="username-comment">Nguyễn Văn C</span>' +
                                        '<div class="content-user-comment">'+commentContent+'</div>' +
                                    '</div>' +              
                                '</div>';
            $('#comment-content').append(appendComment);
            numberOfComments++;
            $('#number_of_comments').text(numberOfComments + " Bình luận");
            $('#input-comment').val('');
        }
    });

    //event press key enter in input
    $('#input-comment').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            let commentContent = $('#input-comment').val();  
            if(commentContent){
                let appendComment = '<div class="comment_of_song">' +
                                        '<img src="Avatar-Default.jpg" alt="user-image" class="avatar-user-comment">' +
                                        '<div>' +
                                            '<span class="username-comment">Nguyễn Văn C</span>' +
                                            '<div class="content-user-comment">'+commentContent+'</div>' +
                                        '</div>' +              
                                    '</div>';
                $('#comment-content').append(appendComment);
                numberOfComments++;
                $('#number_of_comments').text(numberOfComments + " Bình luận");
                $('#input-comment').val('');
            }
        }
    });


    //load data from file json
    // $.getJSON("playlist.json",function(data){
    //     $(data).each(function(key, value){
    //         let appendPlaylist = '<li>' +
    //                                 '<button value="'+value.id+'">' +
    //                                     '<i class="bi bi-music-note-list"></i>' +
    //                                     '<span>'+value.name+'</span>' +
    //                                 '</button>' +
    //                             '</li>';
    //         $('#menu-playlist').append(appendPlaylist);
    //     }); 
    //     //event click choose playlist to add song into
    //     $('#menu-playlist button').click(function(){
    //         $('#modal-add_to_playlist').hide();
    //         $('#notify').css("display","flex");
    //         $('#notify').addClass("show-notify");
    //         $('#notify').removeClass("hide-notify");
    //         setTimeout(function(){
    //             $('#notify').removeClass("show-notify");
    //             $('#notify').addClass("hide-notify");
    //         },3000);
    //     });
    //     //event close notify
    //     $('#close-notify').click(function(){
    //         $('#notify').removeClass("show-notify");
    //         $('#notify').addClass("hide-notify");
    //     });   
    // });

    // $.getJSON("playlist-detail.json",function(data){
    //     //function change song is playing
    //     function changeSongPlay(current){
    //         myAudio.pause();
    //         myAudio.src = data[current]["url"];
    //         if($('#playmusic-btn').hasClass("bi-play-circle")){
    //             $('#CD-Song').css("animation-play-state","running");
    //             $('#playmusic-btn').removeClass("bi-play-circle").addClass("bi-pause-circle");
    //             myAudio.pause();
    //         }
    //         myAudio.play();
    //         $('#CD-Song').attr("src",data[current]["imgSong"]);
    //         $('#media-content h3').text(data[current]["songName"]);
    //         $('#media-content span').text(data[current]["singerName"]);
    //     }
    //     //function set total time of song
    //     function loadTimeOfSong(){
    //         myAudio.onloadeddata = function(){
    //             timeOfSong = Math.floor(myAudio.duration);
    //             $('#song-time').text(convertNumberToTime(timeOfSong));
    //         };
    //     }
    //     currentSong=0;
    //     $(data).each(function(key, value){
    //         let appendPlaylistDetail = '<div class="song_of_playlist">' +
    //                                         '<button class="playsong-playlist">' +
    //                                             '<img src="'+value.imgSong+'" alt="baihat">' +
    //                                         '</button>' +
    //                                         '<div class="info_song-playlist">' +
    //                                             '<span class="song-name-playlist">'+value.songName+'</span>' +
    //                                             '<span class="singer-name-playlist">'+value.singerName+'</span>' +
    //                                         '</div>' +
    //                                     '</div>';
    //         $('#list_of_song').append(appendPlaylistDetail);
    //     }); 
    //     $('#list_of_song button').click(function(){
    //         $(".song_of_playlist").removeClass("active-song_of_playlist");
    //         $(this).closest(".song_of_playlist").addClass("active-song_of_playlist");
            
    //     });
    //     myAudio.ontimeupdate = function() {
    //         let numberOfSeconds = Math.round(myAudio.currentTime);
    //         let time = convertNumberToTime(numberOfSeconds);
    //         $('#current-time').text(time);
    //         $('#time-sliderbar').val(convertTimeToValueRange(myAudio.currentTime));  
    //         // console.log($('#time-sliderbar').val());
    //         if($('#time-sliderbar').val()==1000){
    //             myAudio.pause();
    //             $('#playmusic-btn').removeClass("bi-pause-circle").addClass("bi-play-circle");
    //             if(isRepeat){
    //                 myAudio.play();
    //                 myAudio.currentTime = 0;
    //                 $('#playmusic-btn').removeClass("bi-play-circle").addClass("bi-pause-circle");
    //             }else{
    //                 if(isRandom){
    //                     currentSong = Math.floor((Math.random() * data.length));
    //                 }else{
    //                     if(currentSong>=data.length-1){
    //                         currentSong=0;
    //                     }else{
    //                         currentSong++;
    //                     }
    //                 } 
    //                 changeSongPlay(currentSong); 
    //                 loadTimeOfSong();
    //             }
    //         }     
    //     };

    //     //event click button next song
    //     $('#next-btn').click(function(){
    //         if(isRandom){
    //             currentSong = Math.floor((Math.random() * data.length));
    //         }else{
    //             if(currentSong>=data.length-1){
    //                 currentSong=0;
    //             }else{
    //                 currentSong++;
    //             }
    //         } 
    //         changeSongPlay(currentSong); 
    //         loadTimeOfSong();   
    //     });

    //     //event click button previous song
    //     $('#pre-btn').click(function(){
    //         if(isRandom){
    //             currentSong = Math.floor((Math.random() * data.length));
    //         }else{
    //             if(currentSong<=0){
    //                 currentSong = data.length-1;
    //             }else{
    //                 currentSong--;
    //             }
    //         }
    //         changeSongPlay(currentSong);
    //         loadTimeOfSong();
    //     });
        
    // });

});
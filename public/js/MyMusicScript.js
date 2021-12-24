var isRandom = false;
var isRepeat = false;
var stateShowLyric = false;
var stateExpandPlaylists = false;
var isVolume = $('#volume-sliderbar').val();
var statefavoriteSong = false;
var stateCommentSong = false;
var numberOfComments = 2;
var currentSong = 0;

$(document).ready(function(){   
    // var myAudio = new Audio('audio/Gio-Van-Hat-Huong-Ly.mp3');
    var myAudio = new Audio();
    // myAudio.src = $('#song-default').text();



    //set time of song
    var timeOfSong
    myAudio.onloadeddata = function(){
        timeOfSong = Math.floor(myAudio.duration);
        $('#song-time').text(convertNumberToTime(timeOfSong));
    };

    $('#myplaylist button').click(function(){
        myAudio.pause();
        var idPlaylist = $(this).val();
        $('#list_of_song').empty();
        $.ajax({
            type: "get",
            url: "/playMyMusic",
            data: {idPlaylist: idPlaylist},
            dataType: "json",
            success: function (data) {
                function changeSongPlay(current){
                    myAudio.pause();
                    myAudio.src = data[current]["url"];
                    if($('#playmusic-btn').hasClass("bi-play-circle")){
                        $('#CD-Song').css("animation-play-state","running");
                        $('#playmusic-btn').removeClass("bi-play-circle").addClass("bi-pause-circle");
                        myAudio.pause();
                    }
                    myAudio.play();
                    $('#CD-Song').attr("src",data[current]["sphoto"]);
                    $('#media-content h3').text(data[current]["sname"]);
                    $('#media-content span').text(data[current]["siname"]);
                    $('#lyrics-song').empty();
                    $('#lyrics-song').text(data[current]["lyrics"]);
                }
                //function set total time of song
                function loadTimeOfSong(){
                    myAudio.onloadeddata = function(){
                        timeOfSong = Math.floor(myAudio.duration);
                        $('#song-time').text(convertNumberToTime(timeOfSong));
                    };
                }
                // currentSong=0;
                $(data).each(function(key, value){
                    let appendPlaylistDetail = '<div class="song_of_playlist">' +
                                                    '<button class="playsong-playlist">' +
                                                        '<img src="'+value.sphoto+'" alt="baihat">' +
                                                    '</button>' +
                                                    '<div class="info_song-playlist">' +
                                                        '<span class="song-name-playlist">'+value.sname+'</span>' +
                                                        '<span class="singer-name-playlist">'+value.siname+'</span>' +
                                                    '</div>' +
                                                '</div>';
                    $('#list_of_song').append(appendPlaylistDetail);
                }); 
                $('#list_of_song button').click(function(){
                    $(".song_of_playlist").removeClass("active-song_of_playlist");
                    $(this).closest(".song_of_playlist").addClass("active-song_of_playlist");
                    
                });
                myAudio.ontimeupdate = function() {
                    let numberOfSeconds = Math.round(myAudio.currentTime);
                    let time = convertNumberToTime(numberOfSeconds);
                    $('#current-time').text(time);
                    $('#time-sliderbar').val(convertTimeToValueRange(myAudio.currentTime));  
                    // console.log($('#time-sliderbar').val());
                    if($('#time-sliderbar').val()==1000){
                        myAudio.pause();
                        $('#playmusic-btn').removeClass("bi-pause-circle").addClass("bi-play-circle");
                        if(isRepeat){
                            myAudio.play();
                            myAudio.currentTime = 0;
                            $('#playmusic-btn').removeClass("bi-play-circle").addClass("bi-pause-circle");
                        }else{
                            if(isRandom){
                                currentSong = Math.floor((Math.random() * data.length));
                            }else{
                                if(currentSong>=data.length-1){
                                    currentSong=0;
                                }else{
                                    currentSong++;
                                }
                            } 
                            changeSongPlay(currentSong); 
                            loadTimeOfSong();
                        }
                    }     
                };
        
                //event click button next song
                $('#next-btn').click(function(){
                    if(isRandom){
                        currentSong = Math.floor((Math.random() * data.length));
                    }else{
                        if(currentSong>=data.length-1){
                            currentSong=0;
                        }else{
                            currentSong++;
                        }
                    } 
                    changeSongPlay(currentSong); 
                    loadTimeOfSong(); 
                });
        
                //event click button previous song
                $('#pre-btn').click(function(){
                    if(isRandom){
                        currentSong = Math.floor((Math.random() * data.length));
                    }else{
                        if(currentSong<=0){
                            currentSong = data.length-1;
                        }else{
                            currentSong--;
                        }
                    }
                    changeSongPlay(currentSong);
                    loadTimeOfSong();
                });
            }
        });
    });

    // // $('.title a').click(function(){
    // //     $('.title a').removeClass("action-result");
    // //     $(this).addClass("action-result");
    // // });
    // $('.title').on("click", "a", function(e){
    //     $('.title a').removeClass("action-result");
    //     $(this).addClass("action-result");
    // });
    
    //event click button play music
    $('#playmusic-btn').click(function(){
        let playButton = $('#playmusic-btn');
        playButton.toggleClass('bi-play-circle bi-pause-circle');
        if($(this).hasClass("bi-play-circle")){
            $('#test').text("Pause");
             $('#CD-Song').css("animation-play-state","paused");
            // $('#CD-Song').addClass("pause-CD");
            myAudio.pause();
        }
        else{
            $('#test').text("Play");
            // $('#CD-Song').removeClass("pause-CD");
             $('#CD-Song').css("animation-play-state","running");
             myAudio.play();           
        }
    });

    //event click button random song
    $('#shuffle-btn').click(function () { 
        isRandom = !isRandom;
        if(isRandom){
            $('#shuffle-i').css("color","#1c86dd");
        }else{
            $('#shuffle-i').css("color","white");
        }
    });

    //event click button repeat song
    $('#repeat-btn').click(function () { 
        isRepeat = !isRepeat;
        if(isRepeat){
            $('#repeat-i').css("color","#1c86dd");
        }else{
            $('#repeat-i').css("color","white");
        }
    });

    //event click button volume
    $('#volume-btn').click(function(){
        let volumeButton = $('#volume-btn');
        volumeButton.toggleClass('bi-volume-up bi-volume-mute');
        if($(this).hasClass("bi-volume-mute")){
            $('#volume-sliderbar').prop("value",0);
            myAudio.volume = 0;
        }else{
            $('#volume-sliderbar').prop("value",100);
            myAudio.volume = 1;
        }
    });

    //event click button to show lyrics
    $("#showlyric-btn").click(function(){
        stateShowLyric = ! stateShowLyric;
        if(stateShowLyric){
            $("#show-lyrics").animate({
                height: '74.2%'
            });
            $('#show-lyrics-svg').css("fill","#1c86dd"); 
        }else{
            $("#show-lyrics").animate({
                height: '0'
            });
            $('#show-lyrics-svg').css("fill","#dadada");
        }
        
    });

    //event click button to show playlist
    // $("#expand_playlists-btn").click(function(){
    //     stateExpandPlaylists = ! stateExpandPlaylists;
    //     if(stateExpandPlaylists){
    //         $("#show-playlist").animate({
    //             width: '22.2%'
    //         });
    //         $('#expand_playlists-i').css("color","#1c86dd"); 
    //     }else{
    //         $("#show-playlist").animate({
    //             width: '0'
    //         });
    //         $('#expand_playlists-i').css("color","#dadada");
    //     }
        
    // });

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

    //event click on favorite song button
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


});
$(document).ready(function(){
    $('#search-result a').click(function(){
        $('#search-result a').removeClass("action-result");
        $(this).addClass("action-result");
    });
    $('.singer-result').click(function(event){
        event.preventDefault();
        var keyword = $('#search-input-text').val();
        if(keyword){
            $.ajax({
                type: "GET",
                url: "/searchSinger",
                data: {keyword: keyword},
                dataType: "html",
                success: function (response) {
                    $('#search-result .result').remove();
                    $('#search-result .result2').remove();
                    $('#search-result .result3').remove()
                    $('#search-result').append(response); 
                }
            });
        }
    });
    $('.genre-result').click(function(event){
        event.preventDefault();
        var keyword = $('#search-input-text').val();
        if(keyword){
            $.ajax({
                type: "GET",
                url: "/searchGenre",
                data: {keyword: keyword},
                dataType: "html",
                success: function (response) {
                    $('#search-result .result').remove();
                    $('#search-result .result2').remove();
                    $('#search-result .result3').remove();
                    $('#search-result').append(response); 
                }
            });
        }
    });
});
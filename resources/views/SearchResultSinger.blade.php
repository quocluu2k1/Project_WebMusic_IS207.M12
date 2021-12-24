<div class="result2">
    @foreach($resultSinger as $singer)
    <div class="singer-result">
        <img src="{{$singer->siphoto}}" alt="">
        <a href="">{{$singer->siname}}</a>
    </div>
    @endforeach
</div>
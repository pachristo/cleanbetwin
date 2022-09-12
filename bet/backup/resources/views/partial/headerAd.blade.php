<div class="col-sm-8 col-sm-offset-2 mt10">
    <center>
        <?php
        $ad6a = \App\Focus\Modules\Ad\Model\Ad::where('location', 'ad6a')->where('status', '0')->first();
        $ad6b = \App\Focus\Modules\Ad\Model\Ad::where('location', 'ad6b')->where('status', '0')->first();
        ?>
        <div class="hideSM">
            @if(isset($ad6a))
                <a href="{{$ad6a->website}}" target="_blank"><img src="{{$path}}/ads/{{$ad6a->ads_image}}" alt="" class="img-responsive"></a>
            @endif
        </div>
        <div class="hideLG"><br>
            @if(isset($ad6b))
                <a href="{{$ad6b->website}}" target="_blank"><img src="{{$path}}/ads/{{$ad6b->ads_image}}" alt="" class="img-responsive"></a>
            @endif
        </div>
    </center>
    <br>
</div>
@extends('layout.master')
@section('title', $new->title)
@section('blog', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-sm-6 col-xs-offset-1 col-sm-offset-3">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px; margin-bottom: 40px;">
                        {{$new->title}}
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section class="blog py-5 bg-ark">

        <div class="container">
            <div class="row">

                <div class="col-sm-10 col-sm-offset-1">
                    <img src="{{$path}}blog/{{$new->display_image}}" class="w-100" style="width: 100%;">

                    <div class="card-block">
                        <div class="category">{{$new->category}}</div>
                        <p class="card-text"><small>{{\Carbon\Carbon::parse($new->created_at)->format('jS M, Y @ h:i a')}}</small></p>
                        <br>
                        {!! $new->content !!}
                        <hr>
                        <div id="disqus_thread"></div>
                        <script>

                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                            var disqus_config = function () {
                                this.page.url = "{{route('/article')}}/{{$new->slug}}";  // Replace PAGE_URL with your page's canonical URL variable
                                this.page.identifier = "{{$new->slug}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };

                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://cleanodds.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 text-justify">
                    <br>

                    <br><br>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS') @endsection
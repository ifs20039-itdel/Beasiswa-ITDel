{{-- <div class="flex items-center justify-center my-10 border">
    @foreach($arrayOfTestimoni as $key => $value)
      @php
        $img = "imgArt";
      @endphp
  <div class="">
        <div class="">
          <div class="bg-blue-300 px-3 py-2">
            <img src="{{$value->thumbnail}}" alt="{{$img.=$value->id_article}}" height="300">
            <div class="font-bold pt-2">
              <a href="">
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-black">{{$value->title}}</h5>
              </a>
            </div> 
          </div>
          <div class="px-3 mx-1">
            <p class="py-2">{{limit_text($value->caption,12)}}</p>
          </div>
            <form class=" w-full mx-2 my-5 " action="{{route('article',$value->id_article) }}" method="GET">
            <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-[#F49D1A] dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">
              Read more
          </button>
            </form>
        </div>
      </div>
    @endforeach
</div>
<div class=" m-auto pb-5">
  {!! $arrayOfArticle->appends(Request::except('page'))->render() !!}
</div> --}}
@extends('Layout.app')
@section('title', 'Posts')
@section('title2', 'Posts')
@section('main')

<div class="row">
    @foreach ($posts as $post )
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card">
                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                  <div class="image-container">
                    @if($post->image)
                    <img src="{{ $post->image}}" style="min-height:250px;object-fit:cover" class="img-fluid border-radius-lg">
                    @endif
                  </div>
                </div>

                <div class="card-body pt-2">
                  <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Link</span>
                  <a href="javascript:;" class="card-title h6 d-block text-darker">
                    {{ substr($post->title,0,30). "..." }}
                  </a>
                  <p class="card-description mb-4">
                  </p>
                  <div class="author align-items-center">

                    <div class="name ps-3">
                      @foreach ($links as $link)
                        <a href="javascript:;" class="badge bg-primary" onclick="copiarAlPortapapeles('{{ $link->title }}','{{ $post->domain->url_http}}','{{ $post->post_id }}','{{ $post->user_id }}')">{{ $link->title }}</a>

                      @endforeach
                      <div class="stats">
                        <small>{{ $post->date }}</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    @endforeach
</div>
@endsection
@section('scripts')
<script>
    function copiarAlPortapapeles(title,link,id,user_id) {

        let url = link+'/?p='+id+'&utm_source='+user_id+'&utm_medium='+title+'&utm_campaign=influencers'
        swal(title, url);
    }
</script>
@endsection

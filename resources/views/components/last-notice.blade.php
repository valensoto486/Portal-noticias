<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            @foreach($notices as $notice)
                <div>
                    <a href="{{ route('forum.show', $notice->id) }}">
                        <h2 class="post-title">{{ $notice->title }}</h2>
                        <p class="post-subtitle">{{ Str::limit($notice->description, 100) }}</p>
                    </a>
                    <p class="post-meta">
                        Publicado por
                        <a href="#!">{{ $notice->author }}</a>
                    </p>
                </div>
            @endforeach

            <!-- Divider-->
            <hr class="my-4" />
            <!-- Pager-->
            <span class="d-flex justify-content-end mb-4">
                <a 
                class="btn btn-info rounded py-2 text-light text-uppercase" 
                href="{{ route('forum') }}">
                Leer más
            </a>
        </span>
        </div>
    </div>
</div>

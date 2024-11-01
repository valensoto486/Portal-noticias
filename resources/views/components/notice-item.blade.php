<header class="masthead" style="background-image: url('{{ Vite::asset($notice->banner_image) }}')">
    <a href="{{ route('forum.show', $notice->id) }}">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h2>{{ $notice->title }}</h2>
                        <p>{{ $notice->description }}</p>
                        <span class="meta">
                            Publicado por
                            <a href="#!">{{ $notice->author }}</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </a>
</header>
@if($posts->count() > 0)
    @foreach($posts as $post)
        @include('user-interface.pages.post.show-post', ['post' => $post])
    @endforeach
@else
    <div class="card card-block card-stretch card-height mb-4">
        <div class="card-body text-center p-5">
            <h5 class="text-muted">No posts found matching your search.</h5>
        </div>
    </div>
@endif
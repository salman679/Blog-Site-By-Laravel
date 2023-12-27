<!-- Popular Tags section -->
<div class="side-bar-content">
    <h3 class="side-bar-heading">Popular Tags</h3>
    <div class="side-bar-popular-tags">
        <ul class="d-flex ps-0">
            @foreach ($popular_tags as $popular_tag)
            <li><a href="#">{{$popular_tag->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>

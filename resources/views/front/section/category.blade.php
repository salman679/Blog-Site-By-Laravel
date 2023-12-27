  <!-- categories section -->
  <div class="side-bar-content">
    <h3 class="side-bar-heading">Categories</h3>
    <div class="side-bar-items">
        <ul class="ps-0 mb-0">
            @foreach ($categories as $category)
            <li><a href="{{ route('front.blog', $category->slug) }}">
                <span class="text-capitalize">{{ $category->name }}</span>
                <span>({{ $category->blog_count }})</span>
            </a></li>
            @endforeach
        </ul>
    </div>
</div>
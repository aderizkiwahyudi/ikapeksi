<div class="widget categories">
    <ul>
        <li class="{{ Request::segment(2) ?? 'active' }}"><a href="{{ url('news') }}">Berita Utama</a></li>
        @foreach($categories as $item)
            <li class="{{ Request::segment(2) == $item->slug ? 'active' : '' }}"><a href="{{ url('categories/' . $item->slug) }}">{{ $item->name }}</a></li>
        @endforeach
        <li class="{{ Request::segment(1) == 'galeri' ? 'active' : '' }}"><a href="{{ url('galeri/all') }}">Galeri</a></li>
    </ul>
</div>
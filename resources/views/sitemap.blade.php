{!! '<'.'?'.'xml version="1.0" encoding="UTF-8" ?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($posts as $b_c)
        <url>
            <loc>{{ url('/'.$b_c->year.'/'.$b_c->month.'/'.$b_c->slug) }}.html</loc>
        </url>
    @endforeach
</urlset>
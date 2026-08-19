{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('about') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('contact') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('products.index') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('privacy') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>
    <url>
        <loc>{{ route('terms') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>
    @foreach($products as $product)
        @php
            $isFlagship = in_array($product->slug, ['scabicod-soap', 'tinea-soap', 'scabvar-lotion', 'greenstar-shampoo', 'x-corel-g-tablet']);
            $priority = $isFlagship ? '1.0' : '0.9';
        @endphp
        <url>
            <loc>{{ route('products.show', $product->slug) }}</loc>
            <lastmod>{{ $product->updated_at ? $product->updated_at->format('Y-m-d') : date('Y-m-d') }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>{{ $priority }}</priority>
            @if($product->featured_image && file_exists(public_path($product->featured_image)))
                <image:image>
                    <image:loc>{{ asset($product->featured_image) }}</image:loc>
                    <image:title>{{ $product->name }} - {{ $product->generic_name }}</image:title>
                    <image:caption>{{ $product->short_description ?: $product->name }}</image:caption>
                </image:image>
            @endif
            @foreach($product->images as $galleryImg)
                @if($galleryImg->image && file_exists(public_path($galleryImg->image)))
                    <image:image>
                        <image:loc>{{ asset($galleryImg->image) }}</image:loc>
                        <image:title>{{ $product->name }} Additional Pack Shot</image:title>
                        <image:caption>{{ $product->name }} Green Darma Pharmaceuticals</image:caption>
                    </image:image>
                @endif
            @endforeach
        </url>
    @endforeach
</urlset>

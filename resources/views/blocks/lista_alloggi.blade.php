<section class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($items as $item)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:scale-105">
                <img src="{{ asset('storage/thumbnails/' . $item->slug . '.WebP') }}" alt="{{ $item->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $item->name }}</h2>
                    <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ $item->camere }} camere</span>
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ $item->bagni }} bagni</span>
                        <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ $item->posti_letto }} posti letto</span>
                    </div>
                    <div class="mb-4">
                        @foreach($item->attributes as $attribute)
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $attribute->name }}</span>
                        @endforeach
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">{{ $item->adress }}</span>
                        <a href="{{ route('public.item.show', ['name' => $item->slug]) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300">
                            Dettagli
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

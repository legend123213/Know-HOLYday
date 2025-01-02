<div>
    <div class="container mx-auto px-4"></div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
        @foreach ($holidays as $holiday)
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="https://flagsapi.com/{{$holiday['countryCode']}}/flat/64.png"
                    alt="Sunset in the mountains">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{$holiday['name']}}</div>
                    <p class="text-gray-700 text-base">
                        {{$holiday['localName']}}
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$holiday['date']}}</span>
                    @if ($holiday['global'])
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#Global</span>

                    @else
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#Non
                            Global</span>
                    @endif

                </div>
            </div>
        @endforeach
    </div>
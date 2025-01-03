<div class="flex items-center justify-center ">
    <div class="flex space-x-4">
        <div>
        <?php
use GuzzleHttp\Client;
$client = new Client();
$response = $client->get('https://date.nager.at/api/v3/AvailableCountries');
$countries = json_decode($response->getBody());
$defaultCountry = $defaultCountry ?? 'US';

        ?>
        
        <form action={{ route($nameroute) }} action="GET" class="max-w-sm mx-auto">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                option</label>
            <select id="countries" name="countryCode"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required>
                <option value="" disabled>Choose a country</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->countryCode }}" {{ $country->countryCode == $defaultCountry ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
            </div>
            @if ($flag)
                <div>
                    <label for="number-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white max-w-sm mx-auto">Select a
                        number:</label>
                        <input type="number" id="number-input" name="year" required aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="2025" required maxlength="4"
                            oninput="this.value = this.value.slice(0, 4); if (this.value.length > 4 || this.value > new Date().getFullYear() + 1) { this.setCustomValidity('Year cannot be more than the current year plus 1'); } else { this.setCustomValidity(''); }" />
                    </div>
            @endif
            <div class="flex justify-center items-end">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 me-2   dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
    </div>
</div>
@props(['headers' => []])

<div class="overflow-x-auto -mx-4 sm:mx-0">
    <div class="inline-block min-w-full align-middle">
        <div class="overflow-hidden glass glass-dark rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800/50">
                    <tr>
                        @foreach($headers as $header)
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                {{ $header }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-900/20 divide-y divide-gray-200 dark:divide-gray-700">
                    {{ $slot }}
                </tbody>
            </table>
        </div>
    </div>
</div>
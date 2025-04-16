<div class="flex-1 overflow-auto">
    <div class="container px-4 py-6">
        <div class="flex items-center mb-8">
            <a href="{{ route('dashboard') }}" class="mr-4">
                <x-lucide-arrow-left class="h-5 w-5" />
            </a>
            <div>
                <h1 class="text-3xl font-bold">Analytics</h1>
                <p class="text-gray-500">Track the performance of your artwork</p>
            </div>
        </div>
        <div class="px-6 py-5">
            <div class="flex h-[300px] items-center justify-center border rounded-md dark:border-gray-700">
                <div class="flex flex-col items-center text-center">
                    <x-lucide-bar-chart-2 class="h-16 w-16 text-gray-400 dark:text-gray-500" />
                    <h3 class="mt-4 text-lg font-medium dark:text-white">Analytics Dashboard</h3>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        Detailed analytics about your artwork performance will appear here.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

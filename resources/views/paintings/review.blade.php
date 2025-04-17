<div class="p-6 bg-white dark:bg-gray-800 rounded-lg w-full border-1 border-gray-300 dark:border-gray-600">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Leave a Review</h2>
    <form action="#" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="review" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Your
                Review:</label>
            <textarea id="review" name="review" rows="4"
                class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring-blue-500 focus:border-blue-500"
                required></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Rating:</label>
            <div class="flex space-x-2">
                @for ($i = 1; $i <= 5; $i++)
                    <label class="flex items-center">
                        <input type="radio" name="rating" value="{{ $i }}" class="hidden peer" required>
                        <x-lucide-star class="w-6 h-6 text-gray-400 peer-checked:text-yellow-500 fill-current" />
                    </label>
                @endfor
            </div>
            <script>
                document.querySelectorAll('input[name="rating"]').forEach((radio) => {
                    radio.addEventListener('change', (e) => {
                        const value = parseInt(e.target.value);
                        document.querySelectorAll('input[name="rating"]').forEach((input, index) => {
                            const svg = input.nextElementSibling;
                            if (index < value) {
                                svg.classList.add('text-yellow-500');
                                svg.classList.remove('text-gray-400');
                            } else {
                                svg.classList.add('text-gray-400');
                                svg.classList.remove('text-yellow-500');
                            }
                        });
                    });
                });
            </script>
        </div>
        <div>
            <x-button type="submit">Submit Review</x-button>
        </div>
    </form>
</div>

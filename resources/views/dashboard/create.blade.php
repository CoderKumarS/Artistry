<div class="flex-1 overflow-auto">
    <div class="container px-4 py-6">
        <div class="flex items-center mb-8">
            <a href="{{ route('dashboard') }}" class="mr-4">
                <x-lucide-arrow-left class="h-5 w-5" />
            </a>
            <div>
                <h1 class="text-3xl font-bold">Add New Painting</h1>
                <p class="text-gray-500">Upload and publish your artwork</p>
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2" id="formContainer">
            <!-- Painting Details Card -->
            <div class="border-1 rounded-md p-6 form-item">
                <div class="mb-4">
                    <h2 class="text-2xl font-semibold">Painting Details</h2>
                    <p class="text-sm text-gray-500">Enter the information about your artwork</p>
                </div>
                <form action="{{ route('artworks.create') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    <div class="space-y-2">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" id="title" name="title"
                            class="input w-full border-gray-300 rounded-md border-1 focus:ring-indigo-500 focus:border-indigo-500 px-2 py-2"
                            placeholder="Enter the title of your painting" required>
                    </div>

                    <div class="space-y-2">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name="description"
                            class="textarea w-full border-gray-300 rounded-md px-2 py-2 border-1 focus:ring-indigo-500 focus:border-indigo-500 min-h-[120px]"
                            placeholder="Describe your artwork..." required></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label for="price" class="block text-sm font-medium text-gray-700">Price ($)</label>
                            <input type="number" id="price" name="price"
                                class="input w-full border-gray-300 rounded-md border-1 px-2 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="0.00" required>
                        </div>

                        <div class="space-y-2">
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <select id="category" name="category"
                                class="select w-full border-gray-300 rounded-md border-1 px-2 py-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600"
                                required>
                                <option value="" disabled selected>Select category</option>
                                @foreach (['Abstract', 'Landscape', 'Portrait', 'Still Life', 'Urban', 'Digital', 'Other'] as $category)
                                    <option value="{{ strtolower($category) }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                            <input type="number" id="year" name="year"
                                class="input w-full border-gray-300 rounded-md border-1 px-2 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="Year created" value="{{ date('Y') }}" required>
                        </div>

                        <div class="space-y-2">
                            <label for="medium" class="block text-sm font-medium text-gray-700">Medium</label>
                            <input type="text" id="medium" name="medium"
                                class="input w-full border-gray-300 rounded-md border-1 px-2 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="e.g. Oil on Canvas" required>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="dimensions" class="block text-sm font-medium text-gray-700">Dimensions</label>
                        <input type="text" id="dimensions" name="dimensions"
                            class="input w-full border-gray-300 rounded-md border-1 px-2 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="e.g. 24 × 36 inches" required>
                    </div>

                    <div class="pt-4">
                        <x-button type="submit" class="w-full">
                            Publish Painting
                        </x-button>
                    </div>
                </form>

            </div>

            <!-- Painting Image Card -->
            <div class="border-1 rounded-md p-6 form-item">
                <div class="mb-4">
                    <h2 class="text-2xl font-semibold">Painting Image</h2>
                    <p class="text-sm text-gray-500">Upload a high-quality image of your artwork</p>
                </div>
                <div class="space-y-4">
                    <div id="imagePreview"
                        class="relative aspect-[3/2] overflow-hidden rounded-md border-2 border-dashed border-gray-300 hidden">
                        <img id="previewImage" src="" alt="Painting preview" class="h-full w-full object-cover">
                        <button id="removeImage"
                            class="absolute right-2 top-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600">
                            <x-lucide-x class="h-4 w-4" />
                        </button>
                    </div>
                    <label for="image-upload"
                        class="flex aspect-[3/2] cursor-pointer flex-col items-center justify-center rounded-md border-2 border-dashed border-gray-300 p-6 text-center hover:bg-gray-50 dark:hover:bg-gray-700">
                        <x-lucide-upload class="h-6 w-6 text-gray-400" />
                        <p class="mt-2 text-sm font-medium text-gray-700 dark:text-gray-200">Drag and drop your image
                            here or click to
                            browse</p>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Supports JPG, PNG, WEBP. Max size 10MB.
                        </p>
                        <input id="image-upload" type="file" name="image" accept="image/*" class="hidden">
                    </label>

                    <div class="space-y-2">
                        <h3 class="text-sm font-medium text-gray-700">Image Guidelines</h3>
                        <ul class="list-disc pl-4 text-sm text-gray-500 space-y-1">
                            <li>Use high-resolution images for best quality</li>
                            <li>Ensure good lighting to showcase true colors</li>
                            <li>Avoid reflections or glare on the painting</li>
                            <li>Crop the image to show only the artwork</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const formContainer = document.getElementById('formContainer');
        const imageUpload = document.getElementById('image-upload');
        const imagePreview = document.getElementById('imagePreview');
        const previewImage = document.getElementById('previewImage');
        const removeImage = document.getElementById('removeImage');

        // GSAP animation
        gsap.fromTo(
            formContainer.querySelectorAll('.form-item'), {
                y: 20,
                opacity: 0
            }, {
                y: 0,
                opacity: 1,
                stagger: 0.05,
                duration: 0.5,
                ease: 'power2.out'
            }
        );

        // Image preview functionality
        imageUpload.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = () => {
                    previewImage.src = reader.result;
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });

        removeImage.addEventListener('click', () => {
            previewImage.src = '';
            imagePreview.classList.add('hidden');
            imageUpload.value = '';
        });
    });
</script>

<x-app-layout>
    <div class="flex flex-col items-center gap-5 w-full p-5" style="background-image: url('/img/background-comicu.jpg'); background-size: contain;">
        <div class="bg-neutral-900 p-8 rounded-lg w-full max-w-3xl">
            <h2 class="text-2xl font-bold text-center mb-2">
                Create Comic
            </h2>
            <form method="post" action="{{ route('comic.store') }}" enctype="multipart/form-data" class="w-full sm:w max-w-3xl ">
                @csrf

                <div class="mb-6">
                    <label for="inputComicName" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Comic
                        Name</label>
                    <input type="text" name="comic_name" id="inputComicName" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter comic name here" required>
                </div>
                <div class="relative mb-6">
                    <label for="inputComicName" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Price</label>
                    <span class="absolute inset-y-0 left-0 pl-2 pt-8 flex items-center pointer-events-none text-neutral-900 dark:text-white">
                        Rp.
                    </span>
                    <input type="text" name="price" id="inputPrice" class="pl-9 bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter price comic here" required>
                </div>
                <div class="mb-6">
                    <label for="inputSynopsis" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Synopsis</label>
                    <textarea id="inputSynopsis" name="synopsis" rows="4" class="block p-2.5 w-full text-sm text-neutral-900 bg-neutral-50 rounded-lg border border-neutral-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter synopsis here" required></textarea>
                </div>
                <div class="mb-6">
                    <label for="inputAuthor" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Author</label>
                    <input type="text" name="author" id="inputAuthor" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter author here" required>
                </div>

                <div class="mb-6">
                    <label for="inputAuthor" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Comic Photo</label>
                    <div class="w-full mx-auto bg-neutral-700 rounded-lg shadow-md overflow-hidden items-center">
                        <div class="p-4">
                            <input name="comic_photo" id="upload" type="file" class="hidden" accept="image/*" />
                            <div id="image-preview" class="w-full p-6 mb-4 bg-neutral-700 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                                <label for="upload" class="cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-neutral-100 mx-auto mb-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-neutral-100">Upload picture</h5>
                                    <p class="font-normal text-sm text-neutral-300 md:px-6">Choose photo size should be less than <b class="text-gray-200">2mb</b></p>
                                    <p class="font-normal text-sm text-neutral-300 md:px-6">and should be in <b class="text-gray-200">JPG, PNG, or GIF</b> format.</p>
                                    <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                                </label>
                            </div>
                            <div class="flex items-center justify-center">
                                <div class="w-full">
                                    <label for="upload" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full flex items-center justify-center cursor-pointer px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <span class="text-center">Upload</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    const uploadInput = document.getElementById('upload');
                    const filenameLabel = document.getElementById('filename');
                    const imagePreview = document.getElementById('image-preview');

                    // Check if the event listener has been added before
                    let isEventListenerAdded = false;

                    uploadInput.addEventListener('change', (event) => {
                        const file = event.target.files[0];

                        if (file) {
                            filenameLabel.textContent = file.name;

                            const reader = new FileReader();
                            reader.onload = (e) => {
                                imagePreview.innerHTML =
                                    `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" />`;
                                imagePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400');

                                // Add event listener for image preview only once
                                if (!isEventListenerAdded) {
                                    imagePreview.addEventListener('click', () => {
                                        uploadInput.click();
                                    });

                                    isEventListenerAdded = true;
                                }
                            };
                            reader.readAsDataURL(file);
                        } else {
                            filenameLabel.textContent = '';
                            imagePreview.innerHTML =
                                `<div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center text-gray-500">No image preview</div>`;
                            imagePreview.classList.add('border-dashed', 'border-2', 'border-gray-400');

                            // Remove the event listener when there's no image
                            imagePreview.removeEventListener('click', () => {
                                uploadInput.click();
                            });

                            isEventListenerAdded = false;
                        }
                    });

                    uploadInput.addEventListener('click', (event) => {
                        event.stopPropagation();
                    });
                </script>

                <div class="mb-6">
                    <label for="inputStock" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Stock</label>
                    <input type="number" name="stock" min="0" id="inputStock" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter stock here" required>
                </div>
                <div class="mb-6">
                    <label for="categoryId" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Category</label>
                    <select id="categoryId" name="category_id" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" disabled selected>Choose a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Submit
                </button>
            </form>
        </div>
</x-app-layout>

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-6xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add Company</h2>
        <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Company name">
                    @error('name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="text" name="email" id="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Company email" >
                    @error('email')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website</label>
                    <input type="text" name="website" id="website" value="{{ old('website') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Company website url">
                    @error('website')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="logo">Company Logo</label>
                    <input id="logo" type="file" name="logo" accept="image/png, image/jpeg" value="{{ old('logo') }}" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <p class="text-sm text-gray-400">(min 100px x 100px)</p>
                    @error('logo')
                    <span class="text-sm text-red-600">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
                Add
            </button>
        </form>
    </div>
</section>

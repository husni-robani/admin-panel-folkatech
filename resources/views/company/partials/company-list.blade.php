<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Company
            </th>
            <th scope="col" class="px-6 py-3">
                Website
            </th>
            <th scope="col" class="px-6 py-3 text-center">

            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . $company->logo_path) }}" alt="company logo">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{$company->name}}</div>
                        <div class="font-normal text-gray-500">{{$company->email}}</div>
                    </div>
                </th>
                <td class="px-6 py-4">
                    {{$company->link}}
                </td>
                <td class="px-6 py-4 flex space-x-2 justify-center">
                    <!-- Edit Button -->
                    <a href="{{ route('companies.edit', $company->id) }}" class="w-20 px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Edit
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-20 px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<x-admin-layout>
    <h1 style="font-size: 30px; margin-bottom: 10px;">Create Permission</h1>
    <div style="width: 300px;">
        <form method="POST" action="{{route('admin.permissions.store')}}">
            @csrf
            <div class="max-w-sm">
                <label>Permission name</label>
                <input type="text" name="name" id="input-label" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              </div>
              
            <div style="margin-top: 20px;" class="flex justify-end pb-3">
                <button type="submit" style="background-color: blue;" class="px-4 py-2 text-white rounded-md">Submit</button>
                <a style="background-color: gray; margin-left: 5px;" href="{{route('admin.permissions.index')}}" class="px-4 py-2 text-white rounded-md">Cancel</a>
            </div>
        </form>
    </div>
    @error('name')
        <span style="color: red" class="text-sm">
            {{ $message }}
        </span>
    @enderror
</x-admin-layout>

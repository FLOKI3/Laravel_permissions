<x-admin-layout>
    <h1 style="font-size: 30px; margin-bottom: 10px;">Edit Role</h1>
    <div style="width: 300px;">
        <form method="POST" action="{{route('admin.roles.update', $role->id)}}">
            @csrf
            @method('PUT')
            <div class="max-w-sm">
                <label>Role</label>
                <input value="{{$role->name}}" type="text" name="name" id="input-label" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
            </div>
            <div style="margin-top: 20px;" class="flex justify-end pb-3">
                <button type="submit" style="background-color: blue;" class="px-4 py-2 text-white rounded-md">Submit</button>
            </div>
        </form>
        <h1 style="font-size: 30px; margin-bottom: 10px;">Role Permissions</h1>
        @if ($role->permissions)
            @foreach ($role->permissions as $role_permission)
                <form method="POST" action="{{route('admin.roles.permissions.revoke', [$role->id, $role_permission->id])}}" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')    
                    <button style="background-color: red; color: white; margin-bottom: 10px;" type="submit" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium">
                        {{ $role_permission->name }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </form>
            @endforeach
        @endif
        <form method="POST" action="{{route('admin.roles.permissions', $role->id)}}">
            @csrf
            <p>Permission</p>
            <select name="permission" id="permission" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                @foreach ($permissions as $permission)
                    <option value="{{$permission->name}}">{{$permission->name}}</option>
                @endforeach    
            </select>
            <div style="margin-top: 20px;" class="flex justify-end pb-3">
                <button type="submit" style="background-color: blue;" class="px-4 py-2 text-white rounded-md">Submit</button>
                <a style="background-color: gray; margin-left: 5px;" href="{{route('admin.roles.index')}}" class="px-4 py-2 text-white rounded-md">Cancel</a>
            </div>
        </form>
    </div>
    @error('name')
        <span style="color: red" class="text-sm">
            {{ $message }}
        </span>
    @enderror
    
</x-admin-layout>

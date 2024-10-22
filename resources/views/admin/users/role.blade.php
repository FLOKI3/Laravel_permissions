<x-admin-layout>
    <div>Name: {{$user->name}}</div>
    <div>Email: {{$user->email}}</div>

            <h1 style="font-size: 30px; margin-bottom: 10px;">Roles</h1>
        @if ($user->roles)
            @foreach ($user->roles as $user_role)
                <form method="POST" action="{{route('admin.users.roles.remove', [$user->id, $user_role->id])}}" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')    
                    <button type="submit" class="inline-flex space-x-2 items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none">{{ $user_role->name }}</button>
                </form>
            @endforeach
        @endif
        <form method="POST" action="{{route('admin.users.roles', $user->id)}}">
            @csrf
            <p>Roles</p>
            <select name="role" id="role" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                @foreach ($roles as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>
                @endforeach    
            </select>
            <div style="margin-top: 20px;" class="flex justify-end pb-3">
                <button type="submit" style="background-color: blue;" class="px-4 py-2 text-white rounded-md">Submit</button>
            </div>
        </form>

        <h1 style="font-size: 30px; margin-bottom: 10px;">Permissions</h1>
        @if ($user->permissions)
            @foreach ($user->permissions as $user_permission)
                <form method="POST" action="{{route('admin.users.permissions.revoke', [$user->id, $user_permission->id])}}" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')    
                    <button type="submit" class="inline-flex space-x-2 items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none">{{ $user_permission->name }}</button>
                </form>
            @endforeach
        @endif
        <form method="POST" action="{{route('admin.users.permissions', $user->id)}}">
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

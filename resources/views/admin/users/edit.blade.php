<x-admin-layout>
    <div class="mt-12 max-w-6xl mx-auto bg-slate-50 p-4 rounded">
        <div class="flex m-2 p-2">
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-indigo-400 hover:bg-indigo-600 rounded">
                Back</a>
        </div>
        <div class="max-w-md mx-auto bg-gray-100 p-6 mt-12 rounded">
            <form class="space-y-5" method="POST" action="{{ route('admin.users.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="text-xl">Name</label>
                    <input id="name" type="text" name="name" value="{{ $user->name }}"
                        class="block w-full py-3 px-3 mt-2
                            text-gray-800 appearance-none
                            border-2 border-gray-100
                            focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md" />
                    @error('name')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="email" class="text-xl">Email</label>
                    <input id="email" type="text" name="email" value="{{ $user->email }}"
                        class="block w-full py-3 px-3 mt-2
                            text-gray-800 appearance-none
                            border-2 border-gray-100
                            focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md" />
                    @error('email')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="text-xl">
                        <span class="text-gray-700">Role</span>
                        <select name="role_id"
                            class="block w-full py-3 px-3 mt-2
                            text-gray-800 appearance-none
                            border-2 border-gray-100
                            focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @selected($user->hasRole($role->name))>
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <button type="submit"
                    class="w-full py-3 mt-10 bg-indigo-400 hover:bg-indigo-600 rounded-md
                        font-medium text-white uppercase
                        focus:outline-none hover:shadow-none">
                    Update
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>

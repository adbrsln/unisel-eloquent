<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @can('create-user')
                      <div class="flex items-center justify-end mb-4">
                          <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-4" href="{{ route('users.create') }}">
                              {{ __('Create New User') }}
                          </a>
                      </div>
                    @endcan
                    <div class="flex items-center justify-end mt-2 mb-2">
                        {{ $users->links() }}
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                          <thead class="bg-gray-50">
                            <tr>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                E-mail
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $user->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @can('view-user')
                                              <a href="{{ route('users.show', $user) }}" class="text-indigo-600 hover:text-indigo-900">
                                                  {{ __('View') }}
                                              </a>
                                            @endcan
                                            @can('update-user')
                                              <a href="{{ route('users.edit', $user) }}" class="ml-3 text-indigo-600 hover:text-indigo-900">
                                                  {{ __('Edit') }}
                                              </a>
                                            @endcan
                                            @can('delete-user')
                                            <form action="{{route('users.destroy',$user)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="ml-3 text-red-600 hover:text-red-900" onclick="confirm('are you sure?')">
                                                {{ __('Delete') }}
                                                </button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                          </tbody>
                      </table>
                      <div class="flex items-center justify-end mt-2 mb-2">
                        {{ $users->links() }}
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

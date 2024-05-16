<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-400 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 dark:bg-gray-400 border-b border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="dark:bg-gray-400">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Apellido
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Telefono
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Correo
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            </th>
                        </tr>
                        </thead>
                        <tbody class="dark:bg-gray-400 divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $user->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $user->lastname }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $user->phone }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $user->email }}</div>
                                </td>
                                <td class="px-6 py-4 flex  whitespace-nowrap">
                                    <form  action="{{ route('destroyUser', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')"  class="ms-3 ">
                                            {{ __('Eliminar') }}
                                        </x-primary-button>

                                    </form>

                                    <form  action="{{ route('editUser', $user->id) }}" method="GET">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button type="submit" class="ms-3 ">
                                            {{ __('Editar') }}
                                        </x-primary-button>

                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

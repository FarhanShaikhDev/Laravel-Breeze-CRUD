<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee') }}
            <a href="{{route('employee.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Add Employee</a>
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">ID</th>
                                        <th class="px-4 py-2">First Name</th>
                                        <th class="px-4 py-2">Last Name</th>
                                        <th class="px-4 py-2">Email</th>
                                        <th class="px-4 py-2">Country Code</th>
                                        <th class="px-4 py-2">Mobile Number</th>
                                        <th class="px-4 py-2">Gender</th>
                                        <th class="px-4 py-2">Hobby</th>
                                        <th class="px-4 py-2">Created Date</th>
                                        <th class="px-4 py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employee as $emp)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $emp->id }}</td>
                                            <td class="border px-4 py-2">{{ $emp->first_name }}</td>
                                            <td class="border px-4 py-2">{{ $emp->last_name }}</td>
                                            <td class="border px-4 py-2">{{ $emp->email }}</td>
                                            <td class="border px-4 py-2">{{ $emp->country_code }}</td>
                                            <td class="border px-4 py-2">{{ $emp->mobile_number }}</td>
                                            <td class="border px-4 py-2">
                                            @if($emp->gender)
                                                {{ $emp->gender }}
                                            @else
                                                -
                                            @endif
                                            </td>
                                            <td class="border px-4 py-2">
                                            @if($emp->hobby)
                                                @foreach(json_decode($emp->hobby) as $hobby)  
                                                    {{ $hobby }},
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                            </td>
                                            <td class="border px-4 py-2">{{ $emp->created_at->format('d-m-Y h:i:A') }}</td>
                                            <td class="border px-4 py-2">
                                                <a href="{{route('employee.edit', $emp->id)}}" class="text-blue-500 hover:underline" > Edit </a> | 
                                                <form method="post" action="{{route('employee.destroy', $emp->id)}}" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure want to delete this employee ?')" class="text-red-500 hover:underline"> Delete </button>
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
    </div>
</x-app-layout>

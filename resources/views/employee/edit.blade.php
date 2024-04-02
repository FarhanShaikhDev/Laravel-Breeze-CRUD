<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Employee
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{route('employee.update', $employee->id)}}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="first_name" :value="__('First Name')" />
                            <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="$employee->first_name" required autofocus />
                        </div>

                        <div>
                            <x-label for="last_name" :value="__('Last Name')" />
                            <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="$employee->last_name" required />
                        </div>

                        <div>
                            <x-label for="email" :value="__('Email')" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$employee->email" required />
                        </div>

                        <div>
                            <x-label for="country_code" :value="__('Country Code')" />
                            <x-input id="country_code" class="block mt-1 w-full" type="text" name="country_code" :value="$employee->country_code" required />
                        </div>

                        <div>
                            <x-label for="mobile_number" :value="__('Mobile Number')" />
                            <x-input id="mobile_number" class="block mt-1 w-full" type="text" name="mobile_number" :value="$employee->mobile_number" required />
                        </div>

                        <div>
                            <x-label for="address" :value="__('Address')" />
                            <textarea id="address" name="address" class="block mt-1 w-full" required>{{$employee->address}}</textarea>
                        </div>

                        <div>
                            <x-label for="gender" :value="__('Gender')" />
                            <select id="gender" name="gender" class="block mt-1 w-full" required>
                                <option value="male" {{$employee->gender === 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{$employee->gender === 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div>
                            <x-label for="hobby" :value="__('Hobby')" />
                            <div class="mt-2 space-y-2">
                                <x-checkbox name="hobby[]" value="reading" :checked="$employee->hobby && in_array('reading', json_decode($employee->hobby))" /> Reading </br>
                                <x-checkbox name="hobby[]" value="writing"  :checked="$employee->hobby && in_array('writing', json_decode($employee->hobby))" /> Writing </br>
                                <x-checkbox name="hobby[]" value="travelling"  :checked="$employee->hobby && in_array('travelling', json_decode($employee->hobby))" /> Travelling </br>
                                <x-checkbox name="hobby[]" value="singing"  :checked="$employee->hobby && in_array('singing', json_decode($employee->hobby))" /> Singing
                            </div>
                        </div>

                        <div>
                            <x-label for="photo" :value="__('Photo')" />
                            @if($employee->photo)
                                <div class="mt-2"> 
                                    <img src="{{asset('images/' . $employee->photo)}}" alt="Employee Photo" class="h-56 w-56 rounded-full">
                                </div>
                            @else
                                <div class="mt-2"> No Photo Available </div>
                            @endif
                            <x-input id="photo" class="block mt-1 w-full" type="file" name="photo" />
                        </div>

                        <div class="flex items-center gap-2">
                            <x-button>{{ __('Save') }}</x-button>
                            <x-button onclick="history.back()">{{ __('Cancel') }}</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

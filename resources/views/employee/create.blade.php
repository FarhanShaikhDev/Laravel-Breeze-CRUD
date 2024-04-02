<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Employee
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{route('employee.store')}}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        
                        <div>
                            <x-label for="first_name" :value="__('First Name')" />
                            <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
                        </div>

                        <div>
                            <x-label for="last_name" :value="__('Last Name')" />
                            <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
                        </div>

                        <div>
                            <x-label for="email" :value="__('Email')" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>

                        <div>
                            <x-label for="country_code" :value="__('Country Code')" />
                            <x-input id="country_code" class="block mt-1 w-full" type="text" name="country_code" :value="old('country_code')" required />
                        </div>

                        <div>
                            <x-label for="mobile_number" :value="__('Mobile Number')" />
                            <x-input id="mobile_number" class="block mt-1 w-full" type="number" name="mobile_number" :value="old('mobile_number')" required />
                        </div>

                        <div>
                            <x-label for="address" :value="__('Address')" />
                            <textarea id="address" name="address" class="block mt-1 w-full" required>{{ old('address') }}</textarea>
                        </div>

                        <div>
                            <x-label for="gender" :value="__('Gender')" />
                            <select id="gender" name="gender" class="block mt-1 w-full" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div>
                            <x-label for="hobby" :value="__('Hobby')" />
                            <div class="mt-2 space-y-2">
                                <x-checkbox id="hobby1" name="hobby[]" :value="'reading'" /> Reading </br>
                                <x-checkbox id="hobby2" name="hobby[]" :value="'writing'" /> Writing </br>
                                <x-checkbox id="hobby2" name="hobby[]" :value="'travelling'" /> Travelling </br>
                                <x-checkbox id="hobby2" name="hobby[]" :value="'singing'" /> Singing </br>
                            </div>
                        </div>

                        <div>
                            <x-label for="photo" :value="__('Photo')" />
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

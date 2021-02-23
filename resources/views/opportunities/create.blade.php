<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Opportunity
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('opportunities.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="description" class="block font-medium text-sm text-gray-700">Opportunity Name</label>
                            <input type="text" name="name" id="name" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('description', '') }}" />
                            @error('Opportunity name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        
                     
                            <label for="description" class="block font-medium text-sm text-gray-700">Oportunity Amount</label>
                            <input type="text" name="amount" id="amount" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('description', '') }}" />
                            @error('Account type')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <label for="description" class="block font-medium text-sm text-gray-700">Oportunity Stage</label>
                            <input type="text" name="stage" id="stage" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('description', '') }}" />
                            @error('Opportunity Amount')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <!-- <label for="description" class="block font-medium text-sm text-gray-700">Assign Account</label>
                            <input type="text" name="assign" id="address" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('description', '') }}" />
                            @error('Assign')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror -->
                            <label for="description" class="block font-medium text-sm text-gray-700">Assign Account</label>
                            
                            <div class="form-group">
                            
                                <select class="form-control" name="account_id">
                                    @foreach($account as $accounts)
                                <option value="{{$accounts->id}}">{{$accounts->name}}</option>
                                @endforeach
                                </select>
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
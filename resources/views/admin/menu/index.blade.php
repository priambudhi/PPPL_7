<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
@if(session('msg-success'))
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 3000)"
                            class="bg-green-500 text-white py-4 px-8 block rounded-lg shadow mb-4"
                        >{{ session('msg-success') }}</p>
@endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class=" overflow-x-scroll">
                        <table class="table border w-full text-sm">
                            <thead>
                                <tr>
                                    <th class="p-2 border text-center">Category</th>
                                    <th class="p-2 border text-center">Name</th>
                                    <th class="p-2 border text-center">Photo</th>
                                    <th class="p-2 border text-center">Price</th>
                                    <th class="p-2 border text-center">Action</th>
                                </tr>
                            </thead>
                            <thead>
@if(count($items) < 1)
                                <tr>
                                    <td colspan="5" class="p-2 border text-center">No one Item, please insert Item!</td>
                                </tr>
@else
@foreach($items as $item)
                                <tr>
                                    <td class="p-2 border text-center">{{ $item->MenuCategory->name }}</td>
                                    <td class="p-2 border text-center">{{ $item->name }}</td>
                                    <td class="p-2 border text-center">
                                        <img src="{{ asset('assets/menu/'.$item->photo) }}" class="max-h-24 mx-auto" alt="{{ $item->name }}">
                                    </td>
                                    <td class="p-2 border text-center">Rp {{ number_format($item->price) }}</td>
                                    <td class="p-2 border text-center">
                                        <x-warning-button
                                            x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'update-menu-item')" 
                                            class="!capitalize mb-1 bg-yellow-500 focus:bg-yellow-400 hover:bg-yellow-400 focus:ring-yellow-400" onclick="fetchData({{$item->id}})">Update</x-warning-button>
                                        <x-danger-button
                                            x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'delete-menu')" 
                                            class=" !capitalize mb-1 bg-red-500 focus:bg-red-400 hover:bg-red-400 focus:ring-red-400" onclick="getId({{$item->id}})">Delete</x-danger-button>
                                    </td>
                                </tr>
@endforeach
@endif
                            </thead>
                        </table>
                    </div>
                    <div class="mt-4">
                        <x-primary-button 
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'create-menu-item')">Create</x-primary-button>
                        <x-primary-button 
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'create-menu-category')">Create Category</x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>                
    <x-modal name="create-menu-item" :show="$errors->menuItemCreate->isNotEmpty()" focusable>
        <form method="POST" action="{{ route('admin.menu.store')}}" class="p-6" enctype="multipart/form-data">
            @csrf

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Create Item Create') }}
            </h2>
            <div class="mt-6">
                <x-input-label for="menu_category_id" value="{{ __('Menu Category') }}" />
                <x-select-input
                    id="u_menu_category_id"
                    name="menu_category_id"
                    type="text"
                    class="mt-1 block w-full"
                    required
                >
                    <option value="">-- Select Category --</option>
@foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
@endforeach
                </x-select-input>
                <x-input-error :messages="$errors->menuItemCreate->get('menu_category_id')" class="mt-2" />
            </div>
            <div class="mt-6">
                <x-input-label for="name" value="{{ __('Name') }}" />
                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    class="mt-1 block w-full"
                    placeholder="Menu Name"
                />
                <x-input-error :messages="$errors->menuItemCreate->get('name')" class="mt-2" />
            </div>
            <div class="mt-6">
                <x-input-label for="price" value="{{ __('Price') }}" />
                <x-text-input
                    id="price"
                    name="price"
                    type="number"
                    class="mt-1 block w-full"
                    placeholder="Price"
                />
                <x-input-error :messages="$errors->menuItemCreate->get('price')" class="mt-2" />
            </div>
            <div class="mt-6">
                <x-input-label for="photo" value="{{ __('photo') }}" />
                <x-text-input
                    id="photo"
                    name="photo"
                    type="file"
                    class="mt-1 block w-full"
                    placeholder="Menu photo"
                />
                <x-input-error :messages="$errors->menuItemCreate->get('photo')" class="mt-2" />
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3">
                    {{ __('Create') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>                
    <x-modal name="update-menu-item" :show="$errors->menuItemUpdate->isNotEmpty()" focusable>
        <form method="POST" action="{{ route('admin.menu.update')}}" class="p-6" enctype="multipart/form-data">
            @csrf

            @method('put')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Create Item Create') }}
            </h2>
            <input type="hidden" name="id" id="u_id">
            <div class="mt-6">
                <x-input-label for="menu_category_id" value="{{ __('Menu Category') }}" />
                <x-select-input
                    id="u_menu_category_id"
                    name="menu_category_id"
                    type="text"
                    class="mt-1 block w-full"
                    required
                >
                    <option value="">-- Select Category --</option>
@foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
@endforeach
                </x-select-input>
                <x-input-error :messages="$errors->menuItemUpdate->get('menu_category_id')" class="mt-2" />
            </div>
            <div class="mt-6">
                <x-input-label for="name" value="{{ __('Name') }}" />
                <x-text-input
                    id="u_name"
                    name="name"
                    type="text"
                    class="mt-1 block w-full"
                    placeholder="Menu Name"
                />
                <x-input-error :messages="$errors->menuItemUpdate->get('name')" class="mt-2" />
            </div>
            <div class="mt-6">
                <x-input-label for="price" value="{{ __('Price') }}" />
                <x-text-input
                    id="u_price"
                    name="price"
                    type="number"
                    class="mt-1 block w-full"
                    placeholder="Price"
                />
                <x-input-error :messages="$errors->menuItemUpdate->get('price')" class="mt-2" />
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
    <x-modal name="create-menu-category" :show="$errors->menuCategoryCreate->isNotEmpty()" focusable>
        <form method="POST" action="{{ route('admin.menu.cat_store')}}" class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Create Menu Category Create') }}
            </h2>
            <div class="mt-6">
                <x-input-label for="name" value="{{ __('Name') }}" />
                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    class="mt-1 block w-full"
                    placeholder="Menu Category Name"
                />
                <x-input-error :messages="$errors->menuCategoryCreate->get('name')" class="mt-2" />
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3">
                    {{ __('Create') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
    <x-modal name="delete-menu" :show="$errors->menuItemDelete->isNotEmpty()" focusable>
        <form method="POST" action="{{ route('admin.menu.destroy')}}" class="p-6">
            @csrf

            @method('delete')

            <input type="hidden" name="id" id="id">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once deleted, all of its resources and data will be permanently deleted. Please Confirm by Click button bellow') }}
            </p>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
    <x-slot name="js">
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            function fetchData(id){

                let data = {
                    'id': id,
                };
                $.ajax({
                    url: "{{ route('admin.menu.fetch') }}",
                    type: 'POST',
                    data: data,
                    dataType: "json",
                    success: function(data){
                        console.log(data);
                        $('#u_id').val(data.data.id);
                        $('#u_name').val(data.data.name);
                        $('#u_price').val(data.data.price);
                    }
                });
            }
        </script>
        <script>
            function getId(id){
                document.getElementById('id').value = id;
            }
        </script>
    </x-slot>
</x-app-layout>

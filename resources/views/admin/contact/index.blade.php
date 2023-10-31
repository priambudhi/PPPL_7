<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class=" overflow-x-scroll">
                        <table class="table border w-full text-sm">
                            <thead>
                                <tr>
                                    <th class="p-2 border text-center">Name</th>
                                    <th class="p-2 border text-center">Email</th>
                                    <th class="p-2 border text-center">Phone Number</th>
                                    <th class="p-2 border text-center">Jumlah Orang</th>
                                    <th class="p-2 border text-center">Booking Date</th>
                                </tr>
                            </thead>
                            <thead>
@foreach($datas as $data)
                                <tr>
                                    <td class="p-2 border text-center">{{ $data->name }}</td>
                                    <td class="p-2 border text-center">{{ $data->email }}</td>
                                    <td class="p-2 border text-center">{{ $data->phone_number }}</td>
                                    <td class="p-2 border text-center">{{ $data->jumlah_orang }}</td>
                                    <td class="p-2 border text-center">{{ $data->booking_date }}</td>
                                </tr>
@endforeach
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

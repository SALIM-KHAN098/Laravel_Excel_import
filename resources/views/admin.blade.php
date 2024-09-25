<link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                        <a href="{{ route('admin.export') }}" class="btn btn-warning btn-sm offset-11">Export</a>


                    @session('success')
                       <div class="alert alert-success" role="alert">
                            {{ $value }}
                       </div>
                    @endsession

                    <form action="{{ route('admin.import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="my-3">
                            <h3 for="formFile" class=""><strong>Upload CSV file</strong></h3>
                            <input class="form-control mb-4" name="file" type="file" id="formFile">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>

                    </form>


                    {{-- table form in data format --}}
                    <table id="CSV" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Created at</th>
                                <th class="text-center">Updated at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>+91: {{ $user->phone }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>

<script>
    new DataTable('#CSV');
</script>

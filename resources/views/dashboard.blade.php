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

                    @session('success')
                       <div class="alert alert-success" role="alert">
                            {{ $value }}
                       </div>
                    @endsession

                    <form action="{{ route('admin.import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="my-3">
                            <label for="formFile" class="form-label">Upload CSV file</label>
                            <input class="form-control" name="file" type="file" id="formFile">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>

                    </form>




                    <table id="CSV" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>61</td>
                                    <td>2011-04-25</td>
                                    <td>$320,800</td>
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

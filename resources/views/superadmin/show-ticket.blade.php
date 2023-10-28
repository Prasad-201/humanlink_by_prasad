@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="containSection">
            <div class="heading mb-0">
                @if (session()->has('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <span class="text-danger">{{ session()->get('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="text-danger">{{ session()->get('error') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <h5 class="card-title">Ticket<span></span></h5>

                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Employer Name</th>
                            <th scope="col">Description</th>
                            {{-- <th scope="col">Status</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$tickets->isEmpty())
                            @foreach ($tickets as $ticket)
                                @if ($ticket->employer_name != null)
                                    <tr>
                                        <th scope="row">{{ '2457' }}</th>
                                        <td>{{ $ticket->employer_name }}</td>
                                        <td>{{ $ticket->ticket_description }}</td>
                                        {{-- <td><span class="badge bg-success">Approved</span></td> --}}
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')

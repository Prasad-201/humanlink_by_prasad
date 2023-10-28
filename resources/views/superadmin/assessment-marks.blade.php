@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Assessment & Candidate Details</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Candidate Name</th>
                                    <th scope="col">Assessment Name</th>
                                    <th scope="col">Solve Question</th>
                                    <th scope="col">Mark Obtained</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$assCandMark->isEmpty())
                                @foreach ($assCandMark as $asseDetail)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ ucfirst($asseDetail->full_name) }}</td>
                                    <td>{{ $asseDetail->assessment_name }}</td>
                                    <td>{{ $asseDetail->attemptQuestion }}</td>
                                    <td>{{ $asseDetail->totalMark }} / 10</td>
                                    <td>{{ date('Y-m-d',strtotime($asseDetail->updated_at)) }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('talent_temp.footer')
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
                                    <th class="text-left" scope="col">#</th>
                                    <th class="text-center" scope="col">Assessment Name</th>
                                    <th class="text-center" scope="col">Solve Question</th>
                                    <th class="text-center" scope="col">Mark Obtained</th>
                                    <th class="text-right" scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$assCandMark->isEmpty())
                                @foreach ($assCandMark as $asseDetail)
                                <tr>
                                    <th class="text-left" scope="row">{{ $loop->index + 1 }}</th>
                                    <td class="text-center">{{ $asseDetail->assessment_name }}</td>
                                    <td class="text-center">{{ $asseDetail->attemptQuestion }}</td>
                                    <td class="text-center">{{ $asseDetail->totalMark }} / 10</td>
                                    <td class="text-right">{{ date('Y-m-d',strtotime($asseDetail->updated_at)) }}</td>
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
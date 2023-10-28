@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="container containSection assessment">
            <div class="assessment-page-heading">
                <h3><b>Feedback History</b></h3>
            </div>

            <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="input-group mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                    <button class="btn btn-primary" id="searchButton" type="button">Search</button>
                </div>
            </div>
            <div id="searchResults"></div>
        </div>
    </div>
</div>
            <div class="common-box-main">
                @if (!$feedbacks->isEmpty())
                    @foreach ($feedbacks as $feedback)
                        <h5 class="mt-3">{{ ucfirst($feedback->candidate_name) }}</h5>
                        <table class="m-3">
                            <tr>
                                <td>{{ $feedback->feedback_text }}</td>   
                            </tr> 
                            <tr>
                            <td class="mt-1" style="font-size: 10px;margin-left:20px">{{ $feedback->date_time }}</td>
                            </tr>
                        </table>
                    @endforeach
                @endif

                <!-- Pagination Links -->
<div class="mt-4">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            {{ $feedbacks->links()}}
            
        </ul>
    </nav>

    <div class="pagination justify-content-center">
    <!-- {{ $feedbacks->count() }} -->
        </div>
</div>
                
            </div>
        </div>
    </div>
</main>


@include('talent_temp.footer')

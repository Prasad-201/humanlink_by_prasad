@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="containSection">
            <div class="heading">
                <h2>Add Ticket</h2>
            </div>
            <form action="{{ url('HireTalent/ticket') }}" method="post" autocomplete="off">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="form-group">
                            <label for="">Enter Description</label>
                            <textarea id="" cols="10" class="form-control" name="ticket_description" placeholder="Description"></textarea>
                            @if ($errors->has('ticket_description'))
                                <small class="text-danger form-text">
                                    {{ $errors->first('ticket_description') }}
                                </small>
                            @endif
                        </div>
                        <button class="btn btn-primary mt-2">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

@include('talent_temp.footer')

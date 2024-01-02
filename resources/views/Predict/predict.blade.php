<x-layouts.dashboard>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Prediction Result</h2>
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Predicted Class</h4>
                        <p class="card-text">{{ $registry->predicted_class }}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Probabilities</h4>
                        <ul class="list-group">
                            <li class="list-group-item">PTSD: {{ $registry->probabilities[0] }}</li>
                            <li class="list-group-item">OCD: {{ $registry->probabilities[1] }}</li>
                            <li class="list-group-item">Depression: {{ $registry->probabilities[2] }}</li>
                            <li class="list-group-item">Aspergus: {{ $registry->probabilities[3] }}</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-4">
                    <h4>Select a doctor to send your prediction to:</h4>
                    <form action="{{ route('notificate.store') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $registry->id }}" name="registry">
                        <div class="form-group">
                            <select class="form-select select2 form-control" name="doctor" id="doctor"
                                aria-label="Select Doctor">
                                @foreach (\App\Models\User::where('role', 'doctor')->get() as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <button class="btn btn-primary" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</x-layouts.dashboard>
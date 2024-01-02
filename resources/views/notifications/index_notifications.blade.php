<x-layouts.dashboard>
    @foreach ($notifications as $notification)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $notification->description }}</h5>
            @if ($notification->predicted_class !== null)
            <p class="card-text">{{ $notification->predicted_class }}</p>
            @endif
            @if ($notification->probabilities !== null)
            <ul class="list-group">
                <li class="list-group-item">PTSD: {{ json_decode($notification->probabilities)[0] }}</li>
                <li class="list-group-item">OCD: {{ json_decode($notification->probabilities)[1] }}</li>
                <li class="list-group-item">Depression: {{ json_decode($notification->probabilities)[2] }}</li>
                <li class="list-group-item">Aspergus: {{ json_decode($notification->probabilities)[3] }}</li>
            </ul>
            @endif
            @if (auth()->user()->role == 'doctor')
            <form action="{{ route('notificate.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="recipient_id" value="{{ $notification->sender_id }}"> 
                    <label for="description">Tell the patient your opinion</label>
                    <input type="text" name="description" id="description" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @endif
        </div>
    </div>
    @endforeach
</x-layouts.dashboard>
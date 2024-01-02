<x-layouts.dashboard>
    <div class="container mt-5">
        <h1>tell me what you feel</h1>
        <form action="{{ route('ask.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="question">write your feelings here</label>
                <textarea class="form-control" id="question" name="text" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-layouts.dashboard>
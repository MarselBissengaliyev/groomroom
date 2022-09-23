<div class="alert">
@if ($errors->any())
    <div class="alert-info alert-danger">
        <h6>Status error</h6>
        <div class="alert-close">x</div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <div class="alert-line"></div>
    </div>
@endif
@if ($success)
    <div class="alert-info alert-success">
        <h6>Status success</h6>
        <div class="alert-close">x</div>
        <p>{{ $success }}</p>
        <div class="alert-line"></div>
    </div>
@endif
@if (session('success'))
    <div class="alert-info alert-success">
        <h6>Status success</h6>
        <div class="alert-close">x</div>
        <p>{{ session('success') }}</p>
        <div class="alert-line"></div>
    </div>
@endif
@if (session('error'))
    <div class="alert-info alert-danger">
        <h6>Status error</h6>
        <div class="alert-close">x</div>
        <p>{{ session('error') }}</p>
        <div class="alert-line"></div>
    </div>
@endif
</div>

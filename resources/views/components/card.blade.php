<div class="card">
    <div class="card-header with-border">
        <h3 class="card-title shadow p-3 bg-white rounded"><strong>{{ $title }}</strong></h3>
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
    {{ $footer }}
</div>
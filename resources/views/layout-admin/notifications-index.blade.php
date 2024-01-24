@foreach($notifications as $notification)
    <a href="#">
        <div class="notif-icon notif-{{ $notification->type }}"> <i class="{{ $notification->icon }}"></i> </div>
        <div class="notif-content">
            <span class="block">
                {{ $notification->message }}
            </span>
            <span class="time">{{ $notification->created_at->diffForHumans() }}</span>
        </div>
    </a>
@endforeach

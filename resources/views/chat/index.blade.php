@extends('layouts.admin-panel')

@section('content')
<div class="container-fluid small">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Customer Chats</h1>
  <p class="mb-4">Any query or information you need! Chat with us.</p>

  <div class="w-100">
    <div class="container py-2 px-4">
      <div class="row rounded-lg overflow-hidden shadow">
        <!-- Users box-->
        <div class="col-md-3 col-sm-12 px-0">
          <div class="bg-white">
    
            <div class="bg-gray px-4 py-2 bg-light">
              <p class="h5 mb-0 py-1">Recent</p>
            </div>
    
            <div class="messages-box clientbox">

              <div class="list-group rounded-0">
                <a class="list-group-item list-group-item-action active text-white rounded-0">
                  <div class="media"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
                    <div class="media-body ml-4">
                      <div class="d-flex align-items-center justify-content-between mb-1">
                        <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">25 Dec</small>
                      </div>
                      <p class="font-italic mb-0 text-small">Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                    </div>
                  </div>
                </a>
    
                <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                  <div class="media"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
                    <div class="media-body ml-4">
                      <div class="d-flex align-items-center justify-content-between mb-1">
                        <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">14 Dec</small>
                      </div>
                      <p class="font-italic text-muted mb-0 text-small">Lorem ipsum dolor sit amet, consectetur. incididunt ut labore.</p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- Chat Box-->
        <div class="col-md-9 col-sm-12 px-0 chatbox">
          <div class="px-4 py-5 chat-box bg-white chatbox-list">
            <!-- Sender Message-->
            <div class="media w-50 mb-3"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
              <div class="media-body ml-3">
                <div class="bg-light rounded py-2 px-3 mb-2">
                  <p class="text-small mb-0 text-muted">Test which is a new approach all solutions</p>
                </div>
                <p class="small text-muted">12:00 PM | Aug 13</p>
              </div>
            </div>
    
            <!-- Reciever Message-->
            <div class="media w-50 ml-auto mb-3">
              <div class="media-body">
                <div class="bg-primary rounded py-2 px-3 mb-2">
                  <p class="text-small mb-0 text-white">Test which is a new approach to have all solutions</p>
                </div>
                <p class="small text-muted">12:00 PM | Aug 13</p>
              </div>
            </div>
    
            <!-- Sender Message-->
            <div class="media w-50 mb-3"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
              <div class="media-body ml-3">
                <div class="bg-light rounded py-2 px-3 mb-2">
                  <p class="text-small mb-0 text-muted">Test, which is a new approach to have</p>
                </div>
                <p class="small text-muted">12:00 PM | Aug 13</p>
              </div>
            </div>
    
            <!-- Reciever Message-->
            <div class="media w-50 ml-auto mb-3">
              <div class="media-body">
                <div class="bg-primary rounded py-2 px-3 mb-2">
                  <p class="text-small mb-0 text-white">Apollo University, Delhi, India Test</p>
                </div>
                <p class="small text-muted">12:00 PM | Aug 13</p>
              </div>
            </div>
             <!-- Sender Message-->
             <div class="media w-50 mb-3"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
              <div class="media-body ml-3">
                <div class="bg-light rounded py-2 px-3 mb-2">
                  <p class="text-small mb-0 text-muted">Test, which is a new approach to have</p>
                </div>
                <p class="small text-muted">12:00 PM | Aug 13</p>
              </div>
            </div>
    
            <!-- Reciever Message-->
            <div class="media w-50 ml-auto mb-3">
              <div class="media-body">
                <div class="bg-primary rounded py-2 px-3 mb-2">
                  <p class="text-small mb-0 text-white">Apollo University, Delhi, India Test</p>
                </div>
                <p class="small text-muted">12:00 PM | Aug 13</p>
              </div>
            </div>
            

          </div>
    
          <!-- Typing area -->
          <form action="{{route('chat.store')}}" method="POST" class="bg-light">
            @csrf
            <input type="hidden" name="receiver" value="1">
            <div class="input-group border">
              <input type="text" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
              <div class="input-group-append">
                <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
              </div>
            </div>
          </form>
    
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@push('js')
<script>

</script>
@endpush

@push('css')
<style>
.chatbox-list{
  max-height:80vh;
  overflow-y: scroll;
  display: flex;
  flex-direction: column-reverse;
}

.clientbox{
  overflow-y: scroll;
}

::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  width: 5px;
  background: #f5f5f5;
}

::-webkit-scrollbar-thumb {
  width: 1em;
  background-color: #ddd;
  outline: 1px solid slategrey;
  border-radius: 1rem;
}

.text-small {
  font-size: 0.9rem;
}

.rounded-lg {
  border-radius: 0.5rem;
}

input::placeholder {
  font-size: 0.9rem;
  color: #999;
}
</style>
@endpush
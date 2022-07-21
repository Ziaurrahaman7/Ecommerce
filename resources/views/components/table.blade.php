@props(['link','name', 'title'])
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{$title}}</h1>
        <div class="card mb-4">
            <div class="card-body">
                <a target="_blank" class="btn btn-info" href="{{$link}}">{{$name}}</a>
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
              <div class="col-12">
                <div class="card my-4">
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                      <h6 class="text-white text-capitalize ps-3">{{$title}} table</h6>
                    </div>
                  </div>
                  <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                    
                        {{$slot}}
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</main>
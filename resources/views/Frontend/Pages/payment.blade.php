@extends('Frontend.Layout.app')
@section('content')
   <div class="container">
       <div class="row">
           <div class="col-lg-6">
                <div class="row">
                    <form action="{{url('order_place')}}" method="post">
                        @csrf
                    <div class="col-lg-3">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{asset('storage/Rocket.jpg')}}" style="width:120px;height:100px;"alt="Card image cap">
                            <div class="card-body">
                                <button name="payment_getway"  value="handcash" class="btn btn-info text-center">Rocket </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{asset('storage/bkash.png')}}" style="width:120px;height:100px;" alt="Card image cap">
                            <div class="card-body">
                                 <button name="payment_getway"  value="Bkash" class="btn btn-default text-center">B-kash </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{asset('storage/visa.png')}}" style="width:120px;height:100px;" alt="Card image cap">
                            <div class="card-body">
                                <button name="payment_getway"  value="Visa" class="btn btn-primary text-center">Visa </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
           </div>
           <div class="col-lg-6">
               <div class="card" style="width: 18rem;">
                   <div class="card-body">
                       <h5 class="card-title">Card title</h5>
                       <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                       <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                       <a href="#" class="card-link">Card link</a>
                       <a href="#" class="card-link">Another link</a>
                   </div>
               </div>
           </div>
       </div>
   </div>

@endsection

@extends('master')

@section('title')
Contact us تواصل معنا
@endsection

{{-- page css files or code  --}}
@section('css')

@endsection
{{-- page css files or code !!!! --}}

{{-- content of page  --}}
@section('content')
    <div class="wrapper">


    <div id="thanks">
       <span class="close">&times;</span>
              <p style="font-size:20px;">
                {{__('contact.thankMessuage')}}
            </p>
       </div>

<!-- Contact Start -->
<div class="contact wow fadeInUp" id="contact" >
   <div class="container">
    @include('message')
       <div class="section-header text-center">
           <h2 style="color:#4b5159;">{{__('home.contactTitle')}}</h2>
       </div>

       <div class="row">
           <div class="col-md-6">
               <div class="contact-info">
                   <div class="contact-item">
                       <i class="flaticon-call"></i>
                       <div class="contact-text">
                              <h2 style="" >{{__('home.phone')}}</h2>
                           <p>779604020 967+</p>
                       </div>
                   </div>
                   <div class="contact-item">
                       <i class="flaticon-send-mail"></i>
                       <div class="contact-text">
                          <h2 style="" >{{__('home.email')}}</h2>
                           <p>info@buildplus.online</p>
                       </div>
                   </div>
                  </div>
               </div>
           <div class="col-md-6">
               <div class="contact-form">
                   <div id="success"></div>
                   <form method="POST" action="{{ route('contact_us_store') }}" id="form" >
                        @csrf
                    <div class="control-group">
                              <label for="name"></label>
                           <input type="text" class="form-control" name="name" id="name" placeholder="{{__('home.name')}}" required="required"  value="{{ old('name') }}"/>
                           @if ($errors->has('name'))
                           <span class="text-danger">{{ $errors->first('name') }}</span>
                       @endif
                       </div>
                       <div class="control-group">
                              <label for="name"></label>
                           <input type="email" class="form-control" name="email" id="email" placeholder="{{__('home.email')}}" required="required"value="{{ old('email') }}" />
                           @if ($errors->has('email'))
                           <span class="text-danger">{{ $errors->first('email') }}</span>
                          @endif
                       </div>
                       <div class="control-group">
                              <label for="subject"></label>
                           <input type="text" class="form-control" name="subject" id="subject" placeholder="{{__('home.subject')}}"  required="required" value="{{ old('subject') }}"/>

                           @if ($errors->has('subject'))
                           <span class="text-danger">{{ $errors->first('subject') }}</span>
                       @endif                        </div>
                       <div class="control-group">
                              <label for="message"></label>
                           <textarea class="form-control" name="message" id="message" placeholder="{{__('home.message')}}" required="require" >{{ old('message') }}</textarea>
                           @if ($errors->has('message'))
                           <span class="text-danger">{{ $errors->first('message') }}</span>
                       @endif
                       </div>
                       <div>
                           <button class="btn mt-3" type="submit" id="sendMessageButton"> {{__('home.send')}}</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>

   </div>
</div>
<!-- Contact End -->


</div>
<!-- JavaScript Libraries -->


@endsection

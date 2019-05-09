@extends('main')



@section('title','| Contacts')

@section('content')
            <div classs="row">
                <div class="col-md-12">
                    <h1>Contact us</h1>
                    <p>
                      <form action="{{ url('contact') }}" method="POST">

                        {{ csrf_field() }}
                          <div class="from-group">
                              <label name="email">Email</label>
                              <input id="email" type="email" class="form-control" name="email">
                          </div>
                          
                          <div class="from-group">
                              <label name="subject">Subject</label>
                              <input id="subject" type="text" class="form-control" name="subject">
                          </div>

                          <div class="from-group">
                              <label name="message">Message</label>
                              <textarea id="message" class="form-control" name="message" placeholder="Type message here..."></textarea> 
                              
                        </div>

                        <input type="submit" value="Send Message" class="btn btn-success">

                      </form>
                    </p>
                </div>
            </div><!--End of .row-->

@endsection
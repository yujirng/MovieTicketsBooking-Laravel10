@extends('layouts.app.main')
@section('content')
    <div class="content">
        <div class="fluid-container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row align-items-center">
                        <div class="col-lg-7 mb-5 mb-lg-0">
                            <h2 class="mb-5">Fill the form. <br> It's easy.</h2>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" name="username" id="feedbackname"
                                            placeholder="First name" required pattern="[a-zA-Z ]+">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="email" class="form-control" name="email" id="feedbackemail"
                                            placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <textarea class="form-control" name="message" id="feedbackmessage" cols="30" rows="7"
                                            placeholder="Write your message" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="submit" data-toggle="modal" class="btn btn-dark" value="Send Massage">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4 ml-auto">
                            <h3 class="mb-4">Let's talk about everything.</h3>
                            <p>Do Let Us Carnow Your Thoughts and Suggestions on How We Can Survey You Better. Give us
                                feedback on how you feel about our service.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

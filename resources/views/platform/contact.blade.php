<!DOCTYPE html>
<html lang="zxx" class="no-js">


@include('platform.header')

<style>

.myform{
    background-color: #f3eaf9;
    padding-top: 75px;
    padding-bottom: 40px;
}

</style>

<body>

@include('platform.navbar')

@include('sweetalert::alert')

<section class="banner-area">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-12 banner-right">
                <h1 class="text-white">
                    Contacts
                </h1>
                <p class="mx-auto text-white  mt-20 mb-40">
                    In the history of modern astronomy, there is probably no one greater leap forward than the building.
                </p>
            </div>
        </div>
    </div>
</section>

<div class="mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center myform">
            <div class="col-lg-8">
                <form class="form-area contact-form text-right" id="myForm" 
                action="{{route('send.message')}}" method="post">
                @csrf
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                class="common-input mb-20 form-control" required="" type="text">

                            <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control"
                                required="" type="email">

                            <input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'"
                                class="common-input mb-20 form-control" required="" type="text">
                        </div>
                        <div class="col-lg-6 form-group">
                            <textarea class="common-textarea form-control" name="message" placeholder="Enter Messege" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter Messege'" required=""></textarea>
                        </div>
                        <div class="col-lg-12">
                            <div class="alert-msg" style="text-align: left;"></div>
                            <button class="genric-btn primary circle" style="float: right;">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




  @include('platform.footer')

</body>

</html>
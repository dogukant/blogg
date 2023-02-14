@extends('front.layouts.master')
@section('title','iletisim')
@section('bg','http://ajansnigde.com/resimler/icerikler/89235.jpg')
@section('content')
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                <p>İletişime Geçin</p>
                <div class="my-5">

                    <form method="post" action="{{route('contact.post')}}" ">
                     @csrf
                        <div class="form-floating">
                            <input class="form-control" name="name" type="text" placeholder="Adınız" data-sb-validations="" />
                            <label>Ad Soyad</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" name="email" type="email" placeholder="Mail adresiniz" data-sb-validations="" />
                            <label>Mail Adresi</label>

                        </div>
                        <div class="control-group">
                            <div class="form-group col-xs-12 controls">
                                <label> Konu </label>
                            <select class="form-control" name="topic">
                                <option>Bilgi</option>
                                <option>Destek</option>
                                <option>Genel</option>
                            </select>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" name="message" placeholder="Mesajınız" style="height: 12rem" data-sb-validations=""></textarea>
                            <label for="message">Mesaj</label>
                            <div class="invalid-feedback" data-sb-feedback="message:">A message is required.</div>
                        </div>
                            </div>
                        <br />

                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>

                        <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Gönder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

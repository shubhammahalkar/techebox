


{{--
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('frontend.try_guidecategory')}}" class="btn btn-primary">Continue</a>
        </div>
    </div>
</div> --}}

@extends('frontend.layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <style>
        #title-container {
            min-height: 460px;
            height: 100%;
            color: #fff;
            background-color: #DC3545;
            text-align: center;
            padding: 105px 28px 28px 28px;
            box-sizing: border-box;
            position: relative;
            box-shadow: 10px 8px 21px 0px rgba(204, 204, 204, 0.75);
            -webkit-box-shadow: 10px 8px 21px 0px rgba(204, 204, 204, 0.75);
            -moz-box-shadow: 10px 8px 21px 0px rgba(204, 204, 204, 0.75);
        }

        #title-container h2 {
            font-size: 45px;
            font-weight: 800;
            color: #fff;
            padding: 0;
            margin-bottom: 0px;
        }

        #title-container h3 {
            font-size: 25px;
            font-weight: 600;
            color: #82000a;
            padding: 0;
        }

        #title-container p {
            font-size: 13px;
            padding: 0 25px;
            line-height: 20px;
        }

        .covid-image {
            width: 214px;
            margin-bottom: 15px;
        }
        #qbox-container {
            background: url(../img/corona.png);
            background-repeat: repeat;
            position: relative;
            padding: 62px;
            min-height: 630px;
            box-shadow: 10px 8px 21px 0px rgba(204, 204, 204, 0.75);
            -webkit-box-shadow: 10px 8px 21px 0px rgba(204, 204, 204, 0.75);
            -moz-box-shadow: 10px 8px 21px 0px rgba(204, 204, 204, 0.75);
        }

        #steps-container {
            margin: auto;
            width: 500px;
            min-height: 420px;
            display: flex;
            vertical-align: middle;
            align-items: center;
        }

        .step {
            display: none;
        }

        .step h4 {
            margin: 0 0 26px 0;
            padding: 0;
            position: relative;
            font-weight: 500;
            font-size: 23px;
            font-size: 1.4375rem;
            line-height: 1.6;
        }

        button#prev-btn,
        button#next-btn,
        button#submit-btn {
            font-size: 17px;
            font-weight: bold;
            position: relative;
            width: 130px;
            height: 50px;
            background: #DC3545;
            margin: 0 auto;
            margin-top: 40px;
            overflow: hidden;
            z-index: 1;
            cursor: pointer;
            transition: color .3s;
            text-align: center;
            color: #fff;
            border: 0;
            -webkit-border-bottom-right-radius: 5px;
            -webkit-border-bottom-left-radius: 5px;
            -moz-border-radius-bottomright: 5px;
            -moz-border-radius-bottomleft: 5px;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        button#prev-btn:after,
        button#next-btn:after,
        button#submit-btn:after {
            position: absolute;
            top: 90%;
            left: 0;
            width: 100%;
            height: 100%;
            background: #cc0616;
            content: "";
            z-index: -2;
            transition: transform .3s;
        }

        button#prev-btn:hover::after,
        button#next-btn:hover::after,
        button#submit-btn:hover::after {
            transform: translateY(-80%);
            transition: transform .3s;
        }

        .progress {
            border-radius: 0px !important;
        }

        .q__question {
            position: relative;
        }

        .q__question:not(:last-child) {
            margin-bottom: 10px;
        }

        .question__input {
            position: absolute;
            left: -9999px;
        }

        .question__label {
            position: relative;
            display: block;
            line-height: 40px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background-color: #fff;
            padding: 5px 20px 5px 50px;
            cursor: pointer;
            transition: all 0.15s ease-in-out;
        }

        .question__label:hover {
            border-color: #DC3545;
        }

        .question__label:before,
        .question__label:after {
            position: absolute;
            content: "";
        }

        .question__label:before {
            top: 12px;
            left: 10px;
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background-color: #fff;
            box-shadow: inset 0 0 0 1px #ced4da;
            -webkit-transition: all 0.15s ease-in-out;
            -moz-transition: all 0.15s ease-in-out;
            -o-transition: all 0.15s ease-in-out;
            transition: all 0.15s ease-in-out;
        }

        .question__input:checked+.question__label:before {
            background-color: #DC3545;
            box-shadow: 0 0 0 0;
        }

        .question__input:checked+.question__label:after {
            top: 22px;
            left: 18px;
            width: 10px;
            height: 5px;
            border-left: 2px solid #fff;
            border-bottom: 2px solid #fff;
            transform: rotate(-45deg);
        }

        .form-check-input:checked,
        .form-check-input:focus {
            background-color: #DC3545 !important;
            outline: none !important;
            border: none !important;
        }

        input:focus {
            outline: none;
        }

        #input-container {
            display: inline-block;
            box-shadow: none !important;
            margin-top: 36px !important;
        }

        label.form-check-label.radio-lb {
            margin-right: 15px;
        }

        #q-box__buttons {
            text-align: center;
        }

        input[type="text"],
        input[type="email"] {
            padding: 8px 14px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border: 1px solid #DC3545;
            border-radius: 5px;
            outline: 0px !important;
            -webkit-appearance: none;
            box-shadow: none !important;
            -webkit-transition: all 0.15s ease-in-out;
            -moz-transition: all 0.15s ease-in-out;
            -o-transition: all 0.15s ease-in-out;
            transition: all 0.15s ease-in-out;
        }

        .form-check-input:checked[type=radio],
        .form-check-input:checked[type=radio]:hover,
        .form-check-input:checked[type=radio]:focus,
        .form-check-input:checked[type=radio]:active {
            border: none !important;
            -webkit-outline: 0px !important;
            box-shadow: none !important;
        }

        .form-check-input:focus,
        input[type="radio"]:hover {
            box-shadow: none;
            cursor: pointer !important;
        }

        #success {
            display: none;
        }

        #success h4 {
            color: #DC3545;
        }

        .back-link {
            font-weight: 700;
            color: #DC3545;
            text-decoration: none;
            font-size: 18px;
        }

        .back-link:hover {
            color: #82000a;
        }
        #preloader-wrapper {
            width: 100%;
            height: 100%;
            z-index: 1000;
            display: none;
            position: fixed;
            top: 0;
            left: 0;
        }

        #preloader {
            background-image: url('../img/preloader.png');
            width: 120px;
            height: 119px;
            border-top-color: #fff;
            border-radius: 100%;
            display: block;
            position: relative;
            top: 50%;
            left: 50%;
            margin: -75px 0 0 -75px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            z-index: 1001;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        #preloader-wrapper .preloader-section {
            width: 51%;
            height: 100%;
            position: fixed;
            top: 0;
            background: #F7F9FF;
            z-index: 1000;
        }

        #preloader-wrapper .preloader-section.section-left {
            left: 0
        }

        #preloader-wrapper .preloader-section.section-right {
            right: 0;
        }

        .loaded #preloader-wrapper .preloader-section.section-left {
            transform: translateX(-100%);
            transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
        }

        .loaded #preloader-wrapper .preloader-section.section-right {
            transform: translateX(100%);
            transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
        }

        .loaded #preloader {
            opacity: 0;
            transition: all 0.3s ease-out;
        }

        .loaded #preloader-wrapper {
            visibility: hidden;
            transform: translateY(-100%);
            transition: all 0.3s 1s ease-out;
        }

        @media (min-width: 990px) and (max-width: 1199px) {
            #title-container {
                padding: 80px 28px 28px 28px;
            }
            #steps-container {
                width: 85%;
            }
        }

        @media (max-width: 991px) {
            #title-container {
                padding: 30px;
                min-height: inherit;
            }
        }

        @media (max-width: 767px) {
            #qbox-container {
                padding: 30px;
            }
            #steps-container {
                width: 100%;
                min-height: 400px;
            }
            #title-container {
                padding-top: 50px;
            }
        }

        @media (max-width: 560px) {
            #qbox-container {
                padding: 40px;
            }
            #title-container {
                padding-top: 45px;
            }
        }
        .radio-toolbar {
  margin: 10px;
}

.radio-toolbar input[type="radio"] {
    background-color: #ddd;
  opacity: 0;
  position: fixed;
  width: 0;
}

.radio-toolbar label {
    display: inline-block;

    padding: 10px 20px;
    font-family: sans-serif, Arial;
    font-size: 16px;

    border-radius: 4px;
}

/* .radio-toolbar label:hover {
  background-color: #dfd;
} */

  .radio-toolbar input[type="radio"]:focus + label + p {
    border: 2px   #444;
}

.radio-toolbar input[type="radio"]:checked + label   {
    background-color: #bfb;
    border-color: #4c4;
}
        </style>
</head>
<body>


    <!-- CONTAINER -->
    <div class="container d-flex align-items-center min-vh-100">
        <div class="row g-0 justify-content-center">
            <!-- TITLE -->
            <div class="col-lg-4 offset-lg-1 mx-0 px-0">
                <div id="title-container">
                    <img class="covid-image" src="./img/covid-check.png">
                    <h1>Tech E-Box</h1>
                    <h2> Try Guide</h2>
                    <p>A clinical assessment multi-step form that will assist individuals on deciding when to seek testing or medical care if they suspect they or someone they know has contracted COVID-19 or has come into close contact with someone who has COVID-19</p>
                </div>
            </div>
            <!-- FORMS -->
            <div class="col-lg-7 mx-0 px-0">
                <div class="progress">
                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%"></div>
                </div>
                <div id="qbox-container">
                    <form class="needs-validation" id="form-wrapper" method="post" name="form-wrapper" novalidate="">
                        <div id="steps-container">
                            <div class="step">
                                <h4>Have you recently been in close contact with someone who has COVID-19?</h4>
                                {{-- <div class="form-check ps-0 q-box">
                                    <div class="q-box__question">
                                        <input class="form-check-input question__input" id="q_1_yes" name="q_1" type="radio" value="Yes">
                                        <label class="form-check-label question__label" for="q_1_yes">Yes</label>
                                    </div>
                                    <div class="q-box__question">
                                        <input checked class="form-check-input question__input" id="q_1_no" name="q_1" type="radio" value="No">
                                        <label class="form-check-label question__label" for="q_1_no">No</label>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="step">

                                @foreach ($categories as $category)
                                    <div class="radio-toolbar border " style="background-color: orange;border-radius: 7px;">


                                        <img src="{{uploaded_asset($category->logo)}}" width="50" height="50">
                                        <input type="radio" id="{{$category->name}}" name="radioFruit" value="apple" checked>
                                        <label for="{{$category->name}}">{{$category->name}}</label>
                                        <p for="{{$category->name}}">{{$category->short_description}}</p>




                                    </div>
                                    @endforeach
                            </div>

                            <div class="step">
                                <h4>Have you traveled to any of these countries with the highest number of COVID-19 cases in the world for the past 2 weeks?</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input q-checkbox" id="q_4_uk" name="q_4" type="checkbox" value="uk">
                                                <label class="form-check-label question__label" for="q_4_uk">UK</label>
                                            </div>
                                        </div>
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_4_us" name="q_4" type="checkbox" value="us">
                                                <label class="form-check-label question__label" for="q_4_us">US</label>
                                            </div>
                                        </div>
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_4_br" name="q_3" type="checkbox" value="br">
                                                <label class="form-check-label question__label" for="q_4_br">Brazil</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_4_de" name="q_4" type="checkbox" value="de">
                                                <label class="form-check-label question__label" for="q_4_de">Germany</label>
                                            </div>
                                        </div>
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_4_in" name="q_4" type="checkbox" value="in">
                                                <label class="form-check-label question__label" for="q_4_in">India</label>
                                            </div>
                                        </div>
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_4_eu" name="q_4" type="checkbox" value="eu">
                                                <label class="form-check-label question__label" for="q_4_eu">Europe</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_4_none" name="q_4" type="checkbox" value="none">
                                                <label class="form-check-label question__label" for="q_4_none">I did not travelled to any of these countries</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="step">
                                <div class="mt-1">
                                    <div class="closing-text">
                                        <h4>That's about it! Stay healthy!</h4>
                                        <p>We will assess your information and will let you know soon if you need to get tested for COVID-19.</p>
                                        <p>Click on the submit button to continue.</p>
                                    </div>
                                </div>
                            </div>
                            <div id="success">
                                <div class="mt-5">
                                    <h4>Success! We'll get back to you ASAP!</h4>
                                    <p>Meanwhile, clean your hands often, use soap and water, or an alcohol-based hand rub, maintain a safe distance from anyone who is coughing or sneezing and always wear a mask when physical distancing is not possible.</p>
                                    <a class="back-link" href="">Go back from the beginning ???</a>
                                </div>
                            </div>
                        </div>
                        <div id="q-box__buttons">
                            <button id="prev-btn" type="button">Previous</button>
                            <button id="next-btn" type="button">Next</button>
                            <button id="submit-btn" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- PRELOADER -->
    <div id="preloader-wrapper">
        <div id="preloader"></div>
        <div class="preloader-section section-left"></div>
        <div class="preloader-section section-right"></div>
    </div>
    {{-- <script src="js/script.js">
    </script>
<!-- Static App Form Collection Script -->
<script src="https://static.app/js/static-forms.js" type="text/javascript"></script>
<!-- Static App Form Collection Script -->
<script src="https://static.app/js/static-forms.js" type="text/javascript"></script>
<!-- Static App Form Collection Script -->
<script src="" type="text/javascript"></script>
<!-- Static App Form Collection Script -->
<script src="" type="text/javascript"></script> --}}
</body>
</html>





@endsection
























<script>

let step = document.getElementsByClassName('step');
let prevBtn = document.getElementById('prev-btn');
let nextBtn = document.getElementById('next-btn');
let submitBtn = document.getElementById('submit-btn');
let form = document.getElementsByTagName('form')[0];
let preloader = document.getElementById('preloader-wrapper');
let bodyElement = document.querySelector('body');
let succcessDiv = document.getElementById('success');

form.onsubmit = () => {
    return false
}
let current_step = 0;
let stepCount = 6
step[current_step].classList.add('d-block');
if (current_step == 0) {
    prevBtn.classList.add('d-none');
    submitBtn.classList.add('d-none');
    nextBtn.classList.add('d-inline-block');
}
const progress = (value) => {
    document.getElementsByClassName('progress-bar')[0].style.width = `${value}%`;
}
nextBtn.addEventListener('click', () => {
    current_step++;
    let previous_step = current_step - 1;
    if ((current_step > 0) && (current_step <= stepCount)) {
        prevBtn.classList.remove('d-none');
        prevBtn.classList.add('d-inline-block');
        step[current_step].classList.remove('d-none');
        step[current_step].classList.add('d-block');
        step[previous_step].classList.remove('d-block');
        step[previous_step].classList.add('d-none');
        if (current_step == stepCount) {
            submitBtn.classList.remove('d-none');
            submitBtn.classList.add('d-inline-block');
            nextBtn.classList.remove('d-inline-block');
            nextBtn.classList.add('d-none');
        }
    } else {
        if (current_step > stepCount) {
            form.onsubmit = () => {
                return true
            }
        }
    }
    progress((100 / stepCount) * current_step);
});


prevBtn.addEventListener('click', () => {
    if (current_step > 0) {
        current_step--;
        let previous_step = current_step + 1;
        prevBtn.classList.add('d-none');
        prevBtn.classList.add('d-inline-block');
        step[current_step].classList.remove('d-none');
        step[current_step].classList.add('d-block')
        step[previous_step].classList.remove('d-block');
        step[previous_step].classList.add('d-none');
        if (current_step < stepCount) {
            submitBtn.classList.remove('d-inline-block');
            submitBtn.classList.add('d-none');
            nextBtn.classList.remove('d-none');
            nextBtn.classList.add('d-inline-block');
            prevBtn.classList.remove('d-none');
            prevBtn.classList.add('d-inline-block');
        }
    }

    if (current_step == 0) {
        prevBtn.classList.remove('d-inline-block');
        prevBtn.classList.add('d-none');
    }
    progress((100 / stepCount) * current_step);
});


submitBtn.addEventListener('click', () => {
    preloader.classList.add('d-block');

    const timer = ms => new Promise(res => setTimeout(res, ms));

    timer(3000)
        .then(() => {
            bodyElement.classList.add('loaded');
        }).then(() => {
            step[stepCount].classList.remove('d-block');
            step[stepCount].classList.add('d-none');
            prevBtn.classList.remove('d-inline-block');
            prevBtn.classList.add('d-none');
            submitBtn.classList.remove('d-inline-block');
            submitBtn.classList.add('d-none');
            succcessDiv.classList.remove('d-none');
            succcessDiv.classList.add('d-block');
        })

});
</script>

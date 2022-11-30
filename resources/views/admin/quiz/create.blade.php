<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('_layout.layout_main')
@php
$no_of_questions = 2;
@endphp
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
                <a class="opacity-3 text-dark" href="javascript:;">
                    <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>Kampus Gratis </title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-1716.000000, -439.000000)" fill="#252f40" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                    <g transform="translate(0.000000, 148.000000)">
                                        <path
                                            d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                        </path>
                                        <path
                                            d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
            </li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Quiz</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Quiz</h6>
    </nav>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">New Quiz</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Major</label>
                            <select name="major_id" class="form-control major_id" id="major_id" required>
                                @foreach ($major as $x)
                                    <option value={{ $x->id }}>
                                        {{ $x->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <select name="subject_id" class="form-control subject_id" id="subject_id"
                                data-dependent="major_id" required>
                                @foreach ($subject as $x)
                                    <option value={{ $x->subject_id }}>
                                        {{ $x->subject->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Session No.</label>
                            <select name="session_no" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <div id="question-wrapper">
                                <div class="card p-3 mb-3" id="question" data-question="0" style="border:1px solid #d2d6da">
                                    <h3 id="question-title" contenteditable="true">Pertanyaan</h3>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pertanyaan_input" id="pertanyaan_input" value="Jawaban 1">
                                        <label class="form-check-label" id="pertanyaan_label" contenteditable="true" data-id="pertanyaan1" oninput="handleInputValue(event)">
                                          Jawaban 1
                                        </label>
                                    </div>     
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pertanyaan_input" id="pertanyaan_input" value="Jawaban 2 ">
                                        <label class="form-check-label" id="pertanyaan_label" contenteditable="true" data-id="pertanyaan1" oninput="handleInputValue(event)">
                                          Jawaban 2 
                                        </label>
                                    </div>      
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pertanyaan_input" id="pertanyaan_input" value="Jawaban 3">
                                        <label class="form-check-label" id="pertanyaan_label" contenteditable="true" data-id="pertanyaan1" oninput="handleInputValue(event)">
                                          Jawaban 3
                                        </label>
                                    </div>      
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pertanyaan_input" id="pertanyaan_input" value="Jawaban 4">
                                        <label class="form-check-label" id="pertanyaan_label" contenteditable="true" data-id="pertanyaan1" oninput="handleInputValue(event)">
                                          Jawaban 4
                                        </label>
                                    </div>               
                                </div>
                            </form>
                            <div class="row">
                                <div class="col text-end">
                                    <button class="btn plus" id="tambah-pertanyaan">
                                        <i class="fa fa-icon fa-plus"></i>
                                    </button>
                                </div>
                                <div class="col text-start">
                                    <button class="btn min" onclick="removeQuestion(event)">
                                        <i class="fa fa-icon fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{-- @for ($i = 0; $i < $no_of_questions; $i++)
                            <div class="form-group card border p-2">
                                <label>Question 1</label>
                                <div class="container p-0">
                                    <div>
                                        <textarea type="text" placeholder="Question 1" class="form-control mb-3" name="question1"></textarea>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <input type="text" placeholder="Choice A" class="form-control"
                                                name="choice[]">
                                        </div>
                                        <div class="col">
                                            <input type="text" placeholder="Choice B" class="form-control"
                                                name="choice[]">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" placeholder="Choice C" class="form-control"
                                                name="choice[]">
                                        </div>
                                        <div class="col">
                                            <input type="text" placeholder="Choice D" class="form-control"
                                                name="choice[]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-end">
                                    <button class="btn plus">
                                        <i class="fa fa-icon fa-plus"></i>
                                    </button>
                                </div>
                                <div class="col text-start">
                                    <button class="btn min">
                                        <i class="fa fa-icon fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        @endfor --}}
                        <a href="/quiz" type="button" class="btn btn-outline-primary btn-sm mb-0">
                            Back
                        </a>
                        <button type="submit" class="btn bg-gradient-primary btn-sm mb-0" id="simpan-pertanyaan">
                            Submit
                        </button>
                    <button class="test"></button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('sweetalert')
    {{-- DELETE WITH SWEETALERT --}}
    {{-- <script>
        var sites = {!! json_encode($no_of_questions) !!};
        $(document).ready(function() {
            $('.test').click(function() {
                sites++
                console.log(sites)
            })
        })
    </script> --}}

      <script>  
        let id = 1;
        function handleTambahPertanyaan(e) {
            e.preventDefault();
            $("#question-wrapper").append(`
            <div class="card p-3 mb-3" id="question" data-question="${id}">
                <h3 id="question-title" contenteditable="true">Pertanyaan</h3>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pertanyaan_input${id}" id="pertanyaan_input${id}" value="Jawaban 1">
                        <label class="form-check-label" id="pertanyaan_label" contenteditable="true" data-id="pertanyaan1" oninput="handleInputValue(event)">
                          Jawaban 1
                        </label>
                    </div>     
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pertanyaan_input${id}" id="pertanyaan_input${id}" value="Jawaban 2">
                        <label class="form-check-label" id="pertanyaan_label" contenteditable="true" data-id="pertanyaan1" oninput="handleInputValue(event)">
                          Jawaban 2
                        </label>
                    </div>      
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pertanyaan_input${id}" id="pertanyaan_input${id}" value="Jawaban 3">
                        <label class="form-check-label" id="pertanyaan_label" contenteditable="true" data-id="pertanyaan1" oninput="handleInputValue(event)">
                          Jawaban 3
                        </label>
                    </div>      
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pertanyaan_input${id}" id="pertanyaan_input${id}" value="Jawaban 4">
                        <label class="form-check-label" id="pertanyaan_label" contenteditable="true" data-id="pertanyaan1" oninput="handleInputValue(event)">
                          Jawaban 4
                        </label>
                    </div>    
                    <div class="row">
                                <div class="col text-end">
                                    <button class="btn plus" id="tambah-pertanyaan">
                                        <i class="fa fa-icon fa-plus"></i>
                                    </button>
                                </div>
                                <div class="col text-start">
                                    <button class="btn min" onclick="removeQuestion(event)">
                                        <i class="fa fa-icon fa-trash"></i>
                                    </button>
                                </div>
                            </div>           
                </div>
            `);

            id++;
        }

        $("#simpan-pertanyaan").click(function(e) {
            const form = document.querySelector("#question-form"); 
            const questionElement = document.querySelectorAll("#question");
            const questions = [];
            const answer = [];


            const majorElement = document.querySelector("#major_id");
            const majorId = majorElement.options[majorElement.selectedIndex].text

            const subjectElement = document.querySelector("#subject_id");
            const subjectId = subjectElement.options[subjectElement.selectedIndex].text

            const sessionElement = document.querySelector("select[name=session_no]");
            const sessionId = sessionElement.options[sessionElement.selectedIndex].text
           

            questionElement.forEach(item => {
                const radioElement = [...item.querySelectorAll(".form-check input[type='radio']")];
                const question = item.querySelector("#question-title").textContent;
                const choices = radioElement.map(data =>
                    data.value);

                const checked = radioElement.find(data =>
                    data.checked).value;  

                const val = {
                    question,
                    choices
                }

        
                questions.push(val);
                answer.push(checked);
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                }
            })
            $.ajax({
                url: `{{ url('/quiz-store') }}`,
                method: "POST",
                data: {
                    majorId,
                    subjectId,
                    sessionId,
                    questions ,
                    answer
                },
                beforeSend: function(){
                        swal({
                            title:"", 
                            text:"Loading...",
                            icon: "https://www.boasnotas.com/img/loading2.gif",
                            buttons: false,      
                            closeOnClickOutside: false,
                            timer: 3000,
                            allowOutsideClick: false
                        });
                },
                success: function(result) {
                    swal("Berhasil!", "Data Berhasil Ditambahkan!", "success");
                },
                error: function(err) {
                    console.log(err);
                }
            })
        });


        function removeQuestion(e) {
            e.preventDefault();
            $(e.target).closest("#question").remove();
            console.log(e.target)
        }

        function handleInputValue(e){
            const element = e.target.previousElementSibling
            element.value = e.target.textContent
            console.log(element);
        }
        

        $("body").on("click","#tambah-pertanyaan",handleTambahPertanyaan);
    </script>
@endsection
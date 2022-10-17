@extends('_layout.layout_main')

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
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">User</a>
            </li>
            <li class="breadcrumb-item text-sm text-dark" aria-current="page">Verify User</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Verify</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Credentials and Files</h6>
    </nav>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h5 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Administrasi Diri
                                    @if ($data->is_approved['component']['biodata'])
                                        <i class="fas fa-check ms-4 text-success" aria-hidden="true"></i>
                                    @endif
                                </button>
                            </h5>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form method="POST" enctype="multipart/form-data"
                                        action="/verifyUser-verify/{{ $data->id }}">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <div class="h6">Full Name</div>
                                                        <div class="small">{{ $data->full_name }}</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="h6">Email</div>
                                                        <div class="small">{{ $data->email }}</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="h6">Program Studi</div>
                                                        <div class="small">{{ $data->study_program }}</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="h6">Semester</div>
                                                        <div class="small">{{ $data->semester }}</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="h6">NIN</div>
                                                        <div class="small" id="nin" name="nin">
                                                            {{ $data->nin }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <div class="h6">Birth Place</div>
                                                        <div class="small">{{ $data->birth_place }}</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="h6">Birth Date</div>
                                                        <div class="small">{{ $data->birth_date }}</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="h6">NSN</div>
                                                        <div class="small">{{ $data->nsn }}</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="h6">Gender</div>
                                                        <div class="small">
                                                            @if ($data->gender == 0)
                                                                Not Set
                                                            @elseif ($data->gender == 1)
                                                                Laki-laki
                                                            @elseif ($data->gender == 2)
                                                                Wanita
                                                            @elseif ($data->gender == 2)
                                                                Selainnya
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="h6">University Origin</div>
                                                        <div class="small">{{ $data->university_of_origin }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <div class="h6">NIN Address</div>
                                                        <div class="small">{{ $data->nin_address }}</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="h6">Phone number</div>
                                                        <div class="small">{{ $data->phone }}</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="h6">Residence Address</div>
                                                        <div class="small">{{ $data->residence_address }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (!$data->is_approved['component']['biodata'])
                                                <button type="submit" class="btn bg-gradient-success btn-sm p-2 mt-4"
                                                    id="submitSelfData" name="verified" value="selfData">
                                                    <i class="fas fa-check" aria-hidden="true"></i>
                                                    Verify
                                                </button>
                                                <button type="submit" class="btn bg-gradient-danger btn-sm p-2 mt-4"
                                                    name="denied" value="selfData">
                                                    <i class="fas fa-times"></i>
                                                    Deny
                                                </button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h5 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <div>Administrasi Keluarga</div>
                                    @if ($data->is_approved['component']['familial'])
                                        <i class="fas fa-check ms-4 text-success" aria-hidden="true"></i>
                                    @endif
                                </button>
                            </h5>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form method="POST" enctype="multipart/form-data"
                                        action="/verifyUser-verify/{{ $data->id }}">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <div class="h6">Father's Name</div>
                                                        <div class="small">{{ $data->father_name }}</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="h6">Father's Occupation</div>
                                                        <div class="small">{{ $data->father_occupation }}</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="h6">Occupation</div>
                                                        <div class="small">
                                                            {{ $data->occupation }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <div class="h6">Mother's Name</div>
                                                        <div class="small">{{ $data->mother_name }}</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="h6">Mother's Occupation</div>
                                                        <div class="small">{{ $data->mother_occupation }}</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="h6">Income</div>
                                                        <div class="small">{{ $data->income }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <div class="h6">Financier</div>
                                                        <div class="small">{{ $data->financier }}</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="h6">Living Partner</div>
                                                        <div class="small">{{ $data->living_partner }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (!$data->is_approved['component']['familial'])
                                                <button type="submit" class="btn bg-gradient-success btn-sm p-2 mt-4"
                                                    id="submitFamilial" name="verified" value="familyData">
                                                    <i class="fas fa-check"></i>
                                                    Verify
                                                </button>
                                                <button type="submit" class="btn bg-gradient-danger btn-sm p-2 mt-4"
                                                    name="denied" value="familyData">
                                                    <i class="fas fa-times"></i>
                                                    Deny
                                                </button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h5 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Administrasi File
                                    @if ($data->is_approved['component']['files'])
                                        <i class="fas fa-check ms-4 text-success" aria-hidden="true"></i>
                                    @endif
                                </button>
                            </h5>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form method="POST" enctype="multipart/form-data"
                                        action="/verifyUser-verify/{{ $data->id }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-10">
                                                <div class="h6">Integrity Pact</div>
                                                <img src={{ $data->integrity_pact_link }} class="img-fluid imeg">
                                                <div class="small p-0 m-0">
                                                    <a class="text-decoration-underline text-link" target="_blank"
                                                        href={{ $data->integrity_pact_link }}>
                                                        {{ $data->integrity_pact }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col d-flex justify-content-center">
                                                <input type="checkbox" name="valid[]" value="integrity_pact"
                                                    class="valid">
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-10">
                                                <div class="h6">NIN Card</div>
                                                <img src={{ $data->nin_card_link }} class="img-fluid imeg">
                                                <div class="small p-0 m-0">
                                                    <a class="text-decoration-underline text-link" target="_blank"
                                                        href={{ $data->nin_card_link }}>
                                                        {{ $data->nin_card }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col d-flex justify-content-center">
                                                <input type="checkbox" name="valid[]" value="nin_card" class="valid">
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-10">
                                                <div class="h6">Family Card</div>
                                                <img src={{ $data->family_card_link }} class="img-fluid imeg">
                                                <div class="small p-0 m-0">
                                                    <a class="text-decoration-underline text-link" target="_blank"
                                                        href={{ $data->family_card_link }}>
                                                        {{ $data->family_card }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col d-flex justify-content-center">
                                                <input type="checkbox" name="valid[]" value="family_card"
                                                    class="valid">
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-10">
                                                <div class="h6">Certificate</div>
                                                <img src={{ $data->certificate_link }} class="img-fluid imeg">
                                                <div class="small p-0 m-0">
                                                    <a class="text-decoration-underline text-link" target="_blank"
                                                        href={{ $data->certificate }}>
                                                        {{ $data->certificate }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col d-flex justify-content-center">
                                                <input type="checkbox" name="valid[]" value="certificate"
                                                    class="valid">
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-10">
                                                <div class="h6">Photo</div>
                                                <img src={{ $data->photo_link }} class="img-fluid imeg">
                                                <div class="small p-0 m-0">
                                                    <a class="text-decoration-underline text-link" target="_blank"
                                                        href={{ $data->photo_link }}>
                                                        {{ $data->photo }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col d-flex justify-content-center">
                                                <input type="checkbox" name="valid[]" value="photo" class="valid">
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-10">
                                                <div class="h6">Transcript</div>
                                                <img src={{ $data->transcript_link }} class="img-fluid imeg">
                                                <div class="small p-0 m-0">
                                                    <a class="text-decoration-underline text-link" target="_blank"
                                                        href={{ $data->transcript_link }}>
                                                        {{ $data->transcript }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col d-flex justify-content-center">
                                                <input type="checkbox" name="valid[]" value="transcript" class="valid">
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-10">
                                                <div class="h6">Recommendation Letter</div>
                                                <img src={{ $data->recommendation_letter_link }} class="img-fluid imeg">
                                                <div class="small p-0 m-0">
                                                    <a class="text-decoration-underline text-link" target="_blank"
                                                        href="/download/{{ $data->recommendation_letter }}">
                                                        {{ $data->recommendation_letter }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col d-flex justify-content-center">
                                                <input type="checkbox" name="valid[]" value="recommendation_letter"
                                                    class="valid">
                                            </div>
                                        </div>

                                        @if (!$data->is_approved['component']['files'])
                                            <button type="submit" class="btn bg-gradient-success btn-sm p-2 mt-4"
                                                id="submit" name="verified" value="documents">
                                                <i class="fas fa-check"></i>
                                                Verify
                                            </button>
                                            <button type="submit" class="btn bg-gradient-danger btn-sm p-2 mt-4"
                                                name="denied" value="documents">
                                                <i class="fas fa-times"></i>
                                                Deny
                                            </button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h5 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Administrasi Degree
                                    @if ($data->is_approved['component']['degree'])
                                        <i class="fas fa-check ms-4 text-success" aria-hidden="true"></i>
                                    @endif
                                </button>
                            </h5>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form method="POST" enctype="multipart/form-data"
                                        action="/verifyUser-verify/{{ $data->id }}">
                                        @csrf
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <div class="h6">Degree</div>
                                                <div class="small">
                                                    {{ $data->degree }}
                                                </div>
                                            </div>
                                            @if (!$data->is_approved['component']['degree'])
                                                <button type="submit" class="btn bg-gradient-success btn-sm p-2 mt-4"
                                                    id="submitDegree" name="verified" value="degree">
                                                    <i class="fas fa-check"></i>
                                                    Verify
                                                </button>
                                                <button type="submit" class="btn bg-gradient-danger btn-sm p-2 mt-4"
                                                    name="denied" value="degree">
                                                    <i class="fas fa-times"></i>
                                                    Deny
                                                </button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@section('sweetalert')
    <script>
        $(function() {
            $('.valid').click(function() {
                var val = []
                $(':checkbox:checked').each(function(i) {
                    val[i] = $(this).val()
                })
                if (val.length < 8) {
                    document.getElementById("submit").setAttribute("disabled", "disabled")
                }
                if (val.length === 8) {
                    console.log("enable")
                    document.getElementById("submit").removeAttribute("disabled")
                }
            })
        })
    </script>
@endsection

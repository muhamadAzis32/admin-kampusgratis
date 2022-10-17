<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/kgLogo.png') }}">
<link rel="icon" type="image/png" href="{{ asset('assets/img/KGLogo4.png') }}">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">


<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

<!-- Nucleo Icons -->
<link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

<!-- CSS Files -->
<link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />

{{-- Tagify --}}
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

{{-- Select2 --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css"
    integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous">
{{-- <!-- select2-bootstrap4-theme --> --}}
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css">
{{-- Select 2 --}}


<style>
    /* Suggestions items */
    :root {
        --tagify-dd-item-pad: .5em .7em;
    }

    .tagify__dropdown.users-list .tagify__dropdown__item {
        display: grid;
        grid-template-columns: auto 1fr;
        gap: 0 1em;
        grid-template-areas: "avatar name"
            "avatar email";
    }

    .tagify__dropdown.users-list .tagify__dropdown__item:hover .tagify__dropdown__item__avatar-wrap {
        transform: scale(1.2);
    }

    .tagify__dropdown.users-list .tagify__dropdown__item__avatar-wrap {
        grid-area: avatar;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        overflow: hidden;
        background: #EEE;
        transition: .1s ease-out;
    }

    .tagify__dropdown.users-list img {
        width: 100%;
        vertical-align: top;
    }

    .tagify__dropdown.users-list header.tagify__dropdown__item>div,
    .tagify__dropdown.users-list .tagify__dropdown__item strong {
        grid-area: name;
        width: 100%;
        align-self: center;
    }

    .tagify__dropdown.users-list span {
        grid-area: email;
        width: 100%;
        font-size: .9em;
        opacity: .6;
    }

    .tagify__dropdown.users-list .tagify__dropdown__item__addAll {
        border-bottom: 1px solid #DDD;
        gap: 0;
    }

    .tagify__dropdown.users-list .remove-all-tags {
        float: right;
        font-size: .8em;
        padding: .2em .3em;
        border-radius: 3px;
        user-select: none;
    }

    .tagify__dropdown.users-list .remove-all-tags:hover {
        color: white;
        background: salmon;
    }


    /* Tags items */
    #users-list .tagify__tag {
        white-space: nowrap;
    }

    #users-list .tagify__tag img {
        width: 100%;
        vertical-align: top;
        pointer-events: none;
    }


    #users-list .tagify__tag:hover .tagify__tag__avatar-wrap {
        transform: scale(1.6) translateX(-10%);
    }

    #users-list .tagify__tag .tagify__tag__avatar-wrap {
        width: 16px;
        height: 16px;
        white-space: normal;
        border-radius: 50%;
        background: silver;
        margin-right: 5px;
        transition: .12s ease-out;
    }

    .users-list .tagify__dropdown__itemsGroup:empty {
        display: none;
    }

    .users-list .tagify__dropdown__itemsGroup::before {
        content: attr(data-title);
        display: inline-block;
        font-size: .9em;
        padding: 4px 6px;
        margin: var(--tagify-dd-item-pad);
        font-style: italic;
        border-radius: 4px;
        background: #00ce8d;
        color: white;
        font-weight: 600;
    }

    .users-list .tagify__dropdown__itemsGroup:not(:first-of-type) {
        border-top: 1px solid #DDD;
    }
</style>

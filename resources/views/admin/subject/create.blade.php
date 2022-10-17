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
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Curriculum</a>
            </li>
            <li class="breadcrumb-item text-sm text-dark" aria-current="page">Subjects</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">New Subject</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">New Subject</h6>
    </nav>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">New Subject</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/subjects-store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="name" type="text" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Number of Sessions</label>
                                        <input name="number_of_sessions" type="text" class="form-control" placeholder="Number of sessions" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Level</label>
                                        <input name="level" type="text" class="form-control" placeholder="Level" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Lecturer</label>
                                        <input name='lecturers' value='' class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Degree</label>
                                        <input name="degree" type="text" class="form-control" placeholder="Degree" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Credits</label>
                                        <input name="credits" type="text" class="form-control" placeholder="Credits" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group container mt-0">
                            <label>Description</label>
                            <input name="description" type="textarea" class="form-control" placeholder="Description" required>
                        </div>
                        <a href="/subjects" type="button" class="btn btn-outline-primary btn-sm mb-0">
                            Back
                        </a>
                        <button type="submit" class="btn bg-gradient-primary btn-sm mb-0">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('sweetalert')
<script>
    var inputElm = document.querySelector('input[name=lecturers]');

    function tagTemplate(tagData) {
        return `
<tag title="${tagData.email}"
        contenteditable='false'
        spellcheck='false'
        tabIndex="-1"
        class="tagify__tag ${tagData.class ? tagData.class : ""}"
        ${this.getAttributes(tagData)}>
    <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
    <div>
        <div class='tagify__tag__avatar-wrap'>
            <img onerror="this.style.visibility='hidden'" src="${tagData.avatar}">
        </div>
        <span class='tagify__tag-text'>${tagData.name}</span>
    </div>
</tag>
`
    }

    function suggestionItemTemplate(tagData) {
        return `
<div ${this.getAttributes(tagData)}
    class='tagify__dropdown__item ${tagData.class ? tagData.class : ""}'
    tabindex="0"
    role="option">
    ${ tagData.avatar ? `
                <div class='tagify__dropdown__item__avatar-wrap'>
                    <img onerror="this.style.visibility='hidden'" src="${tagData.avatar}">
                </div>` : ''
    }
    <strong>${tagData.name}</strong>
    <span>${tagData.email}</span>
</div>
`
    }

    function dropdownHeaderTemplate(suggestions) {
        return `
<header data-selector='tagify-suggestions-header' class="${this.settings.classNames.dropdownItem} ${this.settings.classNames.dropdownItem}__addAll">
    <div>
        <strong>${this.value.length ? `Add Remaning` : 'Add All'}</strong>
        <a class='remove-all-tags'>Remove all</a>
    </div>
    <span>${suggestions.length} members</span>
</header>
`
    }

    // initialize Tagify on the above input node reference
    var tagify = new Tagify(inputElm, {
        tagTextProp: 'name', // very important since a custom template is used with this property as text
        // enforceWhitelist: true,
        skipInvalid: true, // do not remporarily add invalid tags
        dropdown: {
            closeOnSelect: false,
            enabled: 0,
            classname: 'users-list',
            searchKeys: ['name',
                'email'
            ] // very important to set by which keys to search for suggesttions when typing
        },
        templates: {
            tag: tagTemplate,
            dropdownItem: suggestionItemTemplate,
            dropdownHeader: dropdownHeaderTemplate
        },
        whitelist: [{
                "value": 1,
                "name": "Justinian Hattersley",
                "email": "jhattersley0@ucsd.edu",
            },
        ],

        transformTag: (tagData, originalData) => {
            var {
                name,
                email
            } = parseFullValue(tagData.name)
            tagData.name = name
            tagData.email = email || tagData.email
        },

        validate({
            name,
            email
        }) {
            // when editing a tag, there will only be the "name" property which contains name + email (see 'transformTag' above)
            if (!email && name) {
                var parsed = parseFullValue(name)
                name = parsed.name
                email = parsed.email
            }

            if (!name) return "Missing name"
            if (!validateEmail(email)) return "Invalid email"

            return true
        }
    })

    function escapeHTML(s) {
        return typeof s == 'string' ? s
            .replace(/&/g, "&")
            .replace(/</g, "<")
            .replace(/>/g, ">")
            .replace(/"/g, '"')
            .replace(/`|'/g, "'") :
        s;
}

// The below part is only if you want to split the users into groups, when rendering the suggestions list dropdown:
// (since each user also has a 'team' property)
tagify.dropdown.createListHTML = sugegstionsList => {
    const teamsOfUsers = sugegstionsList.reduce((acc, suggestion) => {
        const team = suggestion.team || 'Not Assigned';

        if (!acc[team])
            acc[team] = [suggestion]
        else
            acc[team].push(suggestion)

        return acc
    }, {})

    const getUsersSuggestionsHTML = teamUsers => teamUsers.map((suggestion, idx) => {
        if (typeof suggestion == 'string' || typeof suggestion == 'number')
            suggestion = {
                value: suggestion
            }

        var value = tagify.dropdown.getMappedValue.call(tagify, suggestion)

        suggestion.value = value && typeof value == 'string' ? escapeHTML(value) : value

        return tagify.settings.templates.dropdownItem.apply(tagify, [suggestion]);
    }).join("")


    // assign the user to a group
    return Object.entries(teamsOfUsers).map(([team, teamUsers]) => {
        return `<div class="tagify__dropdown__itemsGroup" data-title="Team ${team}:">${getUsersSuggestionsHTML(teamUsers)}</div>`
    }).join("")
}

// attach events listeners
tagify.on('dropdown:select', onSelectSuggestion) // allows selecting all the suggested (whitelist) items
    .on('edit:start', onEditStart) // show custom text in the tag while in edit-mode

function onSelectSuggestion(e) {
    if (e.detail.event.target.matches('.remove-all-tags')) {
        tagify.removeAllTags()
    }

    // custom class from "dropdownHeaderTemplate"
    else if (e.detail.elm.classList.contains(`${tagify.settings.classNames.dropdownItem}__addAll`))
        tagify.dropdown.selectAll();
}

function onEditStart({
    detail: {
        tag,
        data
    }
}) {
    tagify.setTagTextNode(tag, `${data.name} <${data.email}>`)
    }


    function validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
    }

    function parseFullValue(value) {

        var parts = value.split(/<(.*?)>/g),
            name = parts[0].trim(),
            email = parts[1]?.replace(/<(.*?)>/g, '').trim();

        return {
            name,
            email
        }
    }
    </script>
@endsection

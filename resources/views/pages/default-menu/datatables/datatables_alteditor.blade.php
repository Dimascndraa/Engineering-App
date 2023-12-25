@extends('inc.layout')
@section('title','AltEditor')
@section('content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc.breadcrumb',['bcrumb' => 'bc_level_dua','bc_1'=>'Datatables'])
        <div class="subheader">
            @component('inc.subheader',['subheader_title'=>'st_type_5'])
            @slot('sh_icon') table @endslot
            @slot('sh_titile_main') DataTables: <span class='fw-300'>AltEditor (beta)</span> <sup class='badge badge-primary fw-500'>ADDON</sup> @endslot
            @slot('sh_descipt') Custom made editor plugin designed for Datatables @endslot
            @endcomponent
        </div>
        <div class="alert alert-primary">
            <div class="d-flex flex-start w-100">
                <div class="mr-2 hidden-md-down">
                    <span class="icon-stack icon-stack-lg">
                        <i class="base base-2 icon-stack-3x opacity-100 color-primary-500"></i>
                        <i class="base base-2 icon-stack-2x opacity-100 color-primary-300"></i>
                        <i class="fal fa-info icon-stack-1x opacity-100 color-white"></i>
                    </span>
                </div>
                <div class="d-flex flex-fill">
                    <div class="flex-fill">
                        <span class="h5">About</span>
                        <p>
                            DataTables AltEditor is a MIT licensed free editor. The plugin adds capabilities to add, edit and delete rows in your datatables through the use of modals. We have modified the editor extensively to be used with SmartAdmin WebApp and make your job a little easier. This current version of AltEditor is exclusive to SmartAdmin and we intend to keep it up to date to be compatible with DataTables.
                        </p>
                        <p class="m-0">
                            You can find the definitions of its elements on their <a href="https://github.com/KasperOlesen/DataTable-AltEditor" target="_blank">official github</a> page. Note: Only use the exclusive plugin included with this WebApp as the one on github contains a lot of bugs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Example <span class="fw-300"><i>Table</i></span>
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="panel-tag">
                                <p>
                                    Datatable accepts the following callback functions as arguments: <code>onAddRow(datatable, rowdata, success, error)</code>, <code>onEditRow(datatable, rowdata, success, error)</code>, <code>onDeleteRow(datatable, rowdata, success, error)</code>
                                </p>
                                <p>
                                    In the most common case, these function should call <code>$.ajax </code>as expected by the webservice. The two functions success and error should be passed as arguments to <code>$.ajax</code>. Webservice must return the modified row in JSON format, because the success() function expects this. Otherwise you have to write your own success() callback (e.g. refreshing the whole table).
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <!-- datatable start -->
                                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100"></table>
                                    <!-- datatable end -->
                                </div>
                                <div class="col-xl-12">
                                    <hr class="mt-5 mb-5">
                                    <h5>Event <i>logs (AJAX Calls)</i></h5>
                                    <div id="app-eventlog" class="alert alert-primary p-1 h-auto my-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('plugin')
        <script src="/js/datagrid/datatables/datatables.bundle.js"></script>
        <script>
            $(document).ready(function()
            {

                /*
                NOTES:

                	Column id
                	---------------------------------------------------
                	Please always keep in mind that DataTable framework allows two different kinds of "rows": Arrays and Objects. In first case columns are indexed through integers; in second case columns are indexed by their attribute name. Usually JSON's use the Object approach, but we cannot be sure.


                	Row key
                	---------------------------------------------------
                	There is no default key in the table. Inside your callback functions, probably you will need a row key to build URL's, in that case you can get them from the rowdata parameter.


                COLUMN DEFINITIONS:

                	title = "string" - title name on table header th and on form labels
                	---------------------------------------------------
                	id = "string" - id assigned to imput element when editing/adding in modal
                	---------------------------------------------------
                	data = "string"  - data name from the dataset
                	---------------------------------------------------
                	type = "text" | "select" | "hidden" | "readonly"  - Type of HTML input to be shown.
                	---------------------------------------------------
                	hoverMsg = "some msg" - The message will appear as a tooltip over the input field.
                	---------------------------------------------------
                	pattern = r.e.  - If type is "input", the typed text will be matched against given regular expression, before submit.
                	---------------------------------------------------
                	msg = "some string" - An error message that is displayed in case pattern is not matched. Set HTML "data-errorMsg" attribute.
                	---------------------------------------------------
                	maxLength = integer - If type is "input", set HTML "maxlength" attribute.
                	---------------------------------------------------
                	options = ["a", "b", "c"] - If type is "select", the options that shall be presented.
                	---------------------------------------------------
                	select2 = {} - If type is "select", enable a select2 component. Select2 jQuery plugin must be linked. More select2 configuration options may be passed within the array.
                	---------------------------------------------------
                	datepicker = {} - If type is "text", enable a datepicker component. jQuery-UI plugin must be linked. More datepicker configuration options may be passed within the array.
                	---------------------------------------------------
                	multiple = true | false - Set HTML "multiple" attribute (for use with select2).
                	---------------------------------------------------
                	unique = true | false - Ensure that no two rows have the same value. The check is performed client side, not server side. Set HTML "data-unique" attribute. (Probably there's some issue with this).
                	---------------------------------------------------
                	uniqueMsg = "some string" - An error message that is displayed when the unique constraint is not respected. Set HTML "data-uniqueMsg" attribute.
                	---------------------------------------------------
                	special = "any string" - Set HTML "data-special" attribute (don't know what's that needed for).
                	---------------------------------------------------
                	defaultValue = "any string" - Adds a default value when adding a row
                	---------------------------------------------------
                */


                // Event Lot
                var events = $("#app-eventlog");

                // Column Definitions
                var columnSet = [
                {
                    title: "RowId",
                    id: "DT_RowId",
                    data: "DT_RowId",
                    placeholderMsg: "Server Generated ID",
                    "visible": false,
                    "searchable": false,
                    type: "readonly"
                },
                {
                    title: "Status",
                    id: "status",
                    data: "status",
                    type: "select",
                    "options": [
                        "active",
                        "inactive",
                        "disabled",
                        "partial"
                    ]
                },
                {
                    title: "IP Address",
                    id: "ipAddress",
                    data: "ipAddress",
                    type: "text",
                    pattern: "((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)(\.|$)){4}",
                    placeholderMsg: "e.g 82.84.86.88",
                    errorMsg: "*Invalid address - Enter valid ip.",
                    hoverMsg: "(Optional) - Ex: 82.84.86.88",
                    unique: true,
                    uniqueMsg: "Already exists. IP must be unique!",
                },
                {
                    title: "Port Number",
                    id: "port",
                    data: "port",
                    type: "text",
                    pattern: "^([0-9]{1,4}|[1-5][0-9]{4}|6[0-4][0-9]{3}|65[0-4][0-9]{2}|655[0-2][0-9]|6553[0-5])$",
                    placeholderMsg: "e.g 6112",
                    errorMsg: "*Invalid port - Enter valid port or range.",
                    hoverMsg: "Ex: 6112 (single)   or   6111:6333 (range)",
                    unique: false
                },
                {
                    title: "Activation Date",
                    id: "adate",
                    data: "adate",
                    type: "date",
                    pattern: "((?:19|20)\d\d)-(0?[1-9]|1[012])-([12][0-9]|3[01]|0?[1-9])",
                    placeholderMsg: "yyyy-mm-dd",
                    errorMsg: "*Invalid date format. Format must be yyyy-mm-dd"
                },
                {
                    title: "User Email",
                    id: "user",
                    data: "user",
                    type: "text",
                    pattern: "^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$",
                    placeholderMsg: "user@domain.com",
                    errorMsg: "*Invalid email - Enter valid email.",
                    unique: true,
                    uniqueMsg: "Email already in use"
                },
                {
                    title: "Package",
                    id: "package",
                    data: "package",
                    type: "select",
                    "options": [
                        "free",
                        "silver",
                        "gold",
                        "platinum",
                        "payg"
                    ]
                },
                {
                    title: "Acc. Balance",
                    id: "balance",
                    data: "balance",
                    type: "number",
                    placeholderMsg: "Amount due",
                    defaultValue: "0"
                }]

                /* start data table */
                var myTable = $('#dt-basic-example').dataTable(
                {
                    /* check datatable buttons page for more info on how this DOM structure works */
                    dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    ajax: "media/data/server-demo.json",
                    columns: columnSet,
                    /* selecting multiple rows will not work */
                    select: 'single',
                    /* altEditor at work */
                    altEditor: true,
                    responsive: true,
                    /* buttons uses classes from bootstrap, see buttons page for more details */
                    buttons: [
                    {
                        extend: 'selected',
                        text: '<i class="fal fa-times mr-1"></i> Delete',
                        name: 'delete',
                        className: 'btn-primary btn-sm mr-1'
                    },
                    {
                        extend: 'selected',
                        text: '<i class="fal fa-edit mr-1"></i> Edit',
                        name: 'edit',
                        className: 'btn-primary btn-sm mr-1'
                    },
                    {
                        text: '<i class="fal fa-plus mr-1"></i> Add',
                        name: 'add',
                        className: 'btn-success btn-sm mr-1'
                    },
                    {
                        text: '<i class="fal fa-sync mr-1"></i> Synchronize',
                        name: 'refresh',
                        className: 'btn-primary btn-sm'
                    }],
                    columnDefs: [
                    {
                        targets: 1,
                        render: function(data, type, full, meta)
                        {
                            var badge = {
                                "active":
                                {
                                    'title': 'Active',
                                    'class': 'badge-success'
                                },
                                "inactive":
                                {
                                    'title': 'Inactive',
                                    'class': 'badge-warning'
                                },
                                "disabled":
                                {
                                    'title': 'Disabled',
                                    'class': 'badge-danger'
                                },
                                "partial":
                                {
                                    'title': 'Partial',
                                    'class': 'bg-danger-100 text-white'
                                }
                            };
                            if (typeof badge[data] === 'undefined')
                            {
                                return data;
                            }
                            return '<span class="badge ' + badge[data].class + ' badge-pill">' + badge[data].title + '</span>';
                        },
                    },
                    {
                        targets: 7,
                        type: 'currency',
                        render: function(data, type, full, meta)
                        {
                            //var number = Number(data.replace(/[^0-9.-]+/g,""));
                            if (data >= 0)
                            {
                                return '<span class="text-success fw-500">$' + data + '</span>';
                            }
                            else
                            {
                                return '<span class="text-danger fw-500">$' + data + '</span>';
                            }
                        },
                    },
                    {
                        targets: 6,
                        render: function(data, type, full, meta)
                        {
                            var package = {
                                "free":
                                {
                                    'title': 'Free',
                                    'class': 'bg-fusion-50',
                                    'info': 'Free users are restricted to 30 days of use'
                                },
                                "silver":
                                {
                                    'title': 'Silver',
                                    'class': 'bg-fusion-50 bg-fusion-gradient'
                                },
                                "gold":
                                {
                                    'title': 'Gold',
                                    'class': 'bg-warning-500 bg-warning-gradient'
                                },
                                "platinum":
                                {
                                    'title': 'Platinum',
                                    'class': 'bg-trans-gradient'
                                },
                                "payg":
                                {
                                    'title': 'PAYG',
                                    'class': 'bg-success-500 bg-success-gradient'
                                }
                            };
                            if (typeof package[data] === 'undefined')
                            {
                                return data;
                            }
                            return '<div class="has-popover d-flex align-items-center"><span class="d-inline-block rounded-circle mr-2 ' + package[data].class + '" style="width:15px; height:15px;"></span><span>' + package[data].title + '</span></div>';
                        },
                    }, ],

                    /* default callback for insertion: mock webservice, always success */
                    onAddRow: function(dt, rowdata, success, error)
                    {
                        console.log("Missing AJAX configuration for INSERT");
                        success(rowdata);

                        // demo only below:
                        events.prepend('<p class="text-success fw-500">' + JSON.stringify(rowdata, null, 4) + '</p>');
                    },
                    onEditRow: function(dt, rowdata, success, error)
                    {
                        console.log("Missing AJAX configuration for UPDATE");
                        success(rowdata);

                        // demo only below:
                        events.prepend('<p class="text-info fw-500">' + JSON.stringify(rowdata, null, 4) + '</p>');
                    },
                    onDeleteRow: function(dt, rowdata, success, error)
                    {
                        console.log("Missing AJAX configuration for DELETE");
                        success(rowdata);

                        // demo only below:
                        events.prepend('<p class="text-danger fw-500">' + JSON.stringify(rowdata, null, 4) + '</p>');
                    },
                });

            });

        </script>
@endsection

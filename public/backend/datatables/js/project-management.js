/**
 * Page Country List
 */

'use strict';
const validationMessages = $('#validation-messages');
const addNewTranslation = validationMessages.data('add-new');
// const nameEnRequiredTranslation = validationMessages.data('name-en-required');
// const nameArRequiredTranslation = validationMessages.data('name-ar-required');
// const parentIdRequiredTranslation = validationMessages.data('parent-id-required');
// const countryKeyRequiredTranslation = validationMessages.data('country-key-required');
const exportFile = validationMessages.data('export');
const selectOption = validationMessages.data('select');
const edit = validationMessages.data('edit');
const confirm = validationMessages.data('confirm');
const deleteItem = validationMessages.data('delete');
const cancel = validationMessages.data('cancel');
const search = validationMessages.data('search');
const next = validationMessages.data('next');
const previous = validationMessages.data('previous');
const showing = validationMessages.data('showing');
const to = validationMessages.data('to');
const of = validationMessages.data('of');
const entries = validationMessages.data('entries');
const actions = validationMessages.data('Actions');
const lang = validationMessages.data('lang');
const oky = validationMessages.data('oky');
const delete_done = validationMessages.data('delete_done');
// Datatable (jquery)
$(function () {
    console.log('asasas')
    // Variable declaration for table
    var dt_project_table = $('.datatables-doctors'),
        projectView = baseUrl + '/admin/api-countries',
        offCanvasForm = $('#offcanvasAddCountry');

    // ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // countries datatable
    if (dt_project_table.length) {
        var dt_country = dt_project_table.DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + '/admin/api-doctors?dashboard=1'
            },
            columns: [
               
                // columns according to JSON
                { data: '' },
                // { data: 'fake_id' },
                { data: 'id' },
                { data: 'first_name'},
                { data: 'last_name'},
                { data: 'email'},
                { data: 'city_id'},
               
                { data: 'Phone'},
                { data: 'gender'},
                
                { data: 'title'},
                { data: 'area_id'},
                { data: 'description'},
              
                { data: 'is_trainer'},
                { data: 'lat'},
                { data: 'lang'},
                // { data: 'created_at'},
                { data: 'action' },
               
            ],
            columnDefs: [
                {
                    // For Responsive
                    className: 'control',
                    searchable: false,
                    orderable: false,
                    responsivePriority: 2,
                    targets: 0,
                    render: function (data, type, full, meta) {
                        return '';
                    }
                },
                {
                    searchable: false,
                    orderable: false,
                    targets: 1,
                    render: function (data, type, full, meta) {
                        return `<span>${full.fake_id}</span>`;
                    }
                },
                {
                    // Category name
                    targets: 2,
                    // render: function (data, type, full, meta) {
                    //     var $name = full['name'];
                    //
                    //     return '<span class="category-name">' + $name + '</span>';
                    // }
                    render: function (data, type, full, meta) {
                        var $first_name = full['first_name'],
                        
                            $id = full['id'],
                            $image = full['image'];
                        // if ($image) {
                        //     // For Product image
                        //
                        //     var $output = '<img src="' + $image + '" alt="Category-' + $id + '" class="rounded-2">';
                        // }
                        // Creates full output for Product name and product_brand
                        var $row_output =
                            '<div class="d-flex justify-content-start align-items-center product-name">' +
                            '<div class="avatar-wrapper">' +
                            // '<div class="avatar avatar me-2 rounded-2 bg-label-secondary">' +
                            // $output +
                            // '</div>' +
                            '</div>' +
                            '<div class="d-flex flex-column">' +
                            '<h6 class="text-body text-nowrap mb-0">' +
                            $first_name +
                            // $last_name +
                            '</h6>' +
                            '</div>' +
                            '</div>';
                        return $row_output;
                    }
                },
                {
                    // Slug
                    targets: 3,
                    // render: function (data, type, full, meta) {
                    //     $last_name = full['last_name']
                    //     $id = full['id'],
                    //     $image = full['image'];
                    //     var $row_output =
                    //     '<div class="d-flex justify-content-start align-items-center product-name">' +
                    //     '<div class="avatar-wrapper">' +
                    //     // '<div class="avatar avatar me-2 rounded-2 bg-label-secondary">' +
                    //     // $output +
                    //     // '</div>' +
                    //     '</div>' +
                    //     '<div class="d-flex flex-column">' +
                    //     '<h6 class="text-body text-nowrap mb-0">' +
                    //     $last_name +
                    //     // $last_name +
                    //     '</h6>' +
                    //     '</div>' +
                    //     '</div>';
                    // return $row_output;
                    // }
                },
                {
                    // Slug
                    targets: 5,
                    render: function (data, type, full, meta) {
                        var $city = full['city_id'];

                        return '<span class="category-slug">' + $city + '</span>';
                    }
                    // render: function (data, type, full, meta) {
                    //     var $sub_category = full['sub_category'];

                    //     return '<span class="category-slug">' + $sub_category + '</span>';
                    // }
                },

             
                {
                    // Created at
                    targets: 7,
                    render: function (data, type, full, meta) {
                        var $gender = full['gender'];
                        if($gender == 0){
                            return '<span class="category-slug">' + 'male' + '</span>'; 
                        }
                        else($gender == 1)
                        

                        return '<span class="category-slug">' + 'famle' + '</span>';
                    
                    },
                }, 
                {
                    targets: 11,
                    render: function (data, type, full, meta) {
                        var $is_trainer = full['is_trainer'];
                        // var stateNum = Math.floor(Math.random() * 6);
                         var states = ['success', 'danger'];
                        // var $state = states[stateNum],
                        //     $name = full['username'],
                        //     $initials = $name.match(/\b\w/g) || [],
                        //     $output;
                        // $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                        if($is_trainer == 0 ){
                            states='danger'
                       return  '<span class="avatar-initial rounded-circle bg-label-'+states+'">' +  'NO'  + '</span>';

                        }else{
                            states='success'
                            return  '<span class="avatar-initial rounded-circle bg-label-'+states+'">' +  'yes'  + '</span>';
     
                        }

                        // return '<span class="category-slug">' + 'yes' + '</span>';
                    
                    }
                    // render: function (data, type, full, meta) {
                    //     var $created_at = full['created_at'];

                    //     return '<span class="category-created_at">' + $created_at + '</span>';
                    // }
                },
                {
                    // Actions
                    targets: -1,
                    title: actions,
                    
                    searchable: false,
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return (
                            '<div class="d-inline-block text-nowrap">' +
                            `<button id="editButton" class="btn btn-sm btn-icon edit-record" data-id="${full['id']}" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddHospitals"><i class="ti ti-edit"></i></button>` +
                            `<button class="btn btn-sm btn-icon delete-record" data-id="${full['id']}"><i class="ti ti-trash"></i></button>` +
                            '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>' +
                            '<div class="dropdown-menu dropdown-menu-end m-0">' +
                            '<a href="' +
                            baseUrl+'/'+lang+'/admin/doctors/gallery?doctor_id='+full['id']+
                            '" class="dropdown-item">gallery</a>' +
                            // '<a href="'+
                            // baseUrl+'/'+lang+'/admin/exam_questions?course_id='+full['id']+
                            // '"javascript:;" class="dropdown-item">Final Exam</a>' +
                            // '</div>' +
                            // '</div>'
                            // '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>' +
                            // '<div class="dropdown-menu dropdown-menu-end m-0">' +
                            // '<a href="' +
                            // userView +
                            // '" class="dropdown-item">View</a>' +
                            // '<a href="javascript:;" class="dropdown-item">Suspend</a>' +
                            // '</div>' +
                            '</div>'
                        );
                    },
                 
                }
            ],
            order: [[2, 'desc']],
            dom:
                '<"row mx-2"' +
                '<"col-md-2"<"me-3"l>>' +
                '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
                '>t' +
                '<"row mx-2"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: '_MENU_',
                search: '',
                searchPlaceholder: search,
                paginate: {
                    next: next,
                    previous: previous
                },
                // info: 'Showing _START_ to _END_ of _TOTAL_ entries'
                info: showing +' _START_ ' + to + ' _END_ ' + of + ' _TOTAL_ ' + entries
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-label-primary dropdown-toggle mx-3',
                    text: '<i class="ti ti-logout rotate-n90 me-2"></i>' + exportFile,
                    buttons: [
                        {
                            extend: 'print',
                            title: 'countries',
                            text: '<i class="ti ti-printer me-2" ></i>Print',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4],
                                // prevent avatar to be print
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function (index, item) {
                                            // if (item.classList !== undefined && item.classList.contains('user-name')) {
                                            //     result = result + item.lastChild.textContent;
                                            // } else result = result + item.innerText;
                                            if (item && item.classList && item.classList.contains('country-name')) {
                                                result = result + item.lastChild.textContent;
                                            } else result = result + item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            },
                            customize: function (win) {
                                //customize print view for dark
                                $(win.document.body)
                                    .css('color', config.colors.headingColor)
                                    .css('border-color', config.colors.borderColor)
                                    .css('background-color', config.colors.body);
                                $(win.document.body)
                                    .find('table')
                                    .addClass('compact')
                                    .css('color', 'inherit')
                                    .css('border-color', 'inherit')
                                    .css('background-color', 'inherit');
                            }
                        },
                        {
                            extend: 'csv',
                            title: 'countries',
                            text: '<i class="ti ti-file-text me-2" ></i>Csv',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4],
                                // prevent avatar to be print
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function (index, item) {
                                            // if (item.classList.contains('user-name')) {
                                            //     result = result + item.lastChild.textContent;
                                            // } else result = result + item.innerText;
                                            if (item && item.classList && item.classList.contains('country-name')) {
                                                result = result + item.lastChild.textContent;
                                            } else result = result + item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            }
                        },
                        {
                            extend: 'excel',
                            title: 'countries',
                            text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4],
                                // prevent avatar to be display
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function (index, item) {
                                            // if (item.classList.contains('user-name')) {
                                            //     result = result + item.lastChild.textContent;
                                            // } else result = result + item.innerText;
                                            if (item && item.classList && item.classList.contains('country-name')) {
                                                result = result + item.lastChild.textContent;
                                            } else result = result + item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            }
                        },
                        {
                            extend: 'pdf',
                            title: 'countries',
                            text: '<i class="ti ti-file-text me-2"></i>Pdf',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4],
                                // prevent avatar to be display
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function (index, item) {
                                            // if (item.classList.contains('user-name')) {
                                            //     result = result + item.lastChild.textContent;
                                            // } else result = result + item.innerText;
                                            if (item && item.classList && item.classList.contains('country-name')) {
                                                result = result + item.lastChild.textContent;
                                            } else result = result + item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            }
                        },
                        {
                            extend: 'copy',
                            title: 'countries',
                            text: '<i class="ti ti-copy me-1" ></i>Copy',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4],
                                // prevent avatar to be copy
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function (index, item) {
                                            // if (item.classList.contains('user-name')) {
                                            //     result = result + item.lastChild.textContent;
                                            // } else result = result + item.innerText;
                                            if (item && item.classList && item.classList.contains('country-name')) {
                                                result = result + item.lastChild.textContent;
                                            } else result = result + item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            }
                        }
                    ]
                },
                {
                    text: '<i class="ti ti-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">' + addNewTranslation + '</span>',
                    className: 'add-new btn btn-primary',
                    attr: {
                        'data-bs-toggle': 'offcanvas',
                        'data-bs-target': '#offcanvasAddCountry'
                    }
                }
            ],
            // For responsive popup
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Details of ' + data['name'];
                        }
                    }),
                    type: 'column',
                    renderer: function (api, rowIdx, columns) {
                        var data = $.map(columns, function (col, i) {
                            return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                                ? '<tr data-dt-row="' +
                                col.rowIndex +
                                '" data-dt-column="' +
                                col.columnIndex +
                                '">' +
                                '<td>' +
                                col.title +
                                ':' +
                                '</td> ' +
                                '<td>' +
                                col.data +
                                '</td>' +
                                '</tr>'
                                : '';
                        }).join('');

                        return data ? $('<table class="table"/><tbody />').append(data) : false;
                    }
                }
            },
            drawCallback: function (settings) {

                // hide pager and info if the table has NO results
                const api = new $.fn.dataTable.Api(settings);
                const pageCount = api.page.info().pages;

                const wrapper = $('#' + settings.sTableId).closest('.dataTables_wrapper');
                const pagination = wrapper.find('.dataTables_paginate');
                const info = wrapper.find('.dataTables_info');

                pagination.toggle(pageCount > 0);
                info.toggle(pageCount > 0);
            }
        });
    }

    // Delete Record
    $(document).on('click', '.delete-record', function () {
        var country_id = $(this).data('id'),
            dtrModal = $('.dtr-bs-modal.show');

        // hide responsive modal in small screen
        if (dtrModal.length) {
            dtrModal.modal('hide');
        }

        // sweetalert for confirmation of delete
        Swal.fire({
            title: confirm,
            // text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: deleteItem,
            customClass: {
                confirmButton: 'btn btn-primary me-3',
                cancelButton: 'btn btn-label-secondary'
            },
            buttonsStyling: false,
            cancelButtonText: cancel,
        }).then(function (result) {
            if (result.value) {
                // delete the data
                $.ajax({
                    type: 'DELETE',
                    url: `${baseUrl}/admin/countries/${country_id}`,
                    success: function () {
                        dt_country.draw();
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });

                // success sweetalert
                Swal.fire({
                    icon: 'success',
                    // title: 'Deleted!',
                    text: delete_done,
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: cancel,
                    text: 'The country is not deleted!',
                    icon: 'error',
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            }
        });
    });

    // edit record
    $(document).on('click', '.edit-record', function () {
        var country_id = $(this).data('id'),
            dtrModal = $('.dtr-bs-modal.show');

        // hide responsive modal in small screen
        if (dtrModal.length) {
            dtrModal.modal('hide');
        }

        // changing the title of offcanvas
        $('#offcanvasAddCountryLabel').html(edit);

        // get data
        $.get(`${baseUrl}/admin/countries\/${country_id}\/edit`, function (data) {
            $('#country_id').val(data.id);
            $('#add-country-name-ar').val(data.name.ar);
            $('#add-country-name-en').val(data.name.en);
            $('#add-country-key').val(data.country_key);
        });
    });

    // changing the title
    $('.add-new').on('click', function () {
        $('#country_id').val(''); //reseting input field
        $('#offcanvasAddCountryLabel').html(addNewTranslation);
    });

    // Filter form control to default size
    // ? setTimeout used for multilingual table initialization
    setTimeout(() => {
        $('.dataTables_filter .form-control').removeClass('form-control-sm');
        $('.dataTables_length .form-select').removeClass('form-select-sm');
    }, 300);

    // validating form and updating countries data
 
});

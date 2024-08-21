new DataTable('#example', {
    responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display
                .childRow, // Muestra las columnas ocultas en una fila expandida
            type: 'inline', // Expande la fila directamente debajo
            renderer: function (api, rowIdx, columns) {
                var data = $.map(columns, function (col, i) {
                    return col.hidden ? '<tr data-dt-row="' + col.rowIndex +
                        '" data-dt-column="' + col.columnIndex + '">' +
                        '<td>' + col.title + ':</td> ' +
                        '<td>' + col.data + '</td>' +
                        '</tr>' : '';
                }).join('');

                return data ? $('<table/>').append(data) : false;
            }
        }
    },
    columnDefs: [{
        targets: -1, // Aplica a la última columna
        orderable: false, // Deshabilita la ordenación en la columna de botones
        responsivePriority: 1, // Hace que esta columna tenga la mayor prioridad
        className: 'text-center', // Opcional: centra los botones dentro de la columna
    },
    {
        targets: '_all',
        responsivePriority: 2 // Ajusta la prioridad del resto de las columnas
    }
    ],
    language: {
        url: "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    }
});

$(document).ready(function () {
    $('.numericInput').on('input', function () {
        $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#submitButton').on('click', function (event) {
    event.preventDefault(); // Evita el envío automático del formulario

    var isValid = true;
    var $form = $(this).closest('form');

    // Función para validar campos individuales
    function validateField(selector, alertSelector, isEmail = false) {
        console.log(selector, alertSelector, isEmail);

        const $field = $(selector);
        const $alert = $(alertSelector);
        const isEmpty = $field.val().trim() === '';
        const isInvalidEmail = isEmail && !$field[0].checkValidity();

        if (isEmpty || isInvalidEmail) {
            $field.addClass('is-invalid');
            $alert.addClass('visualizar');
            isValid = false;
        } else {
            $field.removeClass('is-invalid').addClass('is-valid');
            $alert.removeClass('visualizar');
        }
    }

    // Validación de todos los campos
    validateField('#user_name', '#alertInvalidUser');
    validateField('#num_document', '#alertInvalidNumberDocument');
    validateField('#first_name', '#alertInvalidFirstName');
    validateField('#first_lastname', '#alertInvalidFirstLastName');
    validateField('#second_lastname', '#alertInvalidSecondLastName');
    validateField('#phone', '#alertInvalidPhone');
    validateField('#city', '#alertInvalidCity');
    validateField('#email', '#alertInvalidEmail', true);

    console.log(userStoreUrl);
    // Si el formulario es válido, envíalo
    if (isValid) {
        const data = {
            user_name: $('#user_name').val(),
            genere: $('#genere').val(),
            num_document: $('#num_document').val(),
            first_name: $('#first_name').val(),
            second_name: $('#second_name').val(),
            first_lastname: $('#first_lastname').val(),
            second_lastname: $('#second_lastname').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            city: $('#city').val(),
            date_birth: $('#date_birth').val(),
        };
        console.log(data);
        $.ajax({
            url: "/users", // Cambia esta URL a la ruta donde se maneja el POST
            method: 'POST',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Incluye el token CSRF
            },
            success: function (response) {
                console.log('Success:', response);
                if (response.success) {
                    alert('Usuario creado con éxito');
                }
            },
            error: function (xhr) {
                console.error('Error:', xhr.responseText);
                alert('Hubo un error al crear el usuario.');
            }
        });
    }
});

$('#btnEliminar').on('click', function (event) {
    $.ajax({
        url: '/item/' + id,
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
            alert(response.message);
        },
        error: function (xhr) {
            alert(xhr.responseJSON.message);
        }
    });
});
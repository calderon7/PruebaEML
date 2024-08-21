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
            update_user: "2024-08-21 06:07:06"
        };
        console.log(data);
        $.ajax({
            url: userStoreUrl, // Cambia esta URL a la ruta donde se maneja el POST
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
                // Aquí puedes manejar el error, como mostrar mensajes de error
                alert('Hubo un error al crear el usuario.');
            }
        });
    }
});

// function todosCamposLlenos(obj) {
//     return Object.values(obj).every(value => value !== "");
// }

// $(document).ready(function () {
//     $('#submitButton').on('click', function () {
//         const data = {
//             user_name: $('#user_name').val(),
//             genere: $('#genere').val(),
//             number_document: $('#number_document').val(),
//             first_name: $('#first_name').val(),
//             second_name: $('#second_name').val(),
//             first_lastname: $('#first_lastname').val(),
//             second_lastname: $('#second_lastname').val(),
//             email: $('#email').val(),
//             phone: $('#phone').val(),
//             city: $('#city').val(),
//             date_birth: $('#date_birth').val(),
//         };

//         console.log(data);
//         // if (todosCamposLlenos(data)) {
//         //     log('Todos los campos están llenos.');
//         // } else {
//         //     console.log('Algunos campos están vacíos o tienen valores predeterminados.');
//         // }

//         // postData('/articles', data);
//     });
// });

// $(document).ready(function () {
//     $('#submitButton').on('click', function (event) {

//         event.preventDefault(); // Evitar el envío del formulario para validar manualmente

//         // Limpiar los estados previos
//         var form = $(this);
//         var isValid = true;

//         // Validación de campos
//         form.find(':input[required]').each(function () {
//             var input = $(this);
//             if (input.val().trim() === '') {
//                 input.addClass('is-invalid');
//                 isValid = false;
//             } else {
//                 input.removeClass('is-invalid').addClass('is-valid');
//             }
//         });

//         // Validación del Usuario
//         const user = $('#user_name');
//         const validateUser = $('#alertInvalidUser');

//         if (user.val().trim() === '') {
//             user.addClass('is-invalid');
//             validateUser.addClass('visualizar');
//             isValid = false;
//         } else {
//             user.removeClass('is-invalid').addClass('is-valid');
//             validateUser.removeClass('visualizar');
//         }

//         // Validación del Genereo
//         // const genere = $('#genere');
//         // console.log(genere.val());
//         // if (genere.val() === "") {
//         //     genereValidate
//         //     isValid = false;

//         // } else {
//         //     genere.removeClass('is-invalid').addClass('is-valid');
//         // }

//         // Validación del Numero Documento
//         const number_document = $('#number_document');
//         const validateDocument = $('#alertInvalidNumberDocument');

//         if (number_document.val().trim() === '') {
//             number_document.addClass('is-invalid');
//             validateDocument.addClass('visualizar');
//             isValid = false;
//         } else {
//             number_document.removeClass('is-invalid').addClass('is-valid');
//             validateDocument.removeClass('visualizar');
//         }

//         // Validación del Primer Nombre
//         const first_name = $('#first_name');
//         const validateFirstNames = $('#alertInvalidFirstName');

//         if (first_name.val().trim() === '') {
//             first_name.addClass('is-invalid');
//             validateFirstNames.addClass('visualizar');
//             isValid = false;
//         } else {
//             first_name.removeClass('is-invalid').addClass('is-valid');
//             validateFirstNames.removeClass('visualizar');
//         }

//         // Validación del Primer Apellido
//         const first_lastname = $('#first_lastname');
//         const validateFirstLast = $('#alertInvalidFirstLastName');

//         if (first_lastname.val().trim() === '') {
//             first_lastname.addClass('is-invalid');
//             validateFirstLast.addClass('visualizar');
//             isValid = false;
//         } else {
//             first_lastname.removeClass('is-invalid').addClass('is-valid');
//             validateFirstLast.removeClass('visualizar');
//         }

//         // Validación del Segundo Apellido
//         const second_lastname = $('#second_lastname');
//         const validateSecondLast = $('#alertInvalidSecondLastName');

//         if (second_lastname.val().trim() === '') {
//             second_lastname.addClass('is-invalid');
//             validateSecondLast.addClass('visualizar');
//             isValid = false;
//         } else {
//             second_lastname.removeClass('is-invalid').addClass('is-valid');
//             validateSecondLast.removeClass('visualizar');
//         }

//         // Validación del Numero Celular
//         const phone = $('#phone');
//         const validatePhone = $('#alertInvalidPhone');

//         if (phone.val().trim() === '') {
//             phone.addClass('is-invalid');
//             validatePhone.addClass('visualizar');
//             isValid = false;
//         } else {
//             phone.removeClass('is-invalid').addClass('is-valid');
//             validatePhone.removeClass('visualizar');
//         }

//         // Validación del Ciudad
//         const city = $('#city');
//         const validateCity = $('#alertInvalidCity');

//         if (city.val().trim() === '') {
//             city.addClass('is-invalid');
//             validateCity.addClass('visualizar');
//             isValid = false;
//         } else {
//             city.removeClass('is-invalid').addClass('is-valid');
//             validateCity.removeClass('visualizar');
//         }

//         // Validación del correo electrónico
//         const email = $('#email');
//         const validateEmail = $('#alertInvalidEmail');

//         if (email.val().trim() === '' || !email[0].checkValidity()) {
//             email.addClass('is-invalid');
//             validateEmail.addClass('visualizar');
//             isValid = false;
//         } else {
//             email.removeClass('is-invalid').addClass('is-valid');
//             validateEmail.removeClass('visualizar');
//         }

//         // Si el formulario es válido, envíalo
//         if (isValid) {
//             form.off('submit').submit(); // Permitir el envío del formulario
//         }
//     });
// });
// Importar DataTables y DataTables Responsive para que estén disponibles en el ámbito global
new DataTable('#example', {
    responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display
                .childRow, // Muestra las columnas ocultas en una fila expandida
            type: 'inline', // Expande la fila directamente debajo
            renderer: function (api, rowIdx, columns) {
                var data = $.map(columns, function (col, i) {
                    return col.hidden ?
                        '<div class="col-md-4" data-dt-row="' + col.rowIndex +
                        '" data-dt-column="' + col.columnIndex + '">' +
                        '<div class="form-label"><strong>' + col.title + ':</strong></div> ' +
                        '<div class="form-label">' + col.data + '</div>' +
                        '</div>' : '';
                }).join('');

                return data ? $('<div class="row g-3 mb-1"/>').append(data) : false;
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
    "order": [],
    language: {
        url: "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json" // Idioma español
    }
});

// Validacion solo numeros input text contenido numerico
$(document).ready(function () {
    $('.numericInput').on('input', function () {
        $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });
});



// Token para peticiones AJAX
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Agregar usuarios informacion popUp
$(document).ready(function () {
    // Cuando se hace clic en el botón de agregar
    $('#addUserBtn').on('click', function () {
        $('#userModalLabel').text('Agregar Nuevo Usuario');
        $('#submitButton').text('Guardar');
        $('#articleForm').trigger('reset'); // Limpiar el formulario
        $('#user_id').val(''); // Vaciar el campo oculto de ID
    });
});

// Validación de campos del formulario de creación de usuarios
$('#submitButton').on('click', function (event) {
    event.preventDefault(); // Evita el envío automático del formulario

    var isValid = true;

    // Función para validar campos individuales
    function validateField(selector, alertSelector, isEmail = false) {
        const $field = $(selector); // Definir $field primero
        const $alert = $(alertSelector);

        // Verifica si el selector existe
        if ($field.length === 0) {
            console.error(`Elemento no encontrado: ${selector}`);
            return; // Salir de la función si el elemento no existe
        }

        console.log($field.val().trim()); // Ahora es seguro acceder a val()

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
    validateField('#first_name', '#alertInvalidFirstName');
    validateField('#second_name', '#alertInvalidSecondName');
    validateField('#first_lastname', '#alertInvalidFirstLastName');
    validateField('#second_lastname', '#alertInvalidSecondLastName');
    validateField('#phone', '#alertInvalidPhone');
    validateField('#city', '#alertInvalidCity');
    validateField('#email', '#alertInvalidEmail', true);

    // Si el formulario es válido, envíalo
    if (isValid) {
        const data = {
            first_name: $('#first_name').val(),
            second_name: $('#second_name').val(),
            first_lastname: $('#first_lastname').val(),
            second_lastname: $('#second_lastname').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            city: $('#city').val(),
        };

        let userId = $('#user_id').val();
        let method = userId ? 'PUT' : 'POST';
        let url = userId ? '/users/' + userId : '/users'

        console.log(data);
        $.ajax({
            url: url,
            method: method,
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                let message = userId ? "Usuario actualizado con éxito" : "Usuario creado con éxito";
                console.log('Success:', response);
                if (response.success) {
                    Swal.fire({
                        title: "Listo",
                        text: message,
                        icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            },
            error: function (xhr) {
                let message = userId ? "Hubo un error al actulizar el usuario" : "Hubo un error al crear el usuario";
                console.error('Error:', xhr.responseText);
                Swal.fire({
                    title: "Error",
                    text: "Hubo un error al crear el usuario",
                    icon: "error"
                });
            }
        });
    }
});

// Eliminar usuarios 
$(document).ready(function () {
    $('.btnEliminar').on('click', function (event) {
        var userId = $(this).data('id');

        Swal.fire({
            title: "Estás seguro?",
            text: "¿Estás seguro de que quieres eliminar este registro?",
            icon: "warning",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Desactivar",
            denyButtonText: "Eliminar"
        }).then((result) => {
            if (result.dismiss != 'cancel') {
                let method = result.isConfirmed ? 'PUT' : 'DELETE';
                let url = result.isConfirmed ? '/users/' + userId + '/desactive' : '/users/' + userId;

                $.ajax({
                    url: url,
                    type: method,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                title: "Listo",
                                text: response.message,
                                icon: "success"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: response.message,
                                icon: "error"
                            });
                        }
                    },
                    error: function (xhr) {
                        Swal.fire({
                            title: "Error",
                            text: "Ocurrió un error al intentar eliminar el registro",
                            icon: "error"
                        });
                    }
                });
            }
        });
    });
});

// Consulta información de usuario para editar
$(document).ready(function () {
    $('.btnEditar').on('click', function (event) {
        event.preventDefault();
        var userId = $(this).data('id');
        $('#userModalLabel').text('Editar Contacto');
        $('#submitButton').text('Actualizar');

        console.log(userId);

        $.ajax({
            url: `/users/${userId}`, // Cambia esta URL a tu endpoint de API
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                // Llenar los campos del formulario con los datos del usuario 
                $('#first_name').val(data.first_name);
                $('#second_name').val(data.second_name);
                $('#first_lastname').val(data.first_lastname);
                $('#second_lastname').val(data.second_lastname);
                $('#email').val(data.email);
                $('#phone').val(data.phone);
                $('#city').val(data.city);
                $('#user_id').val(data.id);

            },
            error: function () {
                // Manejo de errores si la solicitud falla
                Swal.fire({
                    title: "Error",
                    text: "Error al cargar los datos",
                    icon: "error"
                });
            }
        });
    });
});
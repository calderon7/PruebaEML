<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contactos</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
    <script src="https://kit.fontawesome.com/aa7129c6ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <div class="text-center">
            <strong>
                <h1 class="tittle">Agenda de Contactos</h1>
            </strong>
        </div>

        <div class="btn-group mb-1 mt-1" role="group" aria-label="Basic example">
            <button class="btn btn-success" id="addUserBtn" data-bs-toggle="modal"
                data-bs-target="#addUser">Agregar</button>
        </div>

        <!-- Modal popUp formulario Agregar / Editar-->
        <div class="modal fade " id="addUser" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #f1f1f1;">
                        <h1 class="modal-title fs-2 tittle" id="userModalLabel">Agrega Nuevo Contacto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="articleForm" class="needs-validation" novalidate>
                            @csrf
                            <input type="hidden" id="user_id">
                            <div class="row g-3">
                                {{-- <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="user_name"
                                                placeholder="usuario" required>
                                            <label for="user_name" maxlength="30">Usuario</label>
                                        </div>
                                        <div id="alertInvalidUser" class="invalid-feedback">El campo Usuario es requerido.</div>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="genere"
                                            aria-label="Floating label select example" required>
                                            <option value="" selected>Seleccione Genero</option>
                                            @foreach ($generes as $genere)
                                                <option value="{{ $genere->id }}">{{ $genere->genere }}</option>
                                            @endforeach
                                        </select>
                                        <label for="genere">Genero</label>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-id-card"></i>
                                        </span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control numericInput" id="num_document"
                                                placeholder="Numero Documento" required>
                                            <label for="num_document">Numero Documento</label>
                                        </div>
                                        <div id="alertInvalidNumberDocument" class="invalid-feedback">El campo Numero Documento es requerido.</div>
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="first_name"
                                            placeholder="Primer Nombre" required>
                                        <label for="first_name">Primer Nombre</label>
                                    </div>
                                    <div id="alertInvalidFirstName" class="invalid-feedback">El campo Primer Nombre es requerido.</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="second_name"
                                            placeholder="second_name">
                                        <label for="second_name">Segundo Nombre</label>
                                    </div>
                                    <div id="alertInvalidSecondName" class="invalid-feedback">El campo Primer Apellido es requerido.</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="first_lastname"
                                            placeholder="first_lastname" required>
                                        <label for="first_lastname">Primer Apellido</label>
                                    </div>
                                    <div id="alertInvalidFirstLastName" class="invalid-feedback">El campo Primer Apellido es requerido.</div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="second_lastname"
                                            placeholder="second_lastname" required>
                                        <label for="second_lastname">Segundo Apellido</label>
                                    </div>
                                    <div id="alertInvalidSecondLastName" class="invalid-feedback">El campo Segundo Apellido es requerido.</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-envelope"></i>
                                        </span>
                                        <div class="form-floating is-invalid">
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Correo" required>
                                            <label for="email">Correo</label>
                                        </div>
                                    </div>
                                    <div id="alertInvalidEmail" class="invalid-feedback">El campo Correo es requerido.</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-mobile-screen-button"></i>
                                        </span>
                                        <div class="form-floating is-invalid">
                                            <input type="text" class="form-control numericInput" id="phone"
                                                placeholder="Correo" maxlength="10" required>
                                            <label for="phone">Numero Celular</label>
                                        </div>
                                    </div>
                                    <div id="alertInvalidPhone" class="invalid-feedback">El campo Numero Celular es requerido.</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-city"></i>
                                        </span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="city"
                                                placeholder="city" required>
                                            <label for="city">Ciudad</label>
                                        </div>
                                    </div>
                                    <div id="alertInvalidCity" class="invalid-feedback">El campo Ciudad es requerido.</div>
                                </div>
                                {{-- <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-cake-candles"></i>
                                        </span>
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="date_birth"
                                                placeholder="date_birth" required>
                                            <label for="date_birth">Fecha de Nacimiento</label>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer" style="background-color: #f1f1f1;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="submitButton">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Tabla con informacion de los ususario con Jquery y Datatables-->
        <div id="userList">
            <table id="example" class="table table-striped nowrap text-star" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Celular</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th>Ciudad</th>
                        {{-- <th>Despartamento</th> --}}
                        <th>Fecha Creacion</th>
                        <th>Fecha Actualizacion</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="align-middle" data-id="{{ $user->id }}">
                            <td>{{ $user->first_name . ' ' . $user->second_name }}</td>
                            <td>{{ $user->first_lastname . ' ' . $user->second_lastname }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->status }}</td>
                            <td>{{ $user->city }}</td>
                            {{-- <td>{{ $user->state }}</td> --}}
                            <td>{{ $user->created_user }}</td>
                            <td>{{ $user->update_user }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button class="btn btn-warning btnEditar" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#addUser">Editar</button>
                                    <button class="btn btn-danger btnEliminar" data-id="{{ $user->id }}">Eliminar</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>

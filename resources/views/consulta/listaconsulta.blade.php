@extends('layout.app')

@section('conteudo')

<div id="wrapper">
        <!-- Navigation Bar-->
        <header id="topnav">
            <nav class="navbar-custom">

                <ul class="list-unstyled menu-left mb-0">

                    <li class="float-left">
                        <a class="button-menu-mobile open-left navbar-toggle">
                            <div class="lines"><span></span> <span></span> <span></span></div>
                        </a>
                    </li>
                    <li class="float-left"><a href="/consulta" class="logo side-menu-sm-logo"><span
                                class="logo-lg"><img style="margin-top: 20px" src="{{ asset('images/logo.png') }}" alt="" height="35"> </span><span
                                class="logo-sm"><img src="{{ asset('images/logo_sm.png') }}" alt="" height="28"></span></a></li>

                      <li class="float-right">
                            <a a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <div style= " font-size:18px" class="logo side-menu-sm-logo">Logout</div>
                            </a>
                     </li> 

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </ul>
            </nav>
            <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu" style="height: 620px;">
                <div class="slimscroll-menu">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul class="metismenu" id="side-menu" style="height: 25px;">
                            <li class="menu-title">Navegação</li>

                            <li><a href="javascript: void(0);"><i class="mdi mdi-view-dashboard"></i> <span>Meus Pets!</span><span
                                class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="/pets/create">Cadastrar Pet</a></li>
                                    <li><a href="/pets">Vizualizar Pet</a></li>
                                </ul>
                            </li>
    
                            <li><a href="javascript: void(0);"><i class="mdi mdi-view-dashboard"></i> <span>Consulta</span><span
                                class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="/consulta/create">Nova Consulta</a></li>
                                    <li><a href="">Vizualizar Consultas</a></li>
                                </ul>
                            </li>

                            <li><a href="javascript: void(0);"><i class="mdi mdi-view-dashboard"></i><span> Veterinários
                                    </span><span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="/vets/create">Cadastrar Veterinários</a></li>
                                    <li><a href="/vets">Vizualizar Veterinários</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->
            </div>
        <!-- Left Sidebar End -->
        <!-- Page Content Start -->
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <!-- Page title box -->
                    <div class="page-title-box">
                        <h4 class="page-title">Bem vindo, {{Auth::user()->name}}</h4>
                    </div>

                    <div class="row">
                        <div class="col-12" style="height: 200px;">
                            <div class="card-box">
                                <h4 class="header-title mb-3">Consultas!</h4>
                                <div class="table-responsive">
                                    <table class="table table-centered table-hover mb-0" id="datatable">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Descrição</th>
                                                <th class="border-top-0">Data</th>
                                                <th class="border-top-0">Remédio</th>
                                                <th class="border-top-0">Vacina</th>
                                                <th class="border-top-0">Pet</th>
                                                <th class="border-top-0">Veterinário</th>
                                                <th class="border-top-0">Opções</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($consultas as $consulta)
                                                <tr> 
                                                    <td>{{ $consulta->descricao }}</td>
                                                    <td> <?php echo date('d / m /  Y', strtotime($consulta->data)); ?></td>
                                                    <td> <?php echo empty($consulta->remedio) ?  "Nenhum" : "$consulta->remedio"; ?> </td>
                                                    <td><?php echo empty($consulta->vacina) ?  "Nenhuma" : "$consulta->vacina"; ?></td>
                                                    <td>{{ $consulta->pet->nome }}</td>
                                                    <td>{{ $consulta->vet->nome }}</td>
    
                                                    <td style=" width: 22%">
                                                        <a href="/consulta/{{ $consulta->id }}/edit">
                                                            <button style="background: #343b4a; border: #343b4a;" id="btn-editar" type="submit" class="btn btn-secondary btn-rounded w-sm">
                                                                Editar
                                                            </button>
                                                        </a>
    
                                                        <button id="btn-excluir" type="button" class="btn btn-danger btn-rounded w-sm" onclick="deletar({{ $consulta->id }})">
                                                            Excluir
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>
                            <!-- end card-box-->
                        </div>
                        <!-- end col-->
                    </div>
                    <!-- end row -->
                    <!-- end col -->
                    <!-- end col-->
                </div>
                <!-- end row -->
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script>
                function deletar(id) {
    
                    var csrf_token=$('meta[name="csrf-token"]').attr('content');
    
                    Swal.fire({
                        title: 'Você tem certeza?',
                        text: 'Uma vez excluído o registro, você não poderá recuperá-lo mais.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sim, deletar!'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: "{{ url('/consulta') }}" + '/' + id,
                                type: "DELETE",
                                data: {'_method' : 'DELETE', '_token' : csrf_token},
                                success : function(data) {
                                    $( "#wrapper" ).load(window.location.href + "#wrapper");
                                    Swal.fire({
                                        title: 'Registro excluído!',
                                        text: 'O registro foi excluído permanentemente!',
                                    
                                    });
                                },
                                error : function(data) {
                                    Swal.fire({
                                        title: 'Ocorreu um erro ...',
                                        text: 'Não foi possível excluir o registro. Favor entrar em contato com o administrador do sistema!',
                                        timer: '5000',
                                    })
                                }
                            });
                     }
                        })
                }
    
            </script>

    </div>
    <!-- End Page Content-->
    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">2019 © Happy - happypet.com.br</div>
            </div>
        </div>
    </footer>
@extends('layout.app')

@section('conteudo')

    <!-- Begin page -->
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
                    <li class="float-left"><a href="/pets/create" class="logo side-menu-sm-logo"><span
                                class="logo-lg"><img src="{{ asset('images/logo.png') }}" alt="" height="35"> </span><span
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
                                    <li><a href="">Cadastrar Pet</a></li>
                                    <li><a href="/pets">Vizualizar Pets</a></li>
                                </ul>
                            </li>
    
                            <li><a href="javascript: void(0);"><i class="mdi mdi-view-dashboard"></i> <span>Consultas</span><span
                                        class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="/consulta/create">Nova Consulta</a></li>
                                    <li><a href="/consulta">Vizualizar Consultas</a></li>
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
                    <div class="page-title-box" >
                        <h4 class="page-title">Cadastrar Pet!</h4>
                    </div>
                    <!-- End page title box -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box" style="width: 1070px;">
                                <h4 class="header-title m-t-0">Informações sobre o pet!</h4>
                                <p class="text-muted font-14 m-b-20">Obs.: As informações que estão com * são obrigatórias!</p>
                                <form method="POST" @if(isset($pet)) action = "/pets/{{ $pet->id }}"  
                                    @else  action = "/pets" 
                                    @endif>
                                    @csrf
                                        
                                    <input type="hidden" name= "_method" value= "{{ isset($pet) ? 'PATCH' : 'POST' }}">
                                    <input style="width: 500px;" value= "{{Auth::user()->id}}" type="hidden" name="id" parsley-trigger="change"  id="id">
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <label for="nome">Nome<span class="text-danger">*</span></label>
                                            <input style="width: 500px;" value= "{{ $pet->nome ?? '' }}" type="text" name="nome" parsley-trigger="change" required placeholder="Digite o nome do animal" class="form-control" id="nome">
                                        </div>

                                        <div class="col-lg-6">
                                                <label for="especie">Espécie<span class="text-danger">*</span></label>
                                                <select name = "especie" id="especie" class="form-control" style="width: 467px;" required id="especie">
                                                        <option disabled="disabled" value="" selected>Selecione uma Espécie</option>
                                                        <option @isset($pet) @if($pet->especie == "Cachorro") selected @endif @endisset value="Cachorro"  >Cachorro</option>  
                                                        <option @isset($pet) @if($pet->especie == "Gato") selected @endif @endisset value="Gato"  >Gato</option>  
                                                        <option @isset($pet) @if($pet->especie == "Cavalo") selected @endif @endisset value="Cavalo"  >Cavalo</option>  
                                                        <option @isset($pet) @if($pet->especie == "Chinchila") selected @endif @endisset value="Chinchila"  >Chinchila</option>   
                                                        <option @isset($pet) @if($pet->especie == "Hamster") selected @endif @endisset value="Hamster"  >Hamster</option>   
                                                        <option @isset($pet) @if($pet->especie == "Furão") selected @endif @endisset value="Furão"  >Furão</option>   
                                                        <option @isset($pet) @if($pet->especie == "Peixe") selected @endif @endisset value="Peixe"  >Peixe</option>   
                                                        <option @isset($pet) @if($pet->especie == "Pássaro") selected @endif @endisset value="Pássaro"  >Pássaro</option>   
                                                        <option @isset($pet) @if($pet->especie == "Peixe") selected @endif @endisset value="Peixe"  >Peixe</option>   
                                                        <option @isset($pet) @if($pet->especie == "Outro") selected @endif @endisset value="Outro"  >Outro</option>   
                                                </select>
                                            </div>

                                        <div style="margin-top: 25px" class="col-lg-6">
                                            <label for="raca">Raça<span class="text-danger">*</span></label>
                                            <input style="width: 500px;" type="text" value= "{{ $pet->raca ?? '' }}" name="raca" parsley-trigger="change" required placeholder="Digite a raça do animal" class="form-control" id="raca">
                                        </div>

                                        <div class="col-lg-3" style="margin-top: 25px">
                                            <label for="altura">Altura (Cm)<span class="text-danger">*</span></label>
                                            <input style="width: 200px;" type="number" value= "{{ $pet->altura ?? '' }}" name="altura" parsley-trigger="change" required placeholder="Digite a altura do animal" class="form-control" id="altura">
                                        </div>

                                        <div class="col-lg-3" style="margin-top: 25px">
                                            <label for="peso">Peso (Kg)<span class="text-danger">*</span></label>
                                            <input style="width: 200px;" type="number" value= "{{ $pet->peso ?? '' }}" name="peso" parsley-trigger="change" required placeholder="Digite o peso do animal" class="form-control" id="peso">
                                        </div>

                                    </div>
                                    <div style="margin-top: 50px" class="form-group text-right m-b-0">
                                        <button style="background: #343b4a; border: #343b4a;" class="btn btn-primary waves-effect waves-light" type="submit">Salvar</button>
                                    </div>
                                </form>
                            </div>
                            <!-- end card-box -->
                        </div>
                        <!-- end col -->

                        <!-- end col -->

                        <footer class="footer">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 text-center">2019 © Happy - happypet.com.br</div>
                                </div>
                            </div>
                        </footer>
                        <!-- End Footer -->
                        <!-- Right Sidebar -->
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
                    </div>
                    <!-- End #wrapper -->
                    <!-- jQuery  -->
@endsection
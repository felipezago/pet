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
                    <li class="float-left"><a href="/vets/create" class="logo side-menu-sm-logo"><span
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
                            <li><a href="/pets/create">Cadastrar Pet</a></li>
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
                                    <li><a href="">Cadastrar Veterinários</a></li>
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
                        <h4 class="page-title">Cadastro de Veterinários</h4>
                    </div>
                    <!-- End page title box -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-box" style="width: 1070px;">
                                <h4 class="header-title m-t-0">Informações sobre o Veterinário!</h4>
                                <p class="text-muted font-14 m-b-20">Obs.: As informações que estão com * são obrigatórias!</p>
                                <form method="POST" @if(isset($vet)) action = "/vets/{{ $vet->id }}"  
                                    @else  action = "/vets" 
                                    @endif>
                                    @csrf
                                    <input type="hidden" name= "_method" value= "{{ isset($vet) ? 'PATCH' : 'POST' }}">
                                    <input style="width: 500px;" value= "{{Auth::user()->id}}" type="hidden" name="id" parsley-trigger="change"  id="id">
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <label for="nome">Nome<span class="text-danger">*</span></label>
                                            <input style="width: 500px;" type="text"  value= "{{ $vet->nome ?? '' }}"  name="nome" parsley-trigger="change" required placeholder="Digite o nome do veterinário" class="form-control" id="nome">
                                        </div>

                                        <div class="col-lg-3">
                                            <label for="telefone">Tefone<span class="text-danger">*</span></label>
                                            <input style="width: 235px;" type="number" value= "{{ $vet->telefone ?? '' }}"  maxlength="10" name="telefone" parsley-trigger="change" required class="form-control" placeholder="Ex.: 46 3265 5858" id="telefone">
                                        </div>

                                        <div class="col-lg-3">
                                            <label for="celular">Celular<span class="text-danger">*</span></label>
                                            <input style="width: 235px;" type="number" value= "{{ $vet->celular ?? '' }}"  maxlength="11" name="celular" parsley-trigger="change" required placeholder="Sem formatação. Ex.: 46 99999 5858" class="form-control" id="celular">
                                        </div>


                                        <div style="margin-top: 25px" class="col-lg-6">
                                            <label for="rua">Rua<span class="text-danger">*</span></label>
                                            <input style="width: 500px;" type="text" value= "{{ $vet->rua ?? '' }}"  name="rua" parsley-trigger="change" required placeholder="Ex.: Rua 2019 " class="form-control" id="rua">
                                        </div>



                                        <div class="col-lg-3" style="margin-top: 25px">
                                            <label for="bairro">Bairro<span class="text-danger">*</span></label>
                                            <input style="width: 235px;" type="text" value= "{{ $vet->bairro ?? '' }}"  name="bairro" parsley-trigger="change" required placeholder="Ex.: Centro" class="form-control" id="bairro">
                                        </div>



                                        <div class="col-lg-3" style="margin-top: 25px">
                                            <label for="cidade">Cidade<span class="text-danger">*</span></label>
                                            <input style="width: 235px;" type="text" name="cidade" value= "{{ $vet->cidade ?? '' }}"  parsley-trigger="change" required placeholder="Ex.: Palmas" class="form-control" id="cidade">
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
                        <div class="right-bar">
                            <div class="rightbar-title"><a href=""></i></a>
                                <h5 class="m-0">Settings</h5>
                            </div>
                            <div class="slimscroll-menu">
                                <!-- User box -->
                                <div class="user-box">
                                    <div class="user-img"><img src="{{ asset('images/users/avatar-1.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid"> <a href="#" class="user-edit"><i class="mdi mdi-pencil"></i></a></div>
                                    <h5><a href="#">Agnes Kennedy</a></h5>
                                    <p class="text-muted mb-0"><small>Admin Head</small></p>
                                </div>
                                <!-- Settings -->
                                <hr class="mt-0">
                                <h5 class="pl-3">Basic Settings</h5>
                                <hr class="mb-0">
                                <div class="p-3">
                                    <div class="checkbox checkbox-primary mb-2"><input id="checkbox1" type="checkbox" checked="checked"> <label for="checkbox1">Notifications</label></div>
                                    <div class="checkbox checkbox-primary mb-2"><input id="checkbox2" type="checkbox" checked="checked"> <label for="checkbox2">API Access</label></div>
                                    <div class="checkbox checkbox-primary mb-2"><input id="checkbox3" type="checkbox"> <label for="checkbox3">Auto Updates</label></div>
                                    <div class="checkbox checkbox-primary mb-2"><input id="checkbox4" type="checkbox" checked="checked"> <label for="checkbox4">Online Status</label></div>
                                    <div class="checkbox checkbox-primary mb-0"><input id="checkbox5" type="checkbox" checked="checked"> <label for="checkbox5">Auto Payout</label></div>
                                </div>
                                <!-- Timeline -->
                                <hr class="mt-0">
                                <h5 class="pl-3 pr-3">Messages <span class="float-right badge badge-pill badge-danger">25</span></h5>
                                <hr class="mb-0">
                                <div class="p-3">
                                    <div class="inbox-widget">
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="{{ asset('images/users/avatar-1.jpg') }}" class="rounded-circle" alt=""></div>
                                                <p class="inbox-item-author">Chadengle</p>
                                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                                <p class="inbox-item-date">13:40 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="{{ asset('images/users/avatar-2.jpg') }}" class="rounded-circle" alt=""></div>
                                                <p class="inbox-item-author">Tomaslau</p>
                                                <p class="inbox-item-text">I've finished it! See you so...</p>
                                                <p class="inbox-item-date">13:34 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="{{ asset('images/users/avatar-3.jpg') }}" class="rounded-circle" alt=""></div>
                                                <p class="inbox-item-author">Stillnotdavid</p>
                                                <p class="inbox-item-text">This theme is awesome!</p>
                                                <p class="inbox-item-date">13:17 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="{{ asset('images/users/avatar-4.jpg') }}" class="rounded-circle" alt=""></div>
                                                <p class="inbox-item-author">Kurafire</p>
                                                <p class="inbox-item-text">Nice to meet you</p>
                                                <p class="inbox-item-date">12:20 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="{{ asset('images/users/avatar-5.jpg') }}" class="rounded-circle" alt=""></div>
                                                <p class="inbox-item-author">Shahedk</p>
                                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                                <p class="inbox-item-date">10:15 AM</p>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- end inbox-widget -->
                                </div>
                                <!-- end .p-3-->
                            </div>
                            <!-- end slimscroll-menu-->
                        </div>
                        <!-- /Right-bar -->
                    </div>



@endsection
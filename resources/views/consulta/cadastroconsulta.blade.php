
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
                    <li class="float-left"><a href="/consulta/create" class="logo side-menu-sm-logo"><span
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
                                <li><a href="">Nova Consulta</a></li>
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
                    <div class="page-title-box">
                        <h4 class="page-title">Cadastro de Consultas</h4>
                    </div>
                    <!-- End page title box -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-box" style="width: 1070px;">
                                <h4 class="header-title m-t-0">Informações sobre a Consulta!</h4>
                                <p class="text-muted font-14 m-b-20">Obs.: As informações que estão com * são obrigatórias!</p>
                                <div class="form-group text-right m-b-0" style="margin-left: 890px;">
                                        <button class="btn btn-primary waves-effect waves-light" style="background: #343b4a; border: #343b4a;" onclick="data()" id= "desc">Pegar data atual</button>
                                </div>
                                <form method="POST" @if(isset($consulta)) action = "/consulta/{{ $consulta->id }}"  
                                    @else  action = "/consulta" 
                                    @endif>
                                    @csrf

                                    <input type="hidden" name= "_method" value= "{{ isset($consulta) ? 'PATCH' : 'POST' }}">
                                    <input style="width: 500px;" value= "{{Auth::user()->id}}" type="hidden" name="id" parsley-trigger="change"  id="id">
                                    <div class="row">                                            

                                        <div class="col-lg-6">
                                            <label for="descricao">Descrição<span class="text-danger">*</span></label>
                                            <input style="width: 500px;" type="text" value= "{{ $consulta->descricao ?? '' }}" name="descricao" parsley-trigger="change" required placeholder="Digite a descrição da consulta" class="form-control" id="descricao">
                                        </div>

                                        <div class="col-lg-3">
                                            <label for="vacina">Vacina<span class="text-danger"></span></label>
                                            <input style="width: 235px;" type="text" value= "{{ $consulta->vacina ?? '' }}" name="vacina" parsley-trigger="change" placeholder="Ex.: FCV54" class="form-control" id="vacina">
                                        </div>

                                        <div class="col-lg-1">
                                                <label for="vetRua">Data<span class="text-danger">*</span></label>
                                                <input style="width: 235px;" type="date" value= "{{ $consulta->data ?? '' }}" name="data" parsley-trigger="change" required placeholder="Ex.: 25/11/2019 " class="form-control" id="data" >
                                        </div>

                                        


                                        <div style="margin-top: 25px" class="col-lg-6">
                                            <label for="remedio">Remédio</label>
                                            <input style="width: 500px;" type="text" value= "{{ $consulta->remedio ?? '' }}" name="remedio" parsley-trigger="change" class="form-control" placeholder="Ex.: Antipulgas Nexgard" id="remedio">
                                        </div>

                                        <div class="col-lg-3" style="margin-top: 25px">
                                                <label for="veterinario">Pets<span class="text-danger">*</span></label>
                                                <select name = "pets" id="pets" class="form-control" required style="width: 235px;" id="pets">
                                                        <option disabled="disabled" value="" selected>Selecione um Pet</option>
                                                        @foreach ($pets as $pet)
                                                        <option value="{{ $pet->id }}"  
                                                            @isset($consulta) 
                                                            
                                                            @if($consulta->pet_id == $pet->id)   
                                                                selected
                                                            @endif
    
                                                            @endisset>{{ $pet->nome }}</option>    
                                                            @endforeach
                                                </select>
    
                                            </div>
                                        
                                        <div class="col-lg-3" style="margin-top: 25px">
                                            <label for="veterinario">Veterinários<span class="text-danger">*</span></label>
                                            <select name = "vets" id="vets" class="form-control" required style="width: 235px;" id="vets">
                                                    <option disabled="disabled" value="" selected>Selecione um Veterinario</option>
                                                    @foreach ($vets as $vet)
                                                    <option value="{{ $vet->id }}"  
                                                        @isset($consulta) 
                                                        
                                                        @if($consulta->vet_id == $vet->id)   
                                                            selected
                                                        @endif

                                                        @endisset>{{ $vet->nome }}</option>    
                                                        @endforeach
                                            </select>

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

                    </div>

                    <script src="https://unpkg.com/moment"> </script>

                    <script>

                        function data(){    
                            let data = document.querySelector('#data');   

                           if(data.value == ""){
                                data.value =  moment().format('YYYY-MM-DD');
                           }else{
                                data.value = "";
                           }
                            
                        }
                    
                     </script>
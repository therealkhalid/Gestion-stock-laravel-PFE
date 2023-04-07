@extends('adminlte::page')

@section('content')
<style>
    
    .main-sidebar,.main-header{
    
background: #34e89e;  
background: -webkit-linear-gradient(to right, #0f3443, #34e89e);  
background: linear-gradient(to right, #0f3443, #34e89e); 



    }
    .nav-link,.nav-item{color: white !important;}

    .content-wrapper{background: #a6dec6; 
} 
</style>
<style>
    .table{
        border-collapse: collapse;
    }
    
    
    .table th{
        background-color: darkblue;
        color:#ffffff;
    }
    
    
    
    /*responsive*/
    @media(max-width: 1100px){
        *{
            font-size: 14px;
        }
    }
    @media(max-width: 800px){
        .table thead{
            display: none;
        }
        .dt-buttons,#mytable_filter,.dataTables_info,.pagination{
            font-size: 10px;
    
        }
    
        .table, .table tbody, .table tr, .table td{
            display: block;
            /* width: 88%; */
        }
        .table tr{
            margin-bottom:20px;
        }
        .table td{
            text-align: right;
            padding-left: 50%;
            text-align: right;
            position: relative;
        }
        .table td::before{
            content: attr(data-label);
            position: absolute;
            left:0;
            width: 50%;
            padding-left:15px;
            font-size:15px;
            font-weight: bold;
            text-align: left;
        }
    }
    
        
    
    
    
    </style>
    
    
    {{-- <div class="container">
        <div class="row justify-content-center ">
            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-header bg-gradient-success">
                        <h3 class="card-title text-white text-center">
                            {{ __('Dashboard') }}
                        </h3>
                    </div>
                   
                    @yield('khalid')
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container">
        @yield('khalid')

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection


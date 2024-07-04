@extends('zoho.layout')

@section('css')
    
@endsection

@section('main')

            <div class="container m-5">
                            
                <script>
                    window.access_token = @json($access_token);
                </script>                              

                <!-- Form Block -->
                <div class="form_block">

                </div>

            </div>

@endsection

@section('js')
<script src="{{ mix('js/zohovue.js') }}"></script>
@endsection
@extends('layouts.master')
@section('title', 'Anasayfa')
@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-12 m-5 pb-5">
                <h1 class="card alert-warning text-center">To-Do List</h1>
                <div class="alert alert-success" style="display: none;"></div>
                <form class="form-inline">
                    <div class="form-group mb-2">
                        <label class="mr-3">Providers List</label>
                        <select class="form-control mr-3" id="provider" name="provider">
                            <option value="0">--Seçiniz--</option>
                            @foreach($viewData as $row)
                                <option value="{{$row->id}}" data-url="{{$row->url}}">{{$row->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <button type="submit" class="btn btn-primary mr-3" id="dataGetir">Data Getir</button>
                        <button class="btn btn-primary" type="button" disabled id="loading" style="display: none;">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Yükleniyor...
                        </button>
                        <button type="button" class="btn btn-primary" id="isPlaniHesapla" style="display: none;">İş Listesini Getir</button>
                    </div>
                </form>
                <div class="col-md-12" id="test"></div>
                <table class="table table-striped" id="records_table" style="display: none;">
                    <thead>
                    <tr>
                        <th scope="col">Sıra No</th>
                        <th scope="col">Developer</th>
                        <th scope="col">Zorluk Derecesi</th>
                        <th scope="col">Toplam Süre</th>
                        <th scope="col">Toplam Hafta</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection()
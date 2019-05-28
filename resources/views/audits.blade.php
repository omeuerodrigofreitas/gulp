@extends('layouts.app')

    @section('content')
      <div class="container">
        <table class="table" >
          <thead class="thead-dark">
            <tr>
              <th scope="col">Model</th>
              <th scope="col">Ação</th>
              <th scope="col">Usuario</th>
              <th scope="col">Data</th>
              <th scope="col">Valores Antigos</th>
              <th scope="col">Valores Novos</th>
            </tr>
          </thead>
          <tbody id="audits">
            @foreach($audits as $audit)
              <tr>
                <td>{{ $audit->auditable_type }} (id: {{ $audit->auditable_id }})</td>
                <td>{{ $audit->event }}</td>
                <td>{{ $audit->user->name }}</td>
                <td>{{ $audit->created_at }}</td>
                <td>
                  <table class="table">
                    @foreach($audit->old_values as $attribute => $value)
                      <tr>
                        <td><b>{{ $attribute }}</b></td>
                        <td>{{ $value }}</td>
                      </tr>
                    @endforeach
                  </table>
                </td>
                <td>
                  <table class="table">
                    @foreach($audit->new_values as $attribute => $value)
                      <tr>
                        <td><b>{{ $attribute }}</b></td>
                        <td>{{ $value }}</td>
                      </tr>
                    @endforeach
                  </table>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    @endsection